<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

use InvalidArgumentException;

class BladeFxAuthenticationResponseTransfer extends AbstractTransfer
{
    /**
     * @var string|null
     */
    protected ?string $username = null;

    /**
     * @var string|null
     */
    protected ?string $fullname = null;

    /**
     * @var string|null
     */
    protected ?string $email = null;

    /**
     * @var string|null
     */
    protected ?string $avatar = null;

    /**
     * @var int|null
     */
    protected ?int $idUser = null;

    /**
     * @var int|null
     */
    protected ?int $idCompany = null;

    /**
     * @var int|null
     */
    protected ?int $idLanguage = null;

    /**
     * @var string|null
     */
    protected ?string $languageDescription = null;

    /**
     * @var bool|null
     */
    protected ?bool $licenceExp = null;

    /**
     * @var array<string, string>
     */
    protected array $transferPropertyNameMap = [
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
    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    /**
     * @param string|null $fullname
     *
     * @return $this
     */
    public function setFullname(?string $fullname)
    {
        $this->fullname = $fullname;
        $this->modifiedProperties['fullname'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireFullname()
    {
        $this->assertPropertyIsSet('fullname');

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     *
     * @return $this
     */
    public function setEmail(?string $email)
    {
        $this->email = $email;
        $this->modifiedProperties['email'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireEmail()
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
     *
     * @return $this
     */
    public function setAvatar(?string $avatar)
    {
        $this->avatar = $avatar;
        $this->modifiedProperties['avatar'] = true;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    /**
     * @param int|null $idUser
     *
     * @return $this
     */
    public function setIdUser(?int $idUser)
    {
        $this->idUser = $idUser;
        $this->modifiedProperties['idUser'] = true;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdCompany(): ?int
    {
        return $this->idCompany;
    }

    /**
     * @param int|null $idCompany
     *
     * @return $this
     */
    public function setIdCompany(?int $idCompany)
    {
        $this->idCompany = $idCompany;
        $this->modifiedProperties['idCompany'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireIdCompany()
    {
        $this->assertPropertyIsSet('idCompany');

        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdLanguage(): ?int
    {
        return $this->idLanguage;
    }

    /**
     * @param int|null $idLanguage
     *
     * @return $this
     */
    public function setIdLanguage(?int $idLanguage)
    {
        $this->idLanguage = $idLanguage;
        $this->modifiedProperties['idLanguage'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireIdLanguage()
    {
        $this->assertPropertyIsSet('idLanguage');

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguageDescription(): ?string
    {
        return $this->languageDescription;
    }

    /**
     * @param string|null $languageDescription
     *
     * @return $this
     */
    public function setLanguageDescription(?string $languageDescription)
    {
        $this->languageDescription = $languageDescription;
        $this->modifiedProperties['languageDescription'] = true;

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
                        throw new InvalidArgumentException(sprintf('Missing property `%s` in `%s`', $property, static::class));
                    }
            }
        }

        return $this;
    }

    /**
     * @param array<string, string> $transferPropertyNameMap
     *
     * @return $this
     */
    public function setTransferPropertyNameMap(array $transferPropertyNameMap)
    {
        $this->transferPropertyNameMap = $transferPropertyNameMap;

        return $this;
    }
}
