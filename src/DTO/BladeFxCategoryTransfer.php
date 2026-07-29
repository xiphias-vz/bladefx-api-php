<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

use InvalidArgumentException;

class BladeFxCategoryTransfer extends AbstractTransfer
{
    public const ID = 'id';

    protected ?int $id = null;

    protected ?string $idString = null;

    protected ?int $idParent = null;

    protected ?int $sort = null;

    protected ?string $name = null;

    protected ?bool $isSelected = null;

    protected ?string $typeName = null;

    protected ?int $idControl = null;

    protected ?bool $isDefault = null;

    protected ?bool $isDefaultReportLayout = null;

    protected ?string $layoutVisibleOn = null;

    protected ?string $caption = null;

    protected ?string $defValue = null;

    protected ?int $connId = null;

    protected ?string $sqlValue = null;

    protected ?int $idValLiItem = null;

    protected ?bool $isVisible = null;

    protected ?string $value = null;

    protected ?int $maxCombo = null;

    protected ?int $groupParentId = null;

    protected ?string $mtypeName = null;

    protected ?string $regEx = null;

    /**
     * @var array<string, string>
     */
    protected array $transferPropertyNameMap = [
        'id' => 'id',
        'idString' => 'idString',
        'idParent' => 'idParent',
        'sort' => 'sort',
        'name' => 'name',
        'isSelected' => 'isSelected',
        'typeName' => 'typeName',
        'idControl' => 'idControl',
        'isDefault' => 'isDefault',
        'isDefaultReportLayout' => 'isDefaultReportLayout',
        'layoutVisibleOn' => 'layoutVisibleOn',
        'caption' => 'caption',
        'defValue' => 'defValue',
        'conn_id' => 'connId',
        'sqlValue' => 'sqlValue',
        'idValLiItem' => 'idValLiItem',
        'isVisible' => 'isVisible',
        'value' => 'value',
        'maxCombo' => 'maxCombo',
        'group_parent_id' => 'groupParentId',
        'mtype_name' => 'mtypeName',
        'regEx' => 'regEx',
    ];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id = null)
    {
        $this->id = $id;
        $this->modifiedProperties[self::ID] = true;

        return $this;
    }

    public function requireId()
    {
        $this->assertPropertyIsSet(self::ID);

        return $this;
    }

    public function getIdString(): ?string
    {
        return $this->idString;
    }

    public function setIdString(?string $idString = null)
    {
        $this->idString = $idString;

        return $this;
    }

    public function getIdParent(): ?int
    {
        return $this->idParent;
    }

    public function setIdParent(?int $idParent = null)
    {
        $this->idParent = $idParent;

        return $this;
    }

    public function getSort(): ?int
    {
        return $this->sort;
    }

    public function setSort(?int $sort = null)
    {
        $this->sort = $sort;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name = null)
    {
        $this->name = $name;

        return $this;
    }

    public function getIsSelected(): ?bool
    {
        return $this->isSelected;
    }

    public function setIsSelected(?bool $isSelected = null)
    {
        $this->isSelected = $isSelected;

        return $this;
    }

    public function getTypeName(): ?string
    {
        return $this->typeName;
    }

    public function setTypeName(?string $typeName = null)
    {
        $this->typeName = $typeName;

        return $this;
    }

    public function getIdControl(): ?int
    {
        return $this->idControl;
    }

    public function setIdControl(?int $idControl = null)
    {
        $this->idControl = $idControl;

        return $this;
    }

    public function getIsDefault(): ?bool
    {
        return $this->isDefault;
    }

    public function setIsDefault(?bool $isDefault = null)
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    public function getIsDefaultReportLayout(): ?bool
    {
        return $this->isDefaultReportLayout;
    }

    public function setIsDefaultReportLayout(?bool $isDefaultReportLayout = null)
    {
        $this->isDefaultReportLayout = $isDefaultReportLayout;

        return $this;
    }

    public function getLayoutVisibleOn(): ?string
    {
        return $this->layoutVisibleOn;
    }

    public function setLayoutVisibleOn(?string $layoutVisibleOn = null)
    {
        $this->layoutVisibleOn = $layoutVisibleOn;

        return $this;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(?string $caption = null)
    {
        $this->caption = $caption;

        return $this;
    }

    public function getDefValue(): ?string
    {
        return $this->defValue;
    }

    public function setDefValue(?string $defValue = null)
    {
        $this->defValue = $defValue;

        return $this;
    }

    public function getConnId(): ?int
    {
        return $this->connId;
    }

    public function setConnId(?int $connId = null)
    {
        $this->connId = $connId;

        return $this;
    }

    public function getSqlValue(): ?string
    {
        return $this->sqlValue;
    }

    public function setSqlValue(?string $sqlValue = null)
    {
        $this->sqlValue = $sqlValue;

        return $this;
    }

    public function getIdValLiItem(): ?int
    {
        return $this->idValLiItem;
    }

    public function setIdValLiItem(?int $idValLiItem = null)
    {
        $this->idValLiItem = $idValLiItem;

        return $this;
    }

    public function getIsVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setIsVisible(?bool $isVisible = null)
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value = null)
    {
        $this->value = $value;

        return $this;
    }

    public function getMaxCombo(): ?int
    {
        return $this->maxCombo;
    }

    public function setMaxCombo(?int $maxCombo = null)
    {
        $this->maxCombo = $maxCombo;

        return $this;
    }

    public function getGroupParentId(): ?int
    {
        return $this->groupParentId;
    }

    public function setGroupParentId(?int $groupParentId = null)
    {
        $this->groupParentId = $groupParentId;

        return $this;
    }

    public function getMtypeName(): ?string
    {
        return $this->mtypeName;
    }

    public function setMtypeName(?string $mtypeName = null)
    {
        $this->mtypeName = $mtypeName;

        return $this;
    }

    public function getRegEx(): ?string
    {
        return $this->regEx;
    }

    public function setRegEx(?string $regEx = null)
    {
        $this->regEx = $regEx;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'idString' => $this->getIdString(),
            'idParent' => $this->getIdParent(),
            'sort' => $this->getSort(),
            'name' => $this->getName(),
            'isSelected' => $this->getIsSelected(),
            'typeName' => $this->getTypeName(),
            'idControl' => $this->getIdControl(),
            'isDefault' => $this->getIsDefault(),
            'isDefaultReportLayout' => $this->getIsDefaultReportLayout(),
            'layoutVisibleOn' => $this->getLayoutVisibleOn(),
            'caption' => $this->getCaption(),
            'defValue' => $this->getDefValue(),
            'connId' => $this->getConnId(),
            'sqlValue' => $this->getSqlValue(),
            'idValLiItem' => $this->getIdValLiItem(),
            'isVisible' => $this->getIsVisible(),
            'value' => $this->getValue(),
            'maxCombo' => $this->getMaxCombo(),
            'groupParentId' => $this->getGroupParentId(),
            'mtypeName' => $this->getMtypeName(),
            'regEx' => $this->getRegEx(),
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
                case 'id':
                case 'idString':
                case 'idParent':
                case 'sort':
                case 'name':
                case 'isSelected':
                case 'typeName':
                case 'idControl':
                case 'isDefault':
                case 'isDefaultReportLayout':
                case 'layoutVisibleOn':
                case 'caption':
                case 'defValue':
                case 'connId':
                case 'sqlValue':
                case 'idValLiItem':
                case 'isVisible':
                case 'value':
                case 'maxCombo':
                case 'groupParentId':
                case 'mtypeName':
                case 'regEx':
                    $this->$normalizedPropertyName = $value;
                    $this->modifiedProperties[$normalizedPropertyName] = true;

                    break;
                default:
                    if (!$ignoreMissingProperties) {
                        throw new InvalidArgumentException(
                            sprintf('Missing property `%s` in `%s`', $property, static::class),
                        );
                    }
            }
        }

        return $this;
    }
}
