<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxUpdatePasswordRequestTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    public const BLADE_FX_USER_ID = 'bladeFxUserId';

    /**
     * @var string
     */
    public const PASSWORD = 'password';

    /**
     * @var int|null
     */
    protected ?int $bladeFxUserId;

    /**
     * @var string|null
     */
    protected ?string $password;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'blade_fx_user_id' => 'bladeFxUserId',
        'bladeFxUserId' => 'bladeFxUserId',
        'BladeFxUserId' => 'bladeFxUserId',
        'password' => 'password',
        'Password' => 'password',
    ];

    /**
     * @return bool|null
     */
    public function getBladeFxUserId(): ?bool
    {
        return $this->bladeFxUserId;
    }

    /**
     * @param bool|null $bladeFxUserId
     * @return $this
     */
    public function setBladeFxUserId(?bool $bladeFxUserId): self
    {
        $this->bladeFxUserId = $bladeFxUserId;
        $this->modifiedProperties[static::BLADE_FX_USER_ID] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireBladeFxUserId(): self
    {
        $this->assertPropertyIsSet(static::BLADE_FX_USER_ID);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param ?string $password
     * @return $this
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;
        $this->modifiedProperties[static::PASSWORD] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requirePassword(): self
    {
        $this->assertPropertyIsSet(static::PASSWORD);

        return $this;
    }

    /**
     * @return $this
     * @throws \Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException
     */
    public function requireToken(): self
    {
        $this->assertPropertyIsSet('accessToken');

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'bladeFxUserId' => $this->getBladeFxUserId(),
            'password' => $this->getPassword(),
            'token' => $this->getToken(),
        ];
    }

    /**
     * @param array<mixed> $data
     * @param bool $ignoreMissingProperties
     * @return $this
     */
    public function fromArray(array $data, bool $ignoreMissingProperties = false): static
    {
        foreach ($data as $property => $value) {
            $normalizedPropertyName = $this->transferPropertyNameMap[$property] ?? null;

            switch ($normalizedPropertyName) {
                case 'bladeFxUserId':
                case 'password':
                    $this->$normalizedPropertyName = $value;
                    $this->modifiedProperties[$normalizedPropertyName] = true;
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
