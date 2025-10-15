<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Plugins\Formatter;

interface AuthenticationRequestFormatterPluginInterface
{
    /**
     * @param array<mixed> $requestData
     *
     * @return array<mixed>
     */
    public function format(array $requestData): array;
}
