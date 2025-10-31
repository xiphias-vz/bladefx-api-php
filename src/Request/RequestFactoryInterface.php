<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request;

use Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface;
use Xiphias\BladeFxApi\Request\Formatter\RequestBodyFormatterInterface;
use Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface;

interface RequestFactoryInterface
{
    /**
     * @return RequestBodyFormatterInterface
     */
    public function createRequestBodyFormatter(): RequestBodyFormatterInterface;

    /**
     * @return RequestBuilderInterface
     */
    public function createAuthenticationRequestBuilder(): RequestBuilderInterface;

    /**
     * @return RequestValidatorInterface
     */
    public function createAuthenticationRequestValidator(): RequestValidatorInterface;

    /**
     * @return RequestBuilderInterface
     */
    public function createCategoriesListRequestBuilder(): RequestBuilderInterface;

    /**
     * @return RequestValidatorInterface
     */
    public function createCategoriesListRequestValidator(): RequestValidatorInterface;

    /**
     * @return RequestBuilderInterface
     */
    public function createReportsListRequestBuilder(): RequestBuilderInterface;

    /**
     * @return RequestValidatorInterface
     */
    public function createReportsListRequestValidator(): RequestValidatorInterface;

    /**
     * @return RequestBuilderInterface
     */
    public function createReportParamFormRequestBuilder(): RequestBuilderInterface;

    /**
     * @return RequestValidatorInterface
     */
    public function createReportParamFormRequestValidator(): RequestValidatorInterface;

    /**
     * @return RequestBuilderInterface
     */
    public function createReportPreviewRequestBuilder(): RequestBuilderInterface;

    /**
     * @return RequestValidatorInterface
     */
    public function createReportPreviewRequestValidator(): RequestValidatorInterface;

    /**
     * @return RequestBuilderInterface
     */
    public function createSetFavoriteReportRequestBuilder(): RequestBuilderInterface;

    /**
     * @return RequestValidatorInterface
     */
    public function createSetFavoriteReportRequestValidator(): RequestValidatorInterface;

    /**
     * @return RequestBuilderInterface
     */
    public function createCreateOrUpdateUserOnBladeFxRequestBuilder(): RequestBuilderInterface;

    /**
     * @return RequestValidatorInterface
     */
    public function createCreateOrUpdateUserOnBladeFxRequestValidator(): RequestValidatorInterface;

    /**
     * @return RequestBuilderInterface
     */
    public function createUpdatePasswordOnBladeFxRequestBuilder(): RequestBuilderInterface;

    /**
     * @return RequestValidatorInterface
     */
    public function createUpdatePasswordOnBladeFxRequestValidator(): RequestValidatorInterface;

    /**
     * @return RequestBuilderInterface
     */
    public function createReportByFormatRequestBuilder(): RequestBuilderInterface;

    /**
     * @return RequestValidatorInterface
     */
    public function createReportByFormatRequestValidator(): RequestValidatorInterface;
}
