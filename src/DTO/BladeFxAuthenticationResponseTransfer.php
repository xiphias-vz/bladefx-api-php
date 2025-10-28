<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxAuthenticationResponseTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    protected string $username;

    /**
     * @var string
     */
    protected string $fullname;

    /**
     * @var string
     */
    protected string $email;

    /**
     * @var string|null
     */
    protected ?string $avatar;

    /**
     * @var int
     */
    protected int $idUser;

    /**
     * @var int
     */
    protected int $idCompany;

    /**
     * @var int
     */
    protected int $idLanguage;

    /**
     * @var string
     */
    protected string $languageDescription;

    /**
     * @var bool
     */
    protected bool $licenceExp;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'token' => 'accessToken',
        'username' => 'username',
        'fullname' => 'fullname',
        'email' => 'email',
        'avatar' => 'avatar',
        'idUser' => 'idUser',
        'idCompany' => 'idCompany',
        'idLanguage' => 'idLanguage',
        'languageDescription' => 'languageDescription',
        'licence_exp' => 'licenceExp',
    ];

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
    public function getFullname(): string
    {
        return $this->fullname;
    }

    /**
     * @param string $fullname
     * @return $this
     */
    public function setFullname(string $fullname): self
    {
        $this->fullname = $fullname;
        $this->modifiedProperties['fullname'] = true;

        return $this;
    }

    /**
     * @return $this
     * @throws \Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException
     */
    public function requireFullname(): self
    {
        $this->assertPropertyIsSet('fullname');

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        $this->modifiedProperties['email'] = true;

        return $this;
    }

    /**
     * @return $this
     * @throws \Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException
     */
    public function requireEmail(): self
    {
        $this->assertPropertyIsSet('email');

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    /**
     * @param string|null $avatar
     * @return $this
     */
    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;
        $this->modifiedProperties['avatar'] = true;

        return $this;
    }

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     * @return $this
     */
    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;
        $this->modifiedProperties['idUser'] = true;

        return $this;
    }

    /**
     * @return int
     */
    public function getIdCompany(): int
    {
        return $this->idCompany;
    }

    /**
     * @param int $idCompany
     * @return $this
     */
    public function setIdCompany(int $idCompany): self
    {
        $this->idCompany = $idCompany;
        $this->modifiedProperties['idCompany'] = true;

        return $this;
    }

    /**
     * @return $this
     * @throws \Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException
     */
    public function requireIdCompany(): self
    {
        $this->assertPropertyIsSet('idCompany');

        return $this;
    }

    /**
     * @return int
     */
    public function getIdLanguage(): int
    {
        return $this->idLanguage;
    }

    /**
     * @param int $idLanguage
     * @return $this
     */
    public function setIdLanguage(int $idLanguage): self
    {
        $this->idLanguage = $idLanguage;
        $this->modifiedProperties['idLanguage'] = true;

        return $this;
    }

    /**
     * @return $this
     * @throws \Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException
     */
    public function requireIdLanguage(): self
    {
        $this->assertPropertyIsSet('idLanguage');

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguageDescription(): string
    {
        return $this->languageDescription;
    }

    /**
     * @param string $languageDescription
     * @return $this
     */
    public function setLanguageDescription(string $languageDescription): self
    {
        $this->languageDescription = $languageDescription;
        $this->modifiedProperties['languageDescription'] = true;

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
     * @param array<mixed> $data
     * @param bool $ignoreMissingProperties
     * @return $this
     */
    public function fromArray(array $data, bool $ignoreMissingProperties = false)
    {
        foreach ($data as $property => $value) {
            $normalizedPropertyName = $this->transferPropertyNameMap[$property] ?? null;

            switch ($normalizedPropertyName) {
                case 'accessToken':
                case 'username':
                case 'fullname':
                case 'email':
                case 'avatar':
                case 'idUser':
                case 'idCompany':
                case 'idLanguage':
                case 'languageDescription':
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
