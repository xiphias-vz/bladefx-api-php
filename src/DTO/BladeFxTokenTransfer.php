<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxTokenTransfer
{
    /**
     * @var string
     */
    protected string $token = '';

    /**
     * @var \DateTimeImmutable|null
     */
    protected ?\DateTimeImmutable $expiresAt = null;

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return $this
     */
    public function setToken(string $token): self
    {
        $this->token = $token;
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
     * @param \DateTimeImmutable $expiresAt
     * @return $this
     */
    public function setExpiresAt(\DateTimeImmutable $expiresAt = null): self
    {
        $this->expiresAt = $expiresAt;
        return $this;
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
            'access_token' => $this->getToken(),
            'expires_at' => $this->getExpiresAt()?->format(DATE_ATOM),
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
                case 'expires_at':
                    $expiresAt = isset($value) && $value
                        ? new \DateTimeImmutable($value)
                        : null;

                    $this->$normalizedPropertyName = $expiresAt;
                    break;
                case 'access_token':
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
