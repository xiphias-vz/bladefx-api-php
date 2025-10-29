<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

use Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer;

class BladeFxCreateOrUpdateUserCustomFieldsTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    public const FIELD_NAME = 'fieldName';

    /**
     * @var string
     */
    public const FIELD_VALUE = 'fieldValue';

    /**
     * @var string|null
     */
    protected ?string $fieldName;

    /**
     * @var string|null
     */
    protected ?string $fieldValue;

    /**
     * @var array<string, string>
     */
    protected array $transferPropertyNameMap = [
        'field_name' => 'fieldName',
        'fieldName' => 'fieldName',
        'FieldName' => 'fieldName',
        'field_value' => 'fieldValue',
        'fieldValue' => 'fieldValue',
        'FieldValue' => 'fieldValue',
    ];

    /**
     * @return string|null
     */
    public function getFieldName(): ?string
    {
        return $this->fieldName;
    }

    /**
     * @param ?string $fieldName
     * @return $this
     */
    public function setFieldName(?string $fieldName): self
    {
        $this->fieldName = $fieldName;
        $this->modifiedProperties[static::FIELD_NAME] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireFieldName(): self
    {
        $this->assertPropertyIsSet(static::FIELD_NAME);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFieldValue(): ?string
    {
        return $this->fieldValue;
    }

    /**
     * @param ?string $fieldValue
     * @return $this
     */
    public function setFieldValue(?string $fieldValue): self
    {
        $this->fieldValue = $fieldValue;
        $this->modifiedProperties[static::FIELD_VALUE] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireFieldValue(): self
    {
        $this->assertPropertyIsSet(static::FIELD_VALUE);

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
            'fieldName' => $this->getFieldName(),
            'fieldValue' => $this->getFieldValue(),
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
                case 'fieldName':
                case 'fieldValue':
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
