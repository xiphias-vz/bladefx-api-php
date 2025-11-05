<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Storage;

use Xiphias\BladeFxApi\BladeFxApiConfig;
use Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer;

class FileTokenStorage implements TokenStorageInterface
{
    /**
     * @param string $filePath
     */
    public function __construct(
        private string $filePath = BladeFxApiConfig::AUTH_TOKEN_FILE_PATH
    ) {
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer $token
     *
     * @return void
     */
    public function save(BladeFxTokenTransfer $token): void
    {
        file_put_contents($this->filePath, json_encode($token->toArray(), JSON_PRETTY_PRINT));
    }

    /**
     * @return \Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer|null
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

    /**
     * @return void
     */
    public function clear(): void
    {
        if (file_exists($this->filePath)) {
            unlink($this->filePath);
        }
    }
}
