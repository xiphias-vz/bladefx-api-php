<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxTokenTransfer
{
    protected string $accessToken;

    private ?\DateTimeImmutable $expiresAt;

    public function __construct(string $accessToken, ?\DateTimeImmutable $expiresAt = null)
    {
        $this->accessToken = $accessToken;
        $this->expiresAt = $expiresAt;
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function getExpiresAt(): ?\DateTimeImmutable
    {
        return $this->expiresAt;
    }

    public function isExpired(): bool
    {
        return $this->expiresAt !== null && $this->expiresAt <= new \DateTimeImmutable();
    }

    public function toArray(): array
    {
        return [
            'access_token' => $this->accessToken,
            'expires_at' => $this->expiresAt?->format(DATE_ATOM),
        ];
    }

    public static function fromArray(array $data): self
    {
        $expiresAt = isset($data['expires_at']) && $data['expires_at']
            ? new \DateTimeImmutable($data['expires_at'])
            : null;

        return new self($data['access_token'], $expiresAt);
    }
}
