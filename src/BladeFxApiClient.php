<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi;

use DateTimeImmutable;
use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetCategoriesListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer;
use Xiphias\BladeFxApi\Handler\ApiHandler;
use Xiphias\BladeFxApi\Handler\ApiHandlerInterface;
use Xiphias\BladeFxApi\Http\Client\HttpApiClient;
use Xiphias\BladeFxApi\Logger\StdoutLogger;
use Xiphias\BladeFxApi\Request\RequestFactory;
use Xiphias\BladeFxApi\Request\RequestManager;
use Xiphias\BladeFxApi\Response\ResponseFactory;
use Xiphias\BladeFxApi\Response\ResponseManager;
use Xiphias\BladeFxApi\Storage\FileTokenStorage;
use Xiphias\BladeFxApi\Storage\TokenStorageInterface;

class BladeFxApiClient implements BladeFxApiClientInterface
{
    /**
     * @var \Xiphias\BladeFxApi\Handler\ApiHandler|\Xiphias\BladeFxApi\Handler\ApiHandlerInterface
     */
    protected ApiHandlerInterface|ApiHandler $apiHandler;

    /**
     * @var \Xiphias\BladeFxApi\Storage\FileTokenStorage|\Xiphias\BladeFxApi\Storage\TokenStorageInterface
     */
    protected TokenStorageInterface|FileTokenStorage $tokenStorage;

