<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

use InvalidArgumentException;

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
     * @var \Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer|null
     */
    protected ?BladeFxTokenTransfer $token = null;

    /**
     * @var string|null
     */
    protected ?string $email = null;

    /**
     * @var string|null
     */
    protected ?string $firstName = null;

    /**
     * @var string|null
     */
    protected ?string $lastName = null;

    /**
     * @var string|null
     */
    protected ?string $password = null;

    /**
     * @var string|null
     */
    protected ?string $roleName = null;

    /**
     * @var int|null
     */
    protected ?int $companyId = null;

    /**
     * @var int|null
     */
    protected ?int $languageId = null;

    /**
     * @var bool|null
     */
    protected ?bool $isActive = null;

    /**
     * @var array<mixed>|null
     */
    protected ?array $customFields = null;

    /**
     * @var array<string, string>
     */
    protected array $transferPropertyNameMap = [
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
     * @param string|null $email
     *
     * @return $this
     */
    public function setEmail(?string $email)
    {
        $this->email = $email;
        $this->modifiedProperties[static::EMAIL] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireEmail()
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
     * @param string|null $firstName
     *
     * @return $this
     */
    public function setFirstName(?string $firstName)
    {
        $this->firstName = $firstName;
        $this->modifiedProperties[static::FIRST_NAME] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireFirstName()
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
     * @param string|null $lastName
     *
     * @return $this
     */
    public function setLastName(?string $lastName)
    {
        $this->lastName = $lastName;
        $this->modifiedProperties[static::LAST_NAME] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireLastName()
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
     * @return string|null
     */
    public function getRoleName(): ?string
    {
        return $this->roleName;
    }

    /**
     * @param string|null $roleName
     *
     * @return $this
     */
    public function setRoleName(?string $roleName)
    {
        $this->roleName = $roleName;
        $this->modifiedProperties[static::ROLE_NAME] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireRoleName()
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
     *
     * @return $this
     */
    public function setCompanyId(?int $companyId)
    {
        $this->companyId = $companyId;
        $this->modifiedProperties[static::COMPANY_ID] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireCompanyId()
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
     *
     * @return $this
     */
    public function setLanguageId(?int $languageId)
    {
        $this->languageId = $languageId;
        $this->modifiedProperties[static::LANGUAGE_ID] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireLanguageId()
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
     *
     * @return $this
     */
    public function setIsActive(?bool $isActive)
    {
        $this->isActive = $isActive;
        $this->modifiedProperties[static::IS_ACTIVE] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireIsActive()
    {
        $this->assertPropertyIsSet(static::IS_ACTIVE);

        return $this;
    }

    /**
     * @return array<\Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserCustomFieldsTransfer>|null
     */
    public function getCustomFields(): ?array
    {
        return $this->customFields;
    }

    /**
     * @param array<\Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserCustomFieldsTransfer>|null $customFields
     *
     * @return $this
     */
    public function setCustomFields(?array $customFields)
    {
        $this->customFields = $customFields;
        $this->modifiedProperties[static::CUSTOM_FIELDS] = true;

        return $this;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserCustomFieldsTransfer $customFields
     *
     * @return $this
     */
    public function addCustomFields(BladeFxCreateOrUpdateUserCustomFieldsTransfer $customFields)
    {
        $this->customFields[] = $customFields;
        $this->modifiedProperties[self::CUSTOM_FIELDS] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireCustomFields()
    {
        $this->assertPropertyIsSet(static::CUSTOM_FIELDS);

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
                        throw new InvalidArgumentException(sprintf('Missing property `%s` in `%s`', $property, static::class));
                    }
            }
        }

        return $this;
    }
}
