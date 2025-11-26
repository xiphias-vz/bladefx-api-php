<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

use InvalidArgumentException;

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
    protected ?int $bladeFxUserId = null;

    /**
     * @var string|null
     */
    protected ?string $password = null;

    /**
     * @var array<string, string>
     */
    protected array $transferPropertyNameMap = [
        'blade_fx_user_id' => 'bladeFxUserId',
        'bladeFxUserId' => 'bladeFxUserId',
        'BladeFxUserId' => 'bladeFxUserId',
        'password' => 'password',
        'Password' => 'password',
    ];

    /**
     * @return int|null
     */
    public function getBladeFxUserId(): ?int
    {
        return $this->bladeFxUserId;
    }

    /**
     * @param int|null $bladeFxUserId
     *
     * @return $this
     */
    public function setBladeFxUserId(?int $bladeFxUserId)
    {
        $this->bladeFxUserId = $bladeFxUserId;
        $this->modifiedProperties[static::BLADE_FX_USER_ID] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireBladeFxUserId()
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
     * @param string|null $password
     *
     * @return $this
     */
    public function setPassword(?string $password)
    {
        $this->password = $password;
        $this->modifiedProperties[static::PASSWORD] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requirePassword()
    {
        $this->assertPropertyIsSet(static::PASSWORD);

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
        ];
    }

    /**
     * @param array<mixed> $data
     * @param bool $ignoreMissingProperties
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function fromArray(array $data, bool $ignoreMissingProperties = false)
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
                        throw new InvalidArgumentException(sprintf('Missing property `%s` in `%s`', $property, static::class));
                    }
            }
        }

        return $this;
    }
}
