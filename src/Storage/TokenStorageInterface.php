<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Storage;

use Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer;

interface TokenStorageInterface
{
    public function save(BladeFxTokenTransfer $token): void;

    public function load(): ?BladeFxTokenTransfer;

    public function clear(): void;
}
