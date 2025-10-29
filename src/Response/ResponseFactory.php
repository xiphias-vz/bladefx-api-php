<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response;

use Psr\Log\LoggerInterface;
use Xiphias\BladeFxApi\Response\Converter\AuthenticationResponseConverter;
use Xiphias\BladeFxApi\Response\Converter\CategoriesListResponseConverter;
use Xiphias\BladeFxApi\Response\Converter\ReportParamFormResponseConverter;
use Xiphias\BladeFxApi\Response\Converter\ReportPreviewResponseConverter;
use Xiphias\BladeFxApi\Response\Converter\ReportsListResponseConverter;
use Xiphias\BladeFxApi\Response\Converter\ResponseConverterInterface;
use Xiphias\BladeFxApi\Response\Converter\SetFavoriteReportResponseConverter;
use Xiphias\BladeFxApi\Response\Converter\CreateOrUpdateUserOnBladeFxResponseConverter;
use Xiphias\BladeFxApi\Response\Converter\UpdatePasswordOnBladeFxResponseConverter;
use Xiphias\BladeFxApi\Response\Validator\AuthenticationResponseValidator;
use Xiphias\BladeFxApi\Response\Validator\CategoriesListResponseValidator;
use Xiphias\BladeFxApi\Response\Validator\ReportParamFormResponseValidator;
use Xiphias\BladeFxApi\Response\Validator\ReportPreviewResponseValidator;
use Xiphias\BladeFxApi\Response\Validator\ReportsListResponseValidator;
use Xiphias\BladeFxApi\Response\Validator\ResponseValidatorInterface;
use Xiphias\BladeFxApi\Response\Validator\SetFavoriteReportResponseValidator;
use Xiphias\BladeFxApi\Response\Validator\CreateOrUpdateUserOnBladeFxResponseValidator;
use Xiphias\BladeFxApi\Response\Validator\UpdatePasswordOnBladeFxResponseValidator;

class ResponseFactory implements ResponseFactoryInterface
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return ResponseConverterInterface
     */
    public function createAuthenticationResponseConverter(): ResponseConverterInterface
    {
        return new AuthenticationResponseConverter($this->logger);
    }

    /**
     * @return ResponseValidatorInterface
     */
    public function createAuthenticationResponseValidator(): ResponseValidatorInterface
    {
        return new AuthenticationResponseValidator($this->logger);
    }

    /**
     * @return ResponseConverterInterface
     */
    public function createCategoriesListResponseConverter(): ResponseConverterInterface
    {
        return new CategoriesListResponseConverter($this->logger);
    }

    /**
     * @return ResponseValidatorInterface
     */
    public function createCategoriesListResponseValidator(): ResponseValidatorInterface
    {
        return new CategoriesListResponseValidator($this->logger);
    }

    /**
     * @return ResponseConverterInterface
     */
    public function createReportsListResponseConverter(): ResponseConverterInterface
    {
        return new ReportsListResponseConverter($this->logger);
    }

    /**
     * @return ResponseValidatorInterface
     */
    public function createReportsListResponseValidator(): ResponseValidatorInterface
    {
        return new ReportsListResponseValidator($this->logger);
    }

    /**
     * @return ResponseConverterInterface
     */
    public function createReportParamFormRequestConverter(): ResponseConverterInterface
    {
        return new ReportParamFormResponseConverter($this->logger);
    }

    /**
     * @return ResponseValidatorInterface
     */
    public function createReportParamFormResponseValidator(): ResponseValidatorInterface
    {
        return new ReportParamFormResponseValidator($this->logger);
    }

    /**
     * @return ResponseConverterInterface
     */
    public function createReportPreviewResponseConverter(): ResponseConverterInterface
    {
        return new ReportPreviewResponseConverter($this->logger);
    }

    /**
     * @return ResponseValidatorInterface
     */
    public function createResponsePreviewValidator(): ResponseValidatorInterface
    {
        return new ReportPreviewResponseValidator($this->logger);
    }

    /**
     * @return ResponseConverterInterface
     */
    public function createSetFavoriteReportResponseConverter(): ResponseConverterInterface
    {
        return new SetFavoriteReportResponseConverter($this->logger);
    }

    /**
     * @return ResponseValidatorInterface
     */
    public function createSetFavoriteReportResponseValidator(): ResponseValidatorInterface
    {
        return new SetFavoriteReportResponseValidator($this->logger);
    }

    /**
     * @return ResponseConverterInterface
     */
    public function createCreateOrUpdateUserOnBfxResponseConverter(): ResponseConverterInterface
    {
        return new CreateOrUpdateUserOnBladeFxResponseConverter($this->logger);
    }

    /**
     * @return ResponseValidatorInterface
     */
    public function createCreateOrUpdateUserOnBfxResponseValidator(): ResponseValidatorInterface
    {
        return new CreateOrUpdateUserOnBladeFxResponseValidator($this->logger);
    }

    /**
     * @return ResponseConverterInterface
     */
    public function createUpdatePasswordOnBladeFxResponseConverter(): ResponseConverterInterface
    {
        return new UpdatePasswordOnBladeFxResponseConverter($this->logger);
    }

    /**
     * @return ResponseValidatorInterface
     */
    public function createUpdatePasswordOnBladeFxResponseValidator(): ResponseValidatorInterface
    {
        return new UpdatePasswordOnBladeFxResponseValidator($this->logger);
    }
}
