<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Storage;

use Xiphias\BladeFxApi\BladeFxApiConfig;
use Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer;

class FileTokenStorage implements TokenStorageInterface
{
    public function __construct(
        private string $filePath = BladeFxApiConfig::AUTH_TOKEN_FILE_PATH
    ) {
    }

    public function save(BladeFxTokenTransfer $token): void
    {
        file_put_contents($this->filePath, json_encode($token->toArray(), JSON_PRETTY_PRINT));
    }

    /**
     * @throws \DateMalformedStringException
     */
    public function load(): ?BladeFxTokenTransfer
    {
        if (!file_exists($this->filePath)) {
            return null;
        }

        $data = json_decode(file_get_contents($this->filePath), true);
        if (empty($data['accessToken'])) {
            return null;
        }

        $bladeFxTokenTransfer = new BladeFxTokenTransfer();
        $bladeFxTokenTransfer->fromArray($data);

        return $bladeFxTokenTransfer;
    }

    public function clear(): void
    {
        if (file_exists($this->filePath)) {
            unlink($this->filePath);
        }
    }
}
