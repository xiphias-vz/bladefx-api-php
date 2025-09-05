<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response;

use Symfony\Contracts\HttpClient\ResponseInterface;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportParamFormResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportsListResponseTransfer;

interface ResponseManagerInterface
{
    /**
     * @param ResponseInterface|null $response
     * @return BladeFxAuthenticationResponseTransfer
     */
    public function getAuthenticationUserResponseTransfer(?ResponseInterface $response): BladeFxAuthenticationResponseTransfer;

    /**
     * @param ResponseInterface|null $response
     * @return BladeFxCategoriesListResponseTransfer
     */
    public function getCategoriesListResponseTransfer(?ResponseInterface $response): BladeFxCategoriesListResponseTransfer;

    /**
     * @param ResponseInterface|null $response
     * @return BladeFxReportsListResponseTransfer
     */
    public function getReportsListResponseTransfer(?ResponseInterface $response): BladeFxReportsListResponseTransfer;

    /**
     * @param ResponseInterface|null $response
     * @return BladeFxReportParamFormResponseTransfer
     */
    public function getReportParamFormResponseTransfer(?ResponseInterface $response): BladeFxReportParamFormResponseTransfer;

    /**
     * @param ResponseInterface|null $response
     * @return BladeFxReportPreviewResponseTransfer
     */
    public function getReportPreviewResponseTransfer(?ResponseInterface $response): BladeFxReportPreviewResponseTransfer;
}
