<?php


namespace Xiphias\BladeFxApi\Response;

use Psr\Http\Message\ResponseInterface;
use Xiphias\BladeFxApi\DTO\BladeFXCategoriesListResponseTransfer;

interface ResponseManagerInterface
{
//    /**
//     * @param \Psr\Http\Message\ResponseInterface|null $response
//     *
//     * @return \Generated\Shared\Transfer\BladeFxAuthenticationResponseTransfer
//     */
//    public function getAuthenticationUserResponseTransfer(?ResponseInterface $response): BladeFxAuthenticationResponseTransfer;

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer
     */
    public function getCategoriesListResponseTransfer(?ResponseInterface $response): BladeFxCategoriesListResponseTransfer;

//    /**
//     * @param \Psr\Http\Message\ResponseInterface|null $response
//     *
//     * @return \Generated\Shared\Transfer\BladeFxGetReportsListResponseTransfer
//     */
//    public function getReportsListResponseTransfer(?ResponseInterface $response): BladeFxGetReportsListResponseTransfer;
}
