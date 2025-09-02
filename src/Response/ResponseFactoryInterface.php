<?php


namespace Xiphias\Client\ReportsApi\Response;

use Xiphias\Client\ReportsApi\Response\Converter\ResponseConverterInterface;
use Xiphias\Client\ReportsApi\Response\Validator\ResponseValidatorInterface;

interface ResponseFactoryInterface
{
    /**
     * @return \Xiphias\Client\ReportsApi\Response\Converter\ResponseConverterInterface
     */
    public function createCategoriesListResponseConverter(): ResponseConverterInterface;

    /**
     * @return \Xiphias\Client\ReportsApi\Response\Validator\ResponseValidatorInterface
     */
    public function createCategoriesListResponseValidator(): ResponseValidatorInterface;
}
