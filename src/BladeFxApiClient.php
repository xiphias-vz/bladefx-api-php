<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi;

use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetCategoriesListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer;
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
     * @var ApiHandler|ApiHandlerInterface
     */
    protected ApiHandlerInterface|ApiHandler $apiHandler;

    /**
     * @var FileTokenStorage|TokenStorageInterface
     */
    protected TokenStorageInterface|FileTokenStorage $tokenStorage;

    /**
     * @param string $bladeFxBaseUrl
     * @param string $bladeFxUsername
     * @param string $bladeFxPassword
     * @param LoggerInterface|null $logger
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
     * @return BladeFxAuthenticationResponseTransfer|null
     * @throws \DateMalformedStringException
     */
    public function sendAuthenticateUserRequest(): ?BladeFxAuthenticationResponseTransfer
    {
        $expiresAt = (new \DateTimeImmutable())->modify(BladeFxApiConfig::AUTH_TOKEN_EXPIRES_AT_SECONDS_DURATION);
        $authenticationResponseTransfer = $this->callAuthenticateUserApi();
        $tokenTransfer = (new BladeFxTokenTransfer())
            ->setAccessToken($authenticationResponseTransfer->getAccessToken())
            ->setExpiresAt($expiresAt);

        $this->clearToken();
        $this->tokenStorage->save($tokenTransfer);

        return $authenticationResponseTransfer;
    }

    /**
     * @return BladeFxAuthenticationResponseTransfer|null
     */
    protected function callAuthenticateUserApi(): ?BladeFxAuthenticationResponseTransfer
    {
        $authRequestTransfer = new BladeFxAuthenticationRequestTransfer();
        $authRequestTransfer->setUsername($this->bladeFxUsername);
        $authRequestTransfer->setPassword($this->bladeFxPassword);
        $authRequestTransfer->setBaseUrl($this->bladeFxBaseUrl);

        return $this->apiHandler->authenticateUser($authRequestTransfer);
    }

    /**
     * @param AbstractTransfer $abstractTransfer
     * @return AbstractTransfer
     * @throws \DateMalformedStringException
     */
    protected function getAuthorizationToken(AbstractTransfer $abstractTransfer): AbstractTransfer
    {
        $tokenTransfer = $this->tokenStorage->load();

        if (!$tokenTransfer || $tokenTransfer->isExpired()) {
            $tokenTransfer = $this->sendAuthenticateUserRequest();
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
     * @param BladeFxGetReportsListRequestTransfer|null $reportsListRequestTransfer
     * @return BladeFxGetReportsListResponseTransfer
     * @throws \DateMalformedStringException
     */
    public function sendGetReportsListRequest(
        ?BladeFxGetReportsListRequestTransfer $reportsListRequestTransfer = (new BladeFxGetReportsListRequestTransfer())
    ): BladeFxGetReportsListResponseTransfer {
        /** @var BladeFxGetReportsListRequestTransfer $reportsListRequestTransfer */
        $reportsListRequestTransfer = $this->prepareRequest($reportsListRequestTransfer);

        return $this->apiHandler->getReportsList($reportsListRequestTransfer);
    }

    /**
     * @param BladeFxGetCategoriesListRequestTransfer|null $categoriesListRequestTransfer
     * @return BladeFxCategoriesListResponseTransfer
     * @throws \DateMalformedStringException
     */
    public function sendGetCategoriesListRequest(
        ?BladeFxGetCategoriesListRequestTransfer $categoriesListRequestTransfer = (new BladeFxGetCategoriesListRequestTransfer())
    ): BladeFxCategoriesListResponseTransfer {
        /** @var BladeFxGetCategoriesListRequestTransfer $categoriesListRequestTransfer */
        $categoriesListRequestTransfer = $this->prepareRequest($categoriesListRequestTransfer);

        return $this->apiHandler->getCategoriesList($categoriesListRequestTransfer);
    }

    /**
     * @param BladeFxGetReportParamFormRequestTransfer|null $reportsParamFormRequestTransfer
     * @return BladeFxGetReportParamFormResponseTransfer
     * @throws \DateMalformedStringException
     */
    public function sendGetReportParamFormRequest(
        ?BladeFxGetReportParamFormRequestTransfer $reportsParamFormRequestTransfer = (new BladeFxGetReportParamFormRequestTransfer())
    ): BladeFxGetReportParamFormResponseTransfer {
        /** @var BladeFxGetReportParamFormRequestTransfer $reportsParamFormRequestTransfer */
        $reportsParamFormRequestTransfer = $this->prepareRequest($reportsParamFormRequestTransfer);

        return $this->apiHandler->getReportParamForm($reportsParamFormRequestTransfer);
    }

    /**
     * @param BladeFxGetReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer
     * @return BladeFxGetReportPreviewResponseTransfer
     * @throws \DateMalformedStringException
     */
    public function sendGetReportPreviewRequest(
        BladeFxGetReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer
    ): BladeFxGetReportPreviewResponseTransfer {
        /** @var BladeFxGetReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer */
        $bladeFxReportPreviewRequestTransfer = $this->prepareRequest($bladeFxReportPreviewRequestTransfer);

        return $this->apiHandler->getReportPreview($bladeFxReportPreviewRequestTransfer);
    }

    /**
     * @param BladeFxSetFavoriteReportRequestTransfer|null $bladeFxSetFavoriteReportRequestTransfer
     * @return BladeFxSetFavoriteReportResponseTransfer
     * @throws \DateMalformedStringException
     */
    public function sendSetFavoriteReportRequest(
        ?BladeFxSetFavoriteReportRequestTransfer $bladeFxSetFavoriteReportRequestTransfer
    ): BladeFxSetFavoriteReportResponseTransfer {
        /** @var BladeFxSetFavoriteReportRequestTransfer $bladeFxSetFavoriteReportRequestTransfer */
        $bladeFxSetFavoriteReportRequestTransfer = $this->prepareRequest($bladeFxSetFavoriteReportRequestTransfer);

        return $this->apiHandler->setFavoriteReport($bladeFxSetFavoriteReportRequestTransfer);
    }

    /**
     * @param BladeFxCreateOrUpdateUserRequestTransfer $bladeFxCreateOrUpdateUserRequestTransfer
     * @return BladeFxCreateOrUpdateUserResponseTransfer
     * @throws \DateMalformedStringException
     */
    public function sendCreateOrUpdateUserOnBfxRequest(
        BladeFxCreateOrUpdateUserRequestTransfer $bladeFxCreateOrUpdateUserRequestTransfer
    ): BladeFxCreateOrUpdateUserResponseTransfer {
        /** @var BladeFxCreateOrUpdateUserRequestTransfer $bladeFxCreateOrUpdateUserRequestTransfer */
        $bladeFxCreateOrUpdateUserRequestTransfer = $this->prepareRequest($bladeFxCreateOrUpdateUserRequestTransfer);

        return $this->apiHandler->createOrUpdateUserOnBladeFx($bladeFxCreateOrUpdateUserRequestTransfer);
    }


    /**
     * @param BladeFxUpdatePasswordRequestTransfer $bladeFxUpdatePasswordRequestTransfer
     * @return BladeFxUpdatePasswordResponseTransfer
     * @throws \DateMalformedStringException
     */
    public function sendUpdatePasswordOnBladeFxRequest(
        BladeFxUpdatePasswordRequestTransfer $bladeFxUpdatePasswordRequestTransfer
    ): BladeFxUpdatePasswordResponseTransfer {
        /** @var BladeFxUpdatePasswordRequestTransfer $bladeFxUpdatePasswordRequestTransfer */
        $bladeFxUpdatePasswordRequestTransfer = $this->prepareRequest($bladeFxUpdatePasswordRequestTransfer);

        return $this->apiHandler->sendUpdatePasswordOnBladeFx($bladeFxUpdatePasswordRequestTransfer);
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return AbstractTransfer
     * @throws \DateMalformedStringException
     */
    protected function prepareRequest(AbstractTransfer $requestTransfer): AbstractTransfer
    {
        $bladeFxRequestTransfer = $this->getAuthorizationToken($requestTransfer);
        $bladeFxRequestTransfer->setBaseUrl($this->bladeFxBaseUrl);

        return $bladeFxRequestTransfer;
    }

    /**
     * @return ApiHandler
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
     * @return HttpApiClient
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
     * @return RequestFactory
     */
    protected function createRequestFactory(): RequestFactory
    {
        return new RequestFactory(
            $this->logger,
        );
    }

    /**
     * @return RequestManager
     */
    protected function createRequestManager(): RequestManager
    {
        return new RequestManager(
            $this->createRequestFactory(),
            $this->logger,
        );
    }

    /**
     * @return ResponseManager
     */
    protected function createResponseManager(): ResponseManager
    {
        return new ResponseManager(
            $this->logger,
            $this->createResponseFactory(),
        );
    }

    /**
     * @return ResponseFactory
     */
    protected function createResponseFactory(): ResponseFactory
    {
        return new ResponseFactory(
            $this->logger,
        );
    }
}
