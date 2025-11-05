<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Storage;

use Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer;

interface TokenStorageInterface
{
    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer $token
     *
     * @return void
     */
    public function save(BladeFxTokenTransfer $token): void;

    /**
     * @return \Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer|null
     */
    public function load(): ?BladeFxTokenTransfer;

    /**
     * @return void
     */
    public function clear(): void;
}