    /**
     * @param string $bladeFxBaseUrl
     * @param string $bladeFxUsername
     * @param string $bladeFxPassword
     * @param \Psr\Log\LoggerInterface|null $logger
     */
    public function __construct(
        protected string $bladeFxBaseUrl,
        protected string $bladeFxUsername,
        protected string $bladeFxPassword,
        protected ?LoggerInterface $logger = null,
    ) {
        $this->logger ??= new StdoutLogger();
        $this->apiHandler = $this->createApiHandler();
        $this->tokenStorage = new FileTokenStorage(BladeFxApiConfig::AUTH_TOKEN_FILE_PATH);
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer|null $bladeFxAuthenticationRequestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer|null
     */
    public function sendAuthenticateUserRequest(
        ?BladeFxAuthenticationRequestTransfer $bladeFxAuthenticationRequestTransfer
    ): ?BladeFxAuthenticationResponseTransfer {
        $expiresAt = (new DateTimeImmutable())->modify(BladeFxApiConfig::AUTH_TOKEN_EXPIRES_AT_SECONDS_DURATION);
        $authenticationResponseTransfer = $this->callAuthenticateUserApi($bladeFxAuthenticationRequestTransfer);
        $tokenTransfer = (new BladeFxTokenTransfer())
            ->setAccessToken($authenticationResponseTransfer->getAccessToken())
            ->setExpiresAt($expiresAt);

        $this->clearToken();
        $this->tokenStorage->save($tokenTransfer);

        return $authenticationResponseTransfer;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer|null $bladeFxAuthenticationRequestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer|null
     */
    protected function callAuthenticateUserApi(
        ?BladeFxAuthenticationRequestTransfer $bladeFxAuthenticationRequestTransfer
    ): ?BladeFxAuthenticationResponseTransfer {
        $authRequestTransfer = new BladeFxAuthenticationRequestTransfer();
        $authRequestTransfer->setUsername($bladeFxAuthenticationRequestTransfer?->getUsername() ?: $this->bladeFxUsername);
        $authRequestTransfer->setPassword($bladeFxAuthenticationRequestTransfer?->getPassword() ?: $this->bladeFxPassword);
        $authRequestTransfer->setBaseUrl($this->bladeFxBaseUrl);
        $authRequestTransfer->setLicenceExp(true);

        return $this->apiHandler->authenticateUser($authRequestTransfer);
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $abstractTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\AbstractTransfer
     */
    protected function getAuthorizationToken(AbstractTransfer $abstractTransfer): AbstractTransfer
    {
        $tokenTransfer = $this->tokenStorage->load();

        if (!$tokenTransfer || $tokenTransfer->isExpired()) {
            $tokenTransfer = $this->sendAuthenticateUserRequest(null);
        }

        $abstractTransfer->setAccessToken($tokenTransfer->getAccessToken());

        return $abstractTransfer;
    }

    /**
     * @return void
     */
    protected function clearToken(): void
    {
        $this->tokenStorage->clear();
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportsListRequestTransfer|null $reportsListRequestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer
     */
    public function sendGetReportsListRequest(
        ?BladeFxGetReportsListRequestTransfer $reportsListRequestTransfer = (new BladeFxGetReportsListRequestTransfer())
    ): BladeFxGetReportsListResponseTransfer {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxGetReportsListRequestTransfer $reportsListRequestTransfer */
        $reportsListRequestTransfer = $this->prepareRequest($reportsListRequestTransfer);

        return $this->apiHandler->getReportsList($reportsListRequestTransfer);
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetCategoriesListRequestTransfer|null $categoriesListRequestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer
     */
    public function sendGetCategoriesListRequest(
        ?BladeFxGetCategoriesListRequestTransfer $categoriesListRequestTransfer = (new BladeFxGetCategoriesListRequestTransfer())
    ): BladeFxCategoriesListResponseTransfer {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxGetCategoriesListRequestTransfer $categoriesListRequestTransfer */
        $categoriesListRequestTransfer = $this->prepareRequest($categoriesListRequestTransfer);

        return $this->apiHandler->getCategoriesList($categoriesListRequestTransfer);
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormRequestTransfer|null $reportsParamFormRequestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer
     */
    public function sendGetReportParamFormRequest(
        ?BladeFxGetReportParamFormRequestTransfer $reportsParamFormRequestTransfer = (new BladeFxGetReportParamFormRequestTransfer())
    ): BladeFxGetReportParamFormResponseTransfer {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormRequestTransfer $reportsParamFormRequestTransfer */
        $reportsParamFormRequestTransfer = $this->prepareRequest($reportsParamFormRequestTransfer);

        return $this->apiHandler->getReportParamForm($reportsParamFormRequestTransfer);
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer
     */
    public function sendGetReportPreviewRequest(
        BladeFxGetReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer
    ): BladeFxGetReportPreviewResponseTransfer {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer */
        $bladeFxReportPreviewRequestTransfer = $this->prepareRequest($bladeFxReportPreviewRequestTransfer);

        return $this->apiHandler->getReportPreview($bladeFxReportPreviewRequestTransfer);
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer|null $bladeFxSetFavoriteReportRequestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer
     */
    public function sendSetFavoriteReportRequest(
        ?BladeFxSetFavoriteReportRequestTransfer $bladeFxSetFavoriteReportRequestTransfer
    ): BladeFxSetFavoriteReportResponseTransfer {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer $bladeFxSetFavoriteReportRequestTransfer */
        $bladeFxSetFavoriteReportRequestTransfer = $this->prepareRequest($bladeFxSetFavoriteReportRequestTransfer);

        return $this->apiHandler->setFavoriteReport($bladeFxSetFavoriteReportRequestTransfer);
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserRequestTransfer $bladeFxCreateOrUpdateUserRequestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer
     */
    public function sendCreateOrUpdateUserOnBfxRequest(
        BladeFxCreateOrUpdateUserRequestTransfer $bladeFxCreateOrUpdateUserRequestTransfer
    ): BladeFxCreateOrUpdateUserResponseTransfer {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserRequestTransfer $bladeFxCreateOrUpdateUserRequestTransfer */
        $bladeFxCreateOrUpdateUserRequestTransfer = $this->prepareRequest($bladeFxCreateOrUpdateUserRequestTransfer);

        return $this->apiHandler->createOrUpdateUserOnBladeFx($bladeFxCreateOrUpdateUserRequestTransfer);
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordRequestTransfer $bladeFxUpdatePasswordRequestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer
     */
    public function sendUpdatePasswordOnBladeFxRequest(
        BladeFxUpdatePasswordRequestTransfer $bladeFxUpdatePasswordRequestTransfer
    ): BladeFxUpdatePasswordResponseTransfer {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordRequestTransfer $bladeFxUpdatePasswordRequestTransfer */
        $bladeFxUpdatePasswordRequestTransfer = $this->prepareRequest($bladeFxUpdatePasswordRequestTransfer);

        return $this->apiHandler->sendUpdatePasswordOnBladeFx($bladeFxUpdatePasswordRequestTransfer);
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatRequestTransfer $bladeFxGetReportByFormatRequestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatResponseTransfer
     */
    public function sendGetReportByFormatRequest(
        BladeFxGetReportByFormatRequestTransfer $bladeFxGetReportByFormatRequestTransfer
    ): BladeFxGetReportByFormatResponseTransfer {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatRequestTransfer $bladeFxGetReportByFormatRequestTransfer */
        $bladeFxGetReportByFormatRequestTransfer = $this->prepareRequest($bladeFxGetReportByFormatRequestTransfer);

        return $this->apiHandler->getReportByFormat($bladeFxGetReportByFormatRequestTransfer);
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $requestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\AbstractTransfer
     */
    protected function prepareRequest(AbstractTransfer $requestTransfer): AbstractTransfer
    {
        $bladeFxRequestTransfer = $this->getAuthorizationToken($requestTransfer);
        $bladeFxRequestTransfer->setBaseUrl($this->bladeFxBaseUrl);

        return $bladeFxRequestTransfer;
    }

    /**
     * @return \Xiphias\BladeFxApi\Handler\ApiHandler
     */
    protected function createApiHandler(): ApiHandler
    {
        return new ApiHandler(
            $this->createRequestManager(),
            $this->createResponseManager(),
            $this->createHttpClient(),
            new BladeFxApiConfig(),
            $this->createRequestFactory(),
        );
    }

    /**
     * @return \Xiphias\BladeFxApi\Http\Client\HttpApiClient
     */
    protected function createHttpClient(): HttpApiClient
    {
        return new HttpApiClient(
            new Client([
                'timeout' => 30,
                'connect_timeout' => 5,
            ]),
            $this->logger,
        );
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\RequestFactory
     */
    protected function createRequestFactory(): RequestFactory
    {
        return new RequestFactory(
            $this->logger,
        );
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\RequestManager
     */
    protected function createRequestManager(): RequestManager
    {
        return new RequestManager(
            $this->createRequestFactory(),
            $this->logger,
        );
    }

    /**
     * @return \Xiphias\BladeFxApi\Response\ResponseManager
     */
    protected function createResponseManager(): ResponseManager
    {
        return new ResponseManager(
            $this->logger,
            $this->createResponseFactory(),
        );
    }

    /**
     * @return \Xiphias\BladeFxApi\Response\ResponseFactory
     */
    protected function createResponseFactory(): ResponseFactory
    {
        return new ResponseFactory(
            $this->logger,
        );
    }
}
