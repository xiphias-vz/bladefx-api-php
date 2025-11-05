<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response;

use Xiphias\BladeFxApi\Response\Converter\ReportByFormatResponseConverterInterface;
use Xiphias\BladeFxApi\Response\Converter\ResponseConverterInterface;
use Xiphias\BladeFxApi\Response\Validator\ResponseValidatorInterface;

interface ResponseFactoryInterface
{
    /**
     * @return \Xiphias\BladeFxApi\Response\Converter\ResponseConverterInterface
     */
    public function createAuthenticationResponseConverter(): ResponseConverterInterface;

    /**
     * @return \Xiphias\BladeFxApi\Response\Validator\ResponseValidatorInterface
     */
    public function createAuthenticationResponseValidator(): ResponseValidatorInterface;

    /**
     * @return \Xiphias\BladeFxApi\Response\Converter\ResponseConverterInterface
     */
    public function createCategoriesListResponseConverter(): ResponseConverterInterface;

    /**
     * @return \Xiphias\BladeFxApi\Response\Validator\ResponseValidatorInterface
     */
    public function createCategoriesListResponseValidator(): ResponseValidatorInterface;

    /**
     * @return \Xiphias\BladeFxApi\Response\Converter\ResponseConverterInterface
     */
    public function createReportsListResponseConverter(): ResponseConverterInterface;

    /**
     * @return \Xiphias\BladeFxApi\Response\Validator\ResponseValidatorInterface
     */
    public function createReportsListResponseValidator(): ResponseValidatorInterface;

    /**
     * @return \Xiphias\BladeFxApi\Response\Converter\ResponseConverterInterface
     */
    public function createReportParamFormRequestConverter(): ResponseConverterInterface;

    /**
     * @return \Xiphias\BladeFxApi\Response\Validator\ResponseValidatorInterface
     */
    public function createReportParamFormResponseValidator(): ResponseValidatorInterface;

    /**
     * @return \Xiphias\BladeFxApi\Response\Converter\ResponseConverterInterface
     */
    public function createReportPreviewResponseConverter(): ResponseConverterInterface;

    /**
     * @return \Xiphias\BladeFxApi\Response\Validator\ResponseValidatorInterface
     */
    public function createResponsePreviewValidator(): ResponseValidatorInterface;

    /**
     * @return \Xiphias\BladeFxApi\Response\Converter\ResponseConverterInterface
     */
    public function createSetFavoriteReportResponseConverter(): ResponseConverterInterface;

    /**
     * @return \Xiphias\BladeFxApi\Response\Validator\ResponseValidatorInterface
     */
    public function createSetFavoriteReportResponseValidator(): ResponseValidatorInterface;

    /**
     * @return \Xiphias\BladeFxApi\Response\Converter\ResponseConverterInterface
     */
    public function createCreateOrUpdateUserOnBfxResponseConverter(): ResponseConverterInterface;

    /**
     * @return \Xiphias\BladeFxApi\Response\Validator\ResponseValidatorInterface
     */
    public function createCreateOrUpdateUserOnBfxResponseValidator(): ResponseValidatorInterface;

    /**
     * @return \Xiphias\BladeFxApi\Response\Converter\ResponseConverterInterface
     */
    public function createUpdatePasswordOnBladeFxResponseConverter(): ResponseConverterInterface;

    /**
     * @return \Xiphias\BladeFxApi\Response\Validator\ResponseValidatorInterface
     */
    public function createUpdatePasswordOnBladeFxResponseValidator(): ResponseValidatorInterface;

    /**
     * @return \Xiphias\BladeFxApi\Response\Converter\ReportByFormatResponseConverterInterface
     */
    public function createReportByFormatResponseConverter(): ReportByFormatResponseConverterInterface;

    /**
     * @return \Xiphias\BladeFxApi\Response\Validator\ResponseValidatorInterface
     */
    public function createReportByFormatResponseValidator(): ResponseValidatorInterface;
}
