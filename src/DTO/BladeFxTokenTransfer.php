<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxTokenTransfer
{
    /**
     * @var string|null
     */
    protected ?string $accessToken = '';

    /**
     * @var \DateTimeImmutable|null
     */
    protected ?\DateTimeImmutable $expiresAt = null;

    /**
     * @var array<string, string>
     */
    protected array $transferPropertyNameMap = [
        'access_token' => 'accessToken',
        'expires_at' => 'expiresAt',
    ];

    /**
     * @return string|null
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    /**
     * @param string|null $accessToken
     * @return $this
     */
    public function setAccessToken(?string $accessToken): self
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getExpiresAt(): ?\DateTimeImmutable
    {
        return $this->expiresAt;
    }

    /**
     * @param \DateTimeImmutable|null $expiresAt
     * @return $this
     */
    public function setExpiresAt(\DateTimeImmutable $expiresAt = null): self
    {
        $this->expiresAt = $expiresAt;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isExpired(): ?bool
    {
        return $this->expiresAt !== null && $this->expiresAt <= new \DateTimeImmutable();
    }

    /**
     * @return array<mixed>
     */
    public function toArray(): array
    {
        return [
            'accessToken' => $this->getAccessToken(),
            'expiresAt' => $this->getExpiresAt()?->format(DATE_ATOM),
        ];
    }

    /**
     * @param array<string, mixed> $data
     * @param bool $ignoreMissingProperties
     * @return $this
     * @throws \InvalidArgumentException
     * @throws \DateMalformedStringException
     */
    public function fromArray(array $data, bool $ignoreMissingProperties = false)
    {
        foreach ($data as $property => $value) {
            $normalizedPropertyName = $this->transferPropertyNameMap[$property] ?? $property;

            switch ($normalizedPropertyName) {
                case 'expiresAt':
                    $expiresAt = isset($value) && $value
                        ? new \DateTimeImmutable($value)
                        : null;

                    $this->$normalizedPropertyName = $expiresAt;
                    break;
                case 'accessToken':
                    $this->$normalizedPropertyName = $value;
                    break;

                default:
                    if (!$ignoreMissingProperties) {
                        throw new \InvalidArgumentException(sprintf('Missing property `%s` in `%s`', $property, static::class));
                    }
            }
        }

        return $this;
    }
}
