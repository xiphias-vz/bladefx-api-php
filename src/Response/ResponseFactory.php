<?php


namespace Xiphias\Client\ReportsApi\Response;

use Spryker\Service\UtilEncoding\UtilEncodingServiceInterface;
use Xiphias\Client\ReportsApi\Response\Converter\AuthenticationResponseConverter;
use Xiphias\Client\ReportsApi\Response\Converter\CategoriesListResponseConverter;
use Xiphias\Client\ReportsApi\Response\Converter\CreateOrUpdateUserOnBladeFxResponseConverter;
use Xiphias\Client\ReportsApi\Response\Converter\ReportByFormatResponseConverter;
use Xiphias\Client\ReportsApi\Response\Converter\ReportParameterListResponseConverter;
use Xiphias\Client\ReportsApi\Response\Converter\ReportParamFormResponseConverter;
use Xiphias\Client\ReportsApi\Response\Converter\ReportPreviewResponseConverter;
use Xiphias\Client\ReportsApi\Response\Converter\ReportsListResponseConverter;
use Xiphias\Client\ReportsApi\Response\Converter\ResponseConverterInterface;
use Xiphias\Client\ReportsApi\Response\Converter\SetFavoriteReportResponseConverter;
use Xiphias\Client\ReportsApi\Response\Converter\UpdatePasswordOnBladeFxResponseConverter;
use Xiphias\Client\ReportsApi\Response\Validator\AuthenticationResponseValidator;
use Xiphias\Client\ReportsApi\Response\Validator\CategoriesListResponseValidator;
use Xiphias\Client\ReportsApi\Response\Validator\CreateOrUpdateUserOnBladeFxResponseValidator;
use Xiphias\Client\ReportsApi\Response\Validator\ReportByFormatResponseValidator;
use Xiphias\Client\ReportsApi\Response\Validator\ReportParameterListResponseValidator;
use Xiphias\Client\ReportsApi\Response\Validator\ReportParamFormResponseValidator;
use Xiphias\Client\ReportsApi\Response\Validator\ReportPreviewResponseValidator;
use Xiphias\Client\ReportsApi\Response\Validator\ReportsListResponseValidator;
use Xiphias\Client\ReportsApi\Response\Validator\ResponseValidatorInterface;
use Xiphias\Client\ReportsApi\Response\Validator\SetFavoriteReportResponseValidator;
use Xiphias\Client\ReportsApi\Response\Validator\UpdatePasswordOnBladeFxResponseValidator;

class ResponseFactory implements ResponseFactoryInterface
{
//    private UtilEncodingServiceInterface $utilEncodingService;
//
//    /**
//     * @param \Spryker\Service\UtilEncoding\UtilEncodingServiceInterface $utilEncodingService
//     */
//    public function __construct(UtilEncodingServiceInterface $utilEncodingService)
//    {
//        $this->utilEncodingService = $utilEncodingService;
//    }

    /**
     * @return \Xiphias\Client\ReportsApi\Response\Converter\ResponseConverterInterface
     */
    public function createCategoriesListResponseConverter(): ResponseConverterInterface
    {
        return new CategoriesListResponseConverter($this->utilEncodingService);
    }

    /**
     * @return \Xiphias\Client\ReportsApi\Response\Validator\ResponseValidatorInterface
     */
    public function createCategoriesListResponseValidator(): ResponseValidatorInterface
    {
        return new CategoriesListResponseValidator();
    }
}
