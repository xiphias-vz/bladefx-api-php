<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response;

use Xiphias\BladeFxApi\Response\Converter\ResponseConverterInterface;
use Xiphias\BladeFxApi\Response\Validator\ResponseValidatorInterface;

interface ResponseFactoryInterface
{
    /**
     * @return ResponseConverterInterface
     */
    public function createAuthenticationResponseConverter(): ResponseConverterInterface;

    /**
     * @return ResponseValidatorInterface
     */
    public function createAuthenticationResponseValidator(): ResponseValidatorInterface;

    /**
     * @return ResponseConverterInterface
     */
    public function createCategoriesListResponseConverter(): ResponseConverterInterface;

    /**
     * @return ResponseValidatorInterface
     */
    public function createCategoriesListResponseValidator(): ResponseValidatorInterface;

    /**
     * @return ResponseConverterInterface
     */
    public function createReportsListResponseConverter(): ResponseConverterInterface;

    /**
     * @return ResponseValidatorInterface
     */
    public function createReportsListResponseValidator(): ResponseValidatorInterface;

    /**
     * @return ResponseConverterInterface
     */
    public function createReportParamFormRequestConverter(): ResponseConverterInterface;

    /**
     * @return ResponseValidatorInterface
     */
    public function createReportParamFormResponseValidator(): ResponseValidatorInterface;

    /**
     * @return ResponseConverterInterface
     */
    public function createReportPreviewResponseConverter(): ResponseConverterInterface;

    /**
     * @return ResponseValidatorInterface
     */
    public function createResponsePreviewValidator(): ResponseValidatorInterface;

    /**
     * @return ResponseConverterInterface
     */
    public function createSetFavoriteReportResponseConverter(): ResponseConverterInterface;

    /**
     * @return ResponseValidatorInterface
     */
    public function createSetFavoriteReportResponseValidator(): ResponseValidatorInterface;

    /**
     * @return ResponseConverterInterface
     */
    public function createCreateOrUpdateUserOnBfxResponseConverter(): ResponseConverterInterface;

    /**
     * @return ResponseValidatorInterface
     */
    public function createCreateOrUpdateUserOnBfxResponseValidator(): ResponseValidatorInterface;

    /**
     * @return ResponseConverterInterface
     */
    public function createUpdatePasswordOnBladeFxResponseConverter(): ResponseConverterInterface;

    /**
     * @return ResponseValidatorInterface
     */
    public function createUpdatePasswordOnBladeFxResponseValidator(): ResponseValidatorInterface;
}
