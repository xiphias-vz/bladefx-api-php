<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request;

use Psr\Log\LoggerInterface;
use Xiphias\BladeFxApi\BladeFxApiConfig;
use Xiphias\BladeFxApi\Plugins\Formatter\AuthenticationRequestFieldFormatterPlugin;
use Xiphias\BladeFxApi\Request\Builder\AuthenticationRequestBuilder;
use Xiphias\BladeFxApi\Request\Builder\CategoriesListRequestBuilder;
use Xiphias\BladeFxApi\Request\Builder\CreateOrUpdateUserOnBladeFxRequestBuilder;
use Xiphias\BladeFxApi\Request\Builder\ReportByFormatRequestBuilder;
use Xiphias\BladeFxApi\Request\Builder\ReportParamFormRequestBuilder;
use Xiphias\BladeFxApi\Request\Builder\ReportPreviewRequestBuilder;
use Xiphias\BladeFxApi\Request\Builder\ReportsListRequestBuilder;
use Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface;
use Xiphias\BladeFxApi\Request\Builder\SetFavoriteReportRequestBuilder;
use Xiphias\BladeFxApi\Request\Builder\UpdatePasswordOnBladeFxRequestBuilder;
use Xiphias\BladeFxApi\Request\Formatter\RequestBodyFormatter;
use Xiphias\BladeFxApi\Request\Formatter\RequestBodyFormatterInterface;
use Xiphias\BladeFxApi\Request\Validator\AuthenticationRequestValidator;
use Xiphias\BladeFxApi\Request\Validator\CategoriesListRequestValidator;
use Xiphias\BladeFxApi\Request\Validator\CreateOrUpdateUserOnBladeFxRequestValidator;
use Xiphias\BladeFxApi\Request\Validator\ReportByFormatRequestValidator;
use Xiphias\BladeFxApi\Request\Validator\ReportParamFormRequestValidator;
use Xiphias\BladeFxApi\Request\Validator\ReportPreviewRequestValidator;
use Xiphias\BladeFxApi\Request\Validator\ReportsListRequestValidator;
use Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface;
use Xiphias\BladeFxApi\Request\Validator\SetFavoriteReportRequestValidator;
use Xiphias\BladeFxApi\Request\Validator\UpdatePasswordOnBladeFxRequestValidator;

class RequestFactory implements RequestFactoryInterface
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createAuthenticationRequestValidator(): RequestValidatorInterface
    {
        return new AuthenticationRequestValidator($this->logger);
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createCategoriesListRequestValidator(): RequestValidatorInterface
    {
        return new CategoriesListRequestValidator($this->logger);
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createReportsListRequestValidator(): RequestValidatorInterface
    {
        return new ReportsListRequestValidator($this->logger);
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createReportParamFormRequestValidator(): RequestValidatorInterface
    {
        return new ReportParamFormRequestValidator($this->logger);
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createReportPreviewRequestValidator(): RequestValidatorInterface
    {
        return new ReportPreviewRequestValidator($this->logger);
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createSetFavoriteReportRequestValidator(): RequestValidatorInterface
    {
        return new SetFavoriteReportRequestValidator($this->logger);
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createCreateOrUpdateUserOnBladeFxRequestValidator(): RequestValidatorInterface
    {
        return new CreateOrUpdateUserOnBladeFxRequestValidator($this->logger);
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createUpdatePasswordOnBladeFxRequestValidator(): RequestValidatorInterface
    {
        return new UpdatePasswordOnBladeFxRequestValidator($this->logger);
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createReportByFormatRequestValidator(): RequestValidatorInterface
    {
        return new ReportByFormatRequestValidator($this->logger);
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createAuthenticationRequestBuilder(): RequestBuilderInterface
    {
        return new AuthenticationRequestBuilder(
            $this->getConfig(),
            $this->createRequestBodyFormatter(),
            $this->getAuthenticationRequestFormatterPlugins(),
        );
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createCategoriesListRequestBuilder(): RequestBuilderInterface
    {
        return new CategoriesListRequestBuilder(
            $this->getConfig(),
            $this->createRequestBodyFormatter(),
        );
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createReportsListRequestBuilder(): RequestBuilderInterface
    {
        return new ReportsListRequestBuilder(
            $this->getConfig(),
            $this->createRequestBodyFormatter(),
        );
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createReportParamFormRequestBuilder(): RequestBuilderInterface
    {
        return new ReportParamFormRequestBuilder(
            $this->getConfig(),
            $this->createRequestBodyFormatter(),
        );
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createReportPreviewRequestBuilder(): RequestBuilderInterface
    {
        return new ReportPreviewRequestBuilder(
            $this->createRequestBodyFormatter(),
            $this->getConfig(),
        );
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createSetFavoriteReportRequestBuilder(): RequestBuilderInterface
    {
        return new SetFavoriteReportRequestBuilder(
            $this->getConfig(),
            $this->createRequestBodyFormatter(),
        );
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createCreateOrUpdateUserOnBladeFxRequestBuilder(): RequestBuilderInterface
    {
        return new CreateOrUpdateUserOnBladeFxRequestBuilder(
            $this->getConfig(),
            $this->createRequestBodyFormatter(),
        );
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createUpdatePasswordOnBladeFxRequestBuilder(): RequestBuilderInterface
    {
        return new UpdatePasswordOnBladeFxRequestBuilder(
            $this->getConfig(),
            $this->createRequestBodyFormatter(),
        );
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createReportByFormatRequestBuilder(): RequestBuilderInterface
    {
        return new ReportByFormatRequestBuilder(
            $this->getConfig(),
            $this->createRequestBodyFormatter(),
        );
    }

    /**
     * @return array<\Xiphias\BladeFxApi\Plugins\Formatter\AuthenticationRequestFieldFormatterPlugin>
     */
    protected function getAuthenticationRequestFormatterPlugins(): array
    {
        return [
            new AuthenticationRequestFieldFormatterPlugin(),
        ];
    }

    /**
     * @return \Xiphias\BladeFxApi\Request\Formatter\RequestBodyFormatterInterface
     */
    public function createRequestBodyFormatter(): RequestBodyFormatterInterface
    {
        return new RequestBodyFormatter(
            $this->getConfig(),
        );
    }

    /**
     * @return \Xiphias\BladeFxApi\BladeFxApiConfig
     */
    protected function getConfig(): BladeFxApiConfig
    {
        return new BladeFxApiConfig();
    }
}
