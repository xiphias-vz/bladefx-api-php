<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxTokenTransfer
{
    /**
     * @var string
     */
    protected string $accessToken;

    /**
     * @var \DateTimeImmutable|null
     */
    private ?\DateTimeImmutable $expiresAt;

    /**
     * @param string $accessToken
     * @param \DateTimeImmutable|null $expiresAt
     */
    public function __construct(string $accessToken, ?\DateTimeImmutable $expiresAt = null)
    {
        $this->accessToken = $accessToken;
        $this->expiresAt = $expiresAt;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getExpiresAt(): ?\DateTimeImmutable
    {
        return $this->expiresAt;
    }

    /**
     * @return bool
     */
    public function isExpired(): bool
    {
        return $this->expiresAt !== null && $this->expiresAt <= new \DateTimeImmutable();
    }

    /**
     * @return array<mixed>
     */
    public function toArray(): array
    {
        return [
            'access_token' => $this->getAccessToken(),
            'expires_at' => $this->getExpiresAt()?->format(DATE_ATOM),
        ];
    }

    /**
     * @param array<mixed> $data
     * @return self
     * @throws \DateMalformedStringException
     */
    public static function fromArray(array $data): self
    {
        $expiresAt = isset($data['expires_at']) && $data['expires_at']
            ? new \DateTimeImmutable($data['expires_at'])
            : null;

        return new self($data['access_token'], $expiresAt);
    }
}
