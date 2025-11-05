<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request;

use Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface;
use Xiphias\BladeFxApi\Request\Formatter\RequestBodyFormatterInterface;
use Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface;

interface RequestFactoryInterface
{
    /**
     * @return \Xiphias\BladeFxApi\Request\Formatter\RequestBodyFormatterInterface
     */
    public function createRequestBodyFormatter(): RequestBodyFormatterInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createAuthenticationRequestBuilder(): RequestBuilderInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createAuthenticationRequestValidator(): RequestValidatorInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createCategoriesListRequestBuilder(): RequestBuilderInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createCategoriesListRequestValidator(): RequestValidatorInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createReportsListRequestBuilder(): RequestBuilderInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createReportsListRequestValidator(): RequestValidatorInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createReportParamFormRequestBuilder(): RequestBuilderInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createReportParamFormRequestValidator(): RequestValidatorInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createReportPreviewRequestBuilder(): RequestBuilderInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createReportPreviewRequestValidator(): RequestValidatorInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createSetFavoriteReportRequestBuilder(): RequestBuilderInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createSetFavoriteReportRequestValidator(): RequestValidatorInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createCreateOrUpdateUserOnBladeFxRequestBuilder(): RequestBuilderInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createCreateOrUpdateUserOnBladeFxRequestValidator(): RequestValidatorInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createUpdatePasswordOnBladeFxRequestBuilder(): RequestBuilderInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createUpdatePasswordOnBladeFxRequestValidator(): RequestValidatorInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface
     */
    public function createReportByFormatRequestBuilder(): RequestBuilderInterface;

    /**
     * @return \Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface
     */
    public function createReportByFormatRequestValidator(): RequestValidatorInterface;
}
