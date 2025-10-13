<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Storage;

use Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer;

class FileTokenStorage implements TokenStorageInterface
{
    public function __construct(private string $filePath = '/tmp/api_token.json') {}

    public function save(BladeFxTokenTransfer $token): void
    {
        file_put_contents($this->filePath, json_encode($token->toArray(), JSON_PRETTY_PRINT));
    }

    public function load(): ?BladeFxTokenTransfer
    {
        if (!file_exists($this->filePath)) {
            return null;
        }

        $data = json_decode(file_get_contents($this->filePath), true);
        if (empty($data['access_token'])) {
            return null;
        }

        return BladeFxTokenTransfer::fromArray($data);
    }

    public function clear(): void
    {
        if (file_exists($this->filePath)) {
            unlink($this->filePath);
        }
    }
}
