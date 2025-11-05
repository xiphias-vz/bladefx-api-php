<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

use InvalidArgumentException;

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
    public const ARE_YOU_SURE = 'areYouSure';

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
    protected ?int $statusCode = null;

    /**
     * @var bool|null
     */
    protected ?bool $success = null;

    /**
     * @var string|null
     */
    protected ?string $rMessage = null;

    /**
     * @var string|null
     */
    protected ?string $causer = null;

    /**
     * @var int|null
     */
    protected ?int $id = null;

    /**
     * @var bool|null
     */
    protected ?bool $areYouSure = false;

    /**
     * @var string|null
     */
    protected ?string $optionValue = null;

    /**
     * @var bool|null
     */
    protected ?bool $licenceIssue = null;

    /**
     * @var array<string, string>
     */
    protected array $transferPropertyNameMap = [
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
        'are_usure' => 'areYouSure',
        'areUsure' => 'areYouSure',
        'AreUsure' => 'areYouSure',
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
     * @param int|null $statusCode
     *
     * @return $this
     */
    public function setStatusCode(?int $statusCode)
    {
        $this->statusCode = $statusCode;
        $this->modifiedProperties[static::STATUS_CODE] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireStatusCode()
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
     *
     * @return $this
     */
    public function setSuccess(?bool $success)
    {
        $this->success = $success;
        $this->modifiedProperties[static::SUCCESS] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireSuccess()
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
     * @param string|null $rMessage
     *
     * @return $this
     */
    public function setRMessage(?string $rMessage)
    {
        $this->rMessage = $rMessage;
        $this->modifiedProperties[static::R_MESSAGE] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireRMessage()
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
     * @param string|null $causer
     *
     * @return $this
     */
    public function setCauser(?string $causer)
    {
        $this->causer = $causer;
        $this->modifiedProperties[static::CAUSER] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireCauser()
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
     * @param int|null $id
     *
     * @return $this
     */
    public function setId(?int $id)
    {
        $this->id = $id;
        $this->modifiedProperties[static::ID] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireId()
    {
        $this->assertPropertyIsSet(static::ID);

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAreYouSure(): ?bool
    {
        return $this->areYouSure;
    }

    /**
     * @param bool|null $areYouSure
     *
     * @return $this
     */
    public function setAreYouSure(?bool $areYouSure)
    {
        $this->areYouSure = $areYouSure;
        $this->modifiedProperties[static::ARE_YOU_SURE] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireAreYouSure()
    {
        $this->assertPropertyIsSet(static::ARE_YOU_SURE);

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
     * @param string|null $optionValue
     *
     * @return $this
     */
    public function setOptionValue(?string $optionValue)
    {
        $this->optionValue = $optionValue;
        $this->modifiedProperties[static::OPTION_VALUE] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireOptionValue()
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
     *
     * @return $this
     */
    public function setLicenceIssue(?bool $licenceIssue)
    {
        $this->licenceIssue = $licenceIssue;
        $this->modifiedProperties[static::LICENCE_ISSUE] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireLicenceIssue()
    {
        $this->assertPropertyIsSet(static::LICENCE_ISSUE);

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
            'areYouSure' => $this->getAreYouSure(),
            'optionValue' => $this->getOptionValue(),
            'licenceIssue' => $this->getLicenceIssue(),
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
                case 'statusCode':
                case 'success':
                case 'rMessage':
                case 'causer':
                case 'id':
                case 'areYouSure':
                case 'optionValue':
                case 'licenceIssue':
                case 'errorMessage':
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
