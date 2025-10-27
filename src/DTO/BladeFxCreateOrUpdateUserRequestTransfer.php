<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserCustomFieldsTransfer;
use Xiphias\BladeFxApi\DTO;

class BladeFxCreateOrUpdateUserRequestTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    public const TOKEN = 'token';

    /**
     * @var string
     */
    public const EMAIL = 'email';

    /**
     * @var string
     */
    public const FIRST_NAME = 'firstName';

    /**
     * @var string
     */
    public const LAST_NAME = 'lastName';

    /**
     * @var string
     */
    public const PASSWORD = 'password';

    /**
     * @var string
     */
    public const ROLE_NAME = 'roleName';

    /**
     * @var string
     */
    public const COMPANY_ID = 'companyId';

    /**
     * @var string
     */
    public const LANGUAGE_ID = 'languageId';

    /**
     * @var string
     */
    public const IS_ACTIVE = 'isActive';

    /**
     * @var string
     */
    public const CUSTOM_FIELDS = 'customFields';

    /**
     * @var BladeFxTokenTransfer|null
     */
    protected ?BladeFxTokenTransfer $token;

    /**
     * @var string|null
     */
    protected ?string $email;

    /**
     * @var string|null
     */
    protected ?string $firstName;

    /**
     * @var string|null
     */
    protected ?string $lastName;

    /**
     * @var string|null
     */
    protected ?string $password;

    /**
     * @var string|null
     */
    protected ?string $roleName;

    /**
     * @var int|null
     */
    protected ?int $companyId;

    /**
     * @var int|null
     */
    protected ?int $languageId;

    /**
     * @var bool|null
     */
    protected ?bool $isActive;

    /**
     * @var array<mixed>
     */
    protected array $customFields;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'token' => 'token',
        'Token' => 'token',
        'email' => 'email',
        'Email' => 'email',
        'first_name' => 'firstName',
        'firstName' => 'firstName',
        'FirstName' => 'firstName',
        'last_name' => 'lastName',
        'lastName' => 'lastName',
        'LastName' => 'lastName',
        'password' => 'password',
        'Password' => 'password',
        'role_name' => 'roleName',
        'roleName' => 'roleName',
        'RoleName' => 'roleName',
        'company_id' => 'companyId',
        'companyId' => 'companyId',
        'CompanyId' => 'companyId',
        'language_id' => 'languageId',
        'languageId' => 'languageId',
        'LanguageId' => 'languageId',
        'is_active' => 'isActive',
        'isActive' => 'isActive',
        'IsActive' => 'isActive',
        'custom_fields' => 'customFields',
        'customFields' => 'customFields',
        'CustomFields' => 'customFields',
    ];

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param ?string $email
     * @return $this
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;
        $this->modifiedProperties[static::EMAIL] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireEmail(): self
    {
        $this->assertPropertyIsSet(static::EMAIL);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param ?string $firstName
     * @return $this
     */
    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;
        $this->modifiedProperties[static::FIRST_NAME] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireFirstName(): self
    {
        $this->assertPropertyIsSet(static::FIRST_NAME);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param ?string $lastName
     * @return $this
     */
    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        $this->modifiedProperties[static::LAST_NAME] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireLastName(): self
    {
        $this->assertPropertyIsSet(static::LAST_NAME);

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
     * @return string|null
     */
    public function getRoleName(): ?string
    {
        return $this->roleName;
    }

    /**
     * @param ?string $roleName
     * @return $this
     */
    public function setRoleName(?string $roleName): self
    {
        $this->roleName = $roleName;
        $this->modifiedProperties[static::ROLE_NAME] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireRoleName(): self
    {
        $this->assertPropertyIsSet(static::ROLE_NAME);

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCompanyId(): ?int
    {
        return $this->companyId;
    }

    /**
     * @param int|null $companyId
     * @return $this
     */
    public function setCompanyId(?int $companyId): self
    {
        $this->companyId = $companyId;
        $this->modifiedProperties[static::COMPANY_ID] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireCompanyId(): self
    {
        $this->assertPropertyIsSet(static::COMPANY_ID);

        return $this;
    }

    /**
     * @return int|null
     */
    public function getLanguageId(): ?int
    {
        return $this->languageId;
    }

    /**
     * @param int|null $languageId
     * @return $this
     */
    public function setLanguageId(?int $languageId): self
    {
        $this->languageId = $languageId;
        $this->modifiedProperties[static::LANGUAGE_ID] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireLanguageId(): self
    {
        $this->assertPropertyIsSet(static::LANGUAGE_ID);

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    /**
     * @param bool|null $isActive
     * @return $this
     */
    public function setIsActive(?bool $isActive): self
    {
        $this->isActive = $isActive;
        $this->modifiedProperties[static::IS_ACTIVE] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireIsActive(): self
    {
        $this->assertPropertyIsSet(static::IS_ACTIVE);

        return $this;
    }

    /**
     * @return array<mixed>
     */
    public function getCustomFields(): array
    {
        return $this->customFields;
    }

    /**
     * @param array $customFields
     * @return $this
     */
    public function setCustomFields(array $customFields): self
    {
        $this->customFields = $customFields;
        $this->modifiedProperties[static::CUSTOM_FIELDS] = true;

        return $this;
    }

    public function addCustomFields(BladeFxCreateOrUpdateUserCustomFieldsTransfer $customFields): self
    {
        $this->customFields[] = $customFields;
        $this->modifiedProperties[self::CUSTOM_FIELDS] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireCustomFields(): self
    {
        $this->assertPropertyIsSet(static::CUSTOM_FIELDS);

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
            'email' => $this->getEmail(),
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'password' => $this->getPassword(),
            'roleName' => $this->getRoleName(),
            'companyId' => $this->getCompanyId(),
            'languageId' => $this->getLanguageId(),
            'isActive' => $this->getIsActive(),
            'customFields' => $this->getCustomFields(),
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
                case 'email':
                case 'firstName':
                case 'lastName':
                case 'password':
                case 'roleName':
                case 'companyId':
                case 'languageId':
                case 'isActive':
                case 'customFields':
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
