<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxAuthenticationResponseTransfer extends AbstractTransfer
{
    protected string $token;
    protected string $username;
    protected string $fullname;
    protected string $email;
    protected ?string $avatar;
    protected int $idUser;
    protected int $idCompany;
    protected int $idLanguage;
    protected string $languageDescription;
    protected bool $licenceExp;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'token' => 'token',
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
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return void
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
        $this->modifiedProperties['token'] = true;
    }

    /**
     * @return $this
     * @throws \Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException
     */
    public function requireToken(): self
    {
        $this->assertPropertyIsSet('token');

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
     * @return void
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
        $this->modifiedProperties['username'] = true;
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
     * @return void
     */
    public function setFullname(string $fullname): void
    {
        $this->fullname = $fullname;
        $this->modifiedProperties['fullname'] = true;
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
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
        $this->modifiedProperties['email'] = true;
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
     * @return void
     */
    public function setAvatar(?string $avatar): void
    {
        $this->avatar = $avatar;
        $this->modifiedProperties['avatar'] = true;
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
     * @return void
     */
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
        $this->modifiedProperties['idUser'] = true;
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
     * @return void
     */
    public function setIdCompany(int $idCompany): void
    {
        $this->idCompany = $idCompany;
        $this->modifiedProperties['idCompany'] = true;
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
     * @return void
     */
    public function setIdLanguage(int $idLanguage): void
    {
        $this->idLanguage = $idLanguage;
        $this->modifiedProperties['idLanguage'] = true;
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
     * @return void
     */
    public function setLanguageDescription(string $languageDescription): void
    {
        $this->languageDescription = $languageDescription;
        $this->modifiedProperties['languageDescription'] = true;
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
     * @return void
     */
    public function setLicenceExp(bool $licenceExp): void
    {
        $this->licenceExp = $licenceExp;
        $this->modifiedProperties['licenceExp'] = true;
    }

    /**
     * @param array $data
     * @param bool $ignoreMissingProperties
     * @return $this
     */
    public function fromArray(array $data, bool $ignoreMissingProperties = false)
    {
        foreach ($data as $property => $value) {
            $normalizedPropertyName = $this->transferPropertyNameMap[$property] ?? null;

            switch ($normalizedPropertyName) {
                case 'token':
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
