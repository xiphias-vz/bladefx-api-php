<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

use InvalidArgumentException;

class BladeFxAuthenticationRequestTransfer extends AbstractTransfer
{
    /**
     * @var string|null
     */
    protected ?string $username = null;

    /**
     * @var string|null
     */
    protected ?string $password = null;

    /**
     * @var bool
     */
    protected ?bool $licenceExp = null;

    /**
     * @var array<string, string>
     */
    protected array $transferPropertyNameMap = [
        'username' => 'username',
        'password' => 'password',
        'licence_exp' => 'licenceExp',
    ];

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     *
     * @return $this
     */
    public function setUsername(?string $username)
    {
        $this->username = $username;
        $this->modifiedProperties['username'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireUsername()
    {
        $this->assertPropertyIsSet('username');

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
        $this->modifiedProperties['password'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requirePassword()
    {
        $this->assertPropertyIsSet('password');

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getLicenceExp(): ?bool
    {
        return $this->licenceExp;
    }

    /**
     * @param bool|null $licenceExp
     *
     * @return $this
     */
    public function setLicenceExp(?bool $licenceExp)
    {
        $this->licenceExp = $licenceExp;
        $this->modifiedProperties['licenceExp'] = true;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'username' => $this->getUsername(),
            'password' => $this->getPassword(),
            'licenceExp' => $this->getLicenceExp(),
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
                case 'username':
                case 'password':
                case 'licenceExp':
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
