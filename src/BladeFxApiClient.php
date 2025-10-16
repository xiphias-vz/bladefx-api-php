<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportParamFormRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportParamFormResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportsListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportsListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer;
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

class BladeFxApiClient implements ReportsApiClientInterface
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
     * @return BladeFxTokenTransfer
     * @throws \DateMalformedStringException
     */
    public function sendAuthenticateUserRequest(): BladeFxTokenTransfer
    {
        $expiresAt = (new \DateTimeImmutable())->modify(BladeFxApiConfig::AUTH_TOKEN_EXPIRES_AT_SECONDS_DURATION);
        $tokenTransfer = new BladeFxTokenTransfer($this->callAuthenticateUserApi()->getToken(), $expiresAt);

        $this->clearToken();
        $this->tokenStorage->save($tokenTransfer);

        return $tokenTransfer;
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

        $abstractTransfer->setToken($tokenTransfer->getAccessToken());

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
     * @param BladeFxReportsListRequestTransfer|null $reportsListRequestTransfer
     * @return BladeFxReportsListResponseTransfer
     * @throws \DateMalformedStringException
     */
    public function sendGetReportsListRequest(
        ?BladeFxReportsListRequestTransfer $reportsListRequestTransfer = (new BladeFxReportsListRequestTransfer())
    ): BladeFxReportsListResponseTransfer {
        /** @var BladeFxReportsListRequestTransfer $reportsListRequestTransfer */
        $reportsListRequestTransfer = $this->prepareRequest($reportsListRequestTransfer);

        return $this->apiHandler->getReportsList($reportsListRequestTransfer);
    }

    /**
     * @param BladeFxCategoriesListRequestTransfer|null $categoriesListRequestTransfer
     * @return BladeFxCategoriesListResponseTransfer
     * @throws \DateMalformedStringException
     */
    public function sendGetCategoriesListRequest(
        ?BladeFxCategoriesListRequestTransfer $categoriesListRequestTransfer = (new BladeFxCategoriesListRequestTransfer())
    ): BladeFxCategoriesListResponseTransfer {
        /** @var BladeFxCategoriesListRequestTransfer $categoriesListRequestTransfer */
        $categoriesListRequestTransfer = $this->prepareRequest($categoriesListRequestTransfer);

        return $this->apiHandler->getCategoriesList($categoriesListRequestTransfer);
    }

    /**
     * @param BladeFxReportParamFormRequestTransfer|null $reportsParamFormRequestTransfer
     * @return BladeFxReportParamFormResponseTransfer
     * @throws \DateMalformedStringException
     */
    public function sendGetReportParamFormRequest(
        ?BladeFxReportParamFormRequestTransfer $reportsParamFormRequestTransfer = (new BladeFxReportParamFormRequestTransfer())
    ): BladeFxReportParamFormResponseTransfer {
        /** @var BladeFxReportParamFormRequestTransfer $reportsParamFormRequestTransfer */
        $reportsParamFormRequestTransfer = $this->prepareRequest($reportsParamFormRequestTransfer);

        return $this->apiHandler->getReportParamForm($reportsParamFormRequestTransfer);
    }

    /**
     * @param BladeFxReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer
     * @return BladeFxReportPreviewResponseTransfer
     * @throws \DateMalformedStringException
     */
    public function sendGetReportPreviewRequest(
        BladeFxReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer
    ): BladeFxReportPreviewResponseTransfer {
        /** @var BladeFxReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer */
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
