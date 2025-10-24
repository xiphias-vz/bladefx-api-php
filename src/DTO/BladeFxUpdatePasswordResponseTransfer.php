<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

use Xiphias\BladeFxApi\DTO;

class BladeFxUpdatePasswordResponseTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    public const STATUS_CODE = 'statusCode';

    /**
     * @var string
     */
    public const SUCCESS = 'success';

    /**
     * @var string
     */
    public const R_MESSAGE = 'rMessage';

    /**
     * @var string
     */
    public const CAUSER = 'causer';

    /**
     * @var string
     */
    public const ID = 'id';

    /**
     * @var string
     */
    public const ARE_USURE = 'areUsure';

    /**
     * @var string
     */
    public const OPTION_VALUE = 'optionValue';

    /**
     * @var string
     */
    public const LICENCE_ISSUE = 'licenceIssue';

    /**
     * @var int|null
     */
    protected ?int $statusCode;

    /**
     * @var bool|null
     */
    protected ?bool $success;

    /**
     * @var string|null
     */
    protected ?string $rMessage;

    /**
     * @var string|null
     */
    protected ?string $causer;

    /**
     * @var int|null
     */
    protected ?int $id;

    /**
     * @var bool|null
     */
    protected ?bool $areUsure;

    /**
     * @var string|null
     */
    protected ?string $optionValue;

    /**
     * @var bool|null
     */
    protected ?bool $licenceIssue;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'status_code' => 'statusCode',
        'statusCode' => 'statusCode',
        'StatusCode' => 'statusCode',
        'success' => 'success',
        'Success' => 'success',
        'r_message' => 'rMessage',
        'rMessage' => 'rMessage',
        'RMessage' => 'rMessage',
        'causer' => 'causer',
        'Causer' => 'causer',
        'id' => 'id',
        'Id' => 'id',
        'are_usure' => 'areUsure',
        'areUsure' => 'areUsure',
        'AreUsure' => 'areUsure',
        'option_value' => 'optionValue',
        'optionValue' => 'optionValue',
        'OptionValue' => 'optionValue',
        'licence_issue' => 'licenceIssue',
        'licenceIssue' => 'licenceIssue',
        'LicenceIssue' => 'licenceIssue',
    ];

    /**
     * @return int|null
     */
    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /**
     * @param ?int $statusCode
     * @return $this
     */
    public function setStatusCode(?int $statusCode): self
    {
        $this->statusCode = $statusCode;
        $this->modifiedProperties[static::STATUS_CODE] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireStatusCode(): self
    {
        $this->assertPropertyIsSet(static::STATUS_CODE);

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSuccess(): ?bool
    {
        return $this->success;
    }

    /**
     * @param bool|null $success
     * @return $this
     */
    public function setSuccess(?bool $success): self
    {
        $this->success = $success;
        $this->modifiedProperties[static::SUCCESS] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireSuccess(): self
    {
        $this->assertPropertyIsSet(static::SUCCESS);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRMessage(): ?string
    {
        return $this->rMessage;
    }

    /**
     * @param ?string $rMessage
     * @return $this
     */
    public function setRMessage(?string $rMessage): self
    {
        $this->rMessage = $rMessage;
        $this->modifiedProperties[static::R_MESSAGE] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireRMessage(): self
    {
        $this->assertPropertyIsSet(static::R_MESSAGE);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCauser(): ?string
    {
        return $this->causer;
    }

    /**
     * @param ?string $causer
     * @return $this
     */
    public function setCauser(?string $causer): self
    {
        $this->causer = $causer;
        $this->modifiedProperties[static::CAUSER] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireCauser(): self
    {
        $this->assertPropertyIsSet(static::CAUSER);

        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param ?int $id
     * @return $this
     */
    public function setId(?int $id): self
    {
        $this->id = $id;
        $this->modifiedProperties[static::ID] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireId(): self
    {
        $this->assertPropertyIsSet(static::ID);

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAreYouSure(): ?bool
    {
        return $this->areUsure;
    }

    /**
     * @param bool|null $areYouSure
     * @return $this
     */
    public function setAreYouSure(?bool $areYouSure): self
    {
        $this->areUsure = $areYouSure;
        $this->modifiedProperties[static::ARE_USURE] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireAreYouSure(): self
    {
        $this->assertPropertyIsSet(static::ARE_USURE);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOptionValue(): ?string
    {
        return $this->optionValue;
    }

    /**
     * @param ?string $optionValue
     * @return $this
     */
    public function setOptionValue(?string $optionValue): self
    {
        $this->optionValue = $optionValue;
        $this->modifiedProperties[static::OPTION_VALUE] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireOptionValue(): self
    {
        $this->assertPropertyIsSet(static::OPTION_VALUE);

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getLicenceIssue(): ?bool
    {
        return $this->licenceIssue;
    }

    /**
     * @param bool|null $licenceIssue
     * @return $this
     */
    public function setLicenceIssue(?bool $licenceIssue): self
    {
        $this->licenceIssue = $licenceIssue;
        $this->modifiedProperties[static::LICENCE_ISSUE] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireLicenceIssue(): self
    {
        $this->assertPropertyIsSet(static::LICENCE_ISSUE);

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
            'statusCode' => $this->getStatusCode(),
            'success' => $this->getSuccess(),
            'rMessage' => $this->getRMessage(),
            'causer' => $this->getCauser(),
            'id' => $this->getId(),
            'areUsure' => $this->getAreYouSure(),
            'optionValue' => $this->getOptionValue(),
            'licenceIssue' => $this->getLicenceIssue(),
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
                case 'statusCode':
                case 'success':
                case 'rMessage':
                case 'causer':
                case 'id':
                case 'areUsure':
                case 'optionValue':
                case 'licenceIssue':
                case 'errorMessage':
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
