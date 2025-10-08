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

class BladeFxApiClient
{
    protected ?LoggerInterface $logger;

    protected ApiHandlerInterface $apiHandler;

    /**
     * @param string $bladeFxBaseUrl
     * @param string $bladeFxUsername
     * @param string $bladeFxPassword
     * @param LoggerInterface|null $logger
     */
    public function __construct(
        protected string                    $bladeFxBaseUrl,
        protected string                    $bladeFxUsername,
        protected string                    $bladeFxPassword,
        ?LoggerInterface                    $logger = null
    )
    {
        $this->logger = $logger ?? new StdoutLogger();
        $this->apiHandler = $this->createApiHandler();
    }

    /**
     * @return BladeFxAuthenticationResponseTransfer|null
     */
    public function authenticateUser(): ?BladeFxAuthenticationResponseTransfer
    {
        $authRequestTransfer = new BladeFxAuthenticationRequestTransfer();
        $authRequestTransfer->setUsername($this->bladeFxUsername);
        $authRequestTransfer->setPassword($this->bladeFxPassword);
        $this->logger->info("Authenticating user");

        return $this->apiHandler->authenticateUser($authRequestTransfer);
    }

    /**
     * @param BladeFxReportsListRequestTransfer|null $reportsListRequestTransfer
     * @return BladeFxReportsListResponseTransfer
     */
    public function getReportList(
        ?BladeFxReportsListRequestTransfer $reportsListRequestTransfer = (new BladeFxReportsListRequestTransfer())
    ): BladeFxReportsListResponseTransfer
    {
        /** @var BladeFxReportsListRequestTransfer $reportsListRequestTransfer */
        $reportsListRequestTransfer = $this->mapTokenTransfer($reportsListRequestTransfer);

        return $this->apiHandler->getReportsList($reportsListRequestTransfer);
    }

    /**
     * @param BladeFxCategoriesListRequestTransfer|null $categoriesListRequestTransfer
     * @return BladeFxCategoriesListResponseTransfer
     */
    public function getCategoryList(
        ?BladeFxCategoriesListRequestTransfer $categoriesListRequestTransfer = (new BladeFxCategoriesListRequestTransfer())
    ): BladeFxCategoriesListResponseTransfer
    {
        /** @var BladeFxCategoriesListRequestTransfer $categoriesListRequestTransfer */
        $categoriesListRequestTransfer = $this->mapTokenTransfer($categoriesListRequestTransfer);

        return $this->apiHandler->getCategoriesList($categoriesListRequestTransfer);
    }


    public function getReportUrl(
        ?BladeFxReportParamFormRequestTransfer $reportsParamFormRequestTransfer = (new BladeFxReportParamFormRequestTransfer())
    ): BladeFxReportParamFormResponseTransfer
    {
        /** @var BladeFxReportParamFormRequestTransfer $reportsParamFormRequestTransfer */
        $reportsParamFormRequestTransfer = $this->mapTokenTransfer($reportsParamFormRequestTransfer);

        return $this->apiHandler->getReportParamForm($reportsParamFormRequestTransfer);
    }

    /**
     * @param BladeFxReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer
     * @return BladeFxReportPreviewResponseTransfer
     */
    public function getReportPreviewURL(
        BladeFxReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer
    ): BladeFxReportPreviewResponseTransfer
    {
        /** @var BladeFxReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer */
        $bladeFxReportPreviewRequestTransfer = $this->mapTokenTransfer($bladeFxReportPreviewRequestTransfer);

        return $this->apiHandler->getReportPreview($bladeFxReportPreviewRequestTransfer);
    }

    public function setFavoriteReport(
        ?BladeFxSetFavoriteReportRequestTransfer $bladeFxSetFavoriteReportRequestTransfer
    ): BladeFxSetFavoriteReportResponseTransfer
    {
        /** @var BladeFxSetFavoriteReportRequestTransfer $bladeFxSetFavoriteReportRequestTransfer */
        $bladeFxSetFavoriteReportRequestTransfer = $this->mapTokenTransfer($bladeFxSetFavoriteReportRequestTransfer);

        return $this->apiHandler->setFavoriteReport($bladeFxSetFavoriteReportRequestTransfer);
    }

    protected function mapTokenTransfer(AbstractTransfer $abstractTransfer): AbstractTransfer
    {
        $tokenTransfer = new BladeFxTokenTransfer();
        $tokenTransfer->setToken($this->authenticateUser()->getToken());
        $abstractTransfer->setToken($tokenTransfer);

        return $abstractTransfer;
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
            $this->createConfig(),
            $this->createRequestFactory(),
        );
    }

    /**
     * @return \Xiphias\BladeFxApi\Http\Client\HttpApiClient
     */
    protected function createHttpClient(): HttpApiClient
    {
        return new HttpApiClient(
            $this->createGuzzleClient(),
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

    /**
     * @return \Xiphias\BladeFxApi\BladeFxApiConfig
     */
    protected function createConfig(): BladeFxApiConfig
    {
        return new BladeFxApiConfig();
    }

    /**
     * @return \GuzzleHttp\ClientInterface
     */
    protected function createGuzzleClient(): ClientInterface
    {
        return new Client([
            'timeout' => 30,
        ]);
    }
}
