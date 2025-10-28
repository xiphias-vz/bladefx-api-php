<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxAuthenticationRequestTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    protected string $username;

    /**
     * @var string
     */
    protected string $password;

    /**
     * @var bool
     */
    protected bool $licenceExp = false;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'username' => 'username',
        'password' => 'password',
        'licence_exp' => 'licenceExp',
    ];

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return $this
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;
        $this->modifiedProperties['username'] = true;

        return $this;
    }

    /**
     * @return $this
     * @throws \Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException
     */
    public function requireUsername(): self
    {
        $this->assertPropertyIsSet('username');

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        $this->modifiedProperties['password'] = true;

        return $this;
    }

    /**
     * @return $this
     * @throws \Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException
     */
    public function requirePassword(): self
    {
        $this->assertPropertyIsSet('password');

        return $this;
    }

    /**
     * @return bool
     */
    public function getLicenceExp(): bool
    {
        return $this->licenceExp;
    }

    /**
     * @param bool $licenceExp
     * @return $this
     */
    public function setLicenceExp(bool $licenceExp): self
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
                        throw new \InvalidArgumentException(sprintf('Missing property `%s` in `%s`', $property, static::class));
                    }
            }
        }

        return $this;
    }
}
