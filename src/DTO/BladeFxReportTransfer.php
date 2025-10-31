<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxReportTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    public const REP_ID = 'repId';

    /**
     * @var string
     */
    public const REP_NAME = 'repName';

    /**
     * @var string
     */
    public const REP_HASH_CODE = 'repHashCode';

    /**
     * @var string
     */
    public const REP_DESC = 'repDesc';

    /**
     * @var string
     */
    public const CAT_NAME = 'catName';

    /**
     * @var string
     */
    public const IS_ACTIVE = 'isActive';

    /**
     * @var string
     */
    public const IS_DRILLDOWN = 'isDrilldown';

    /**
     * @var string
     */
    public const IS_WEBSERVICE = 'isWebservice';

    /**
     * @var string
     */
    public const IS_ERROR_REPORT = 'isErrorReport';

    /**
     * @var string
     */
    public const IS_DEF = 'isDef';

    /**
     * @var string
     */
    public const IS_METRO = 'isMetro';

    /**
     * @var string
     */
    public const LOG_EXECUTION = 'logExecution';

    /**
     * @var string
     */
    public const LOG_HISTORY = 'logHistory';

    /**
     * @var string
     */
    public const IS_FAVORITE = 'isFavorite';

    /**
     * @var string
     */
    public const U_CREATED = 'uCreated';

    /**
     * @var string
     */
    public const D_CREATED = 'dCreated';

    /**
     * @var string
     */
    public const U_CHANGED = 'uChanged';

    /**
     * @var string
     */
    public const D_CHANGED = 'dChanged';

    /**
     * @var string
     */
    public const MOBILE_LAYOUT = 'mobileLayout';

    /**
     * @var string
     */
    public const ATTRIBUTE = 'attribute';

    /**
     * @var int|null
     */
    protected ?int $repId = null;

    /**
     * @var string|null
     */
    protected ?string $repName = null;

    /**
     * @var string|null
     */
    protected ?string $repHashCode = null;

    /**
     * @var string|null
     */
    protected ?string $repDesc = null;

    /**
     * @var string|null
     */
    protected ?string $catName = null;

    /**
     * @var bool|null
     */
    protected ?bool $isActive = null;

    /**
     * @var bool|null
     */
    protected ?bool $isDrilldown = null;

    /**
     * @var bool|null
     */
    protected ?bool $isWebservice = null;

    /**
     * @var bool|null
     */
    protected ?bool $isErrorReport = null;

    /**
     * @var bool|null
     */
    protected ?bool $isDef = null;

    /**
     * @var bool|null
     */
    protected ?bool $isMetro = null;

    /**
     * @var bool|null
     */
    protected ?bool $logExecution = null;

    /**
     * @var bool|null
     */
    protected ?bool $logHistory = null;

    /**
     * @var bool|null
     */
    protected ?bool $isFavorite = null;

    /**
     * @var string|null
     */
    protected ?string $uCreated = null;

    /**
     * @var string|null
     */
    protected ?string $dCreated = null;

    /**
     * @var string|null
     */
    protected ?string $uChanged = null;

    /**
     * @var string|null
     */
    protected ?string $dChanged = null;

    /**
     * @var bool|null
     */
    protected ?bool $mobileLayout = null;

    /**
     * @var int|null
     */
    protected ?int $attribute = null;

    /**
     * @var array<string, string>
     */
    protected array $transferPropertyNameMap = [
        'rep_id' => 'repId',
        'rep_name' => 'repName',
        'rep_hash_code' => 'repHashCode',
        'rep_desc' => 'repDesc',
        'cat_name' => 'catName',
        'is_active' => 'isActive',
        'is_drilldown' => 'isDrilldown',
        'is_webservice' => 'isWebservice',
        'is_error_report' => 'isErrorReport',
        'is_def' => 'isDef',
        'is_metro' => 'isMetro',
        'log_execution' => 'logExecution',
        'log_history' => 'logHistory',
        'is_favorite' => 'isFavorite',
        'u_created' => 'uCreated',
        'd_created' => 'dCreated',
        'u_changed' => 'uChanged',
        'd_changed' => 'dChanged',
        'mobile_layout' => 'mobileLayout',
        'attribute' => 'attribute',
    ];

    /**
     * @return int|null
     */
    public function getRepId(): ?int
    {
        return $this->repId;
    }

    /**
     * @param int|null $repId
     * @return $this
     */
    public function setRepId(?int $repId): self
    {
        $this->repId = $repId;
        $this->modifiedProperties['repId'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireRepId(): self
    {
        $this->assertPropertyIsSet('repId');

        return $this;
    }

    /***
     * @return string|null
     */
    public function getRepName(): ?string
    {
        return $this->repName;
    }

    /**
     * @param string|null $repName
     * @return self
     */
    public function setRepName(?string $repName): self
    {
        $this->repName = $repName;
        $this->modifiedProperties[static::REP_NAME] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireRepName(): self
    {
        $this->assertPropertyIsSet(static::REP_NAME);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRepHashCode(): ?string
    {
        return $this->repHashCode;
    }

    /**
     * @param string|null $repHashCode
     * @return self
     */
    public function setRepHashCode(?string $repHashCode): self
    {
        $this->repHashCode = $repHashCode;
        $this->modifiedProperties['repHashCode'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireRepHashCode(): self
    {
        $this->assertPropertyIsSet('repHashCode');

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRepDesc(): ?string
    {
        return $this->repDesc;
    }

    /**
     * @param string|null $repDesc
     * @return self
     */
    public function setRepDesc(?string $repDesc): self
    {
        $this->repDesc = $repDesc;
        $this->modifiedProperties['repDesc'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireRepDesc(): self
    {
        $this->assertPropertyIsSet('repDesc');

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCatName(): ?string
    {
        return $this->catName;
    }

    /**
     * @param string|null $catName
     * @return self
     */
    public function setCatName(?string $catName): self
    {
        $this->catName = $catName;
        $this->modifiedProperties['catName'] = true;

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
     * @return self
     */
    public function setIsActive(?bool $isActive): self
    {
        $this->isActive = $isActive;
        $this->modifiedProperties['isActive'] = true;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsDrilldown(): ?bool
    {
        return $this->isDrilldown;
    }

    /**
     * @param bool|null $isDrilldown
     * @return self
     */
    public function setIsDrilldown(?bool $isDrilldown): self
    {
        $this->isDrilldown = $isDrilldown;
        $this->modifiedProperties['isDrilldown'] = true;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsWebservice(): ?bool
    {
        return $this->isWebservice;
    }

    /**
     * @param bool|null $isWebservice
     * @return self
     */
    public function setIsWebservice(?bool $isWebservice): self
    {
        $this->isWebservice = $isWebservice;
        $this->modifiedProperties['isWebservice'] = true;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsErrorReport(): ?bool
    {
        return $this->isErrorReport;
    }

    /**
     * @param bool|null $isErrorReport
     * @return self
     */
    public function setIsErrorReport(?bool $isErrorReport): self
    {
        $this->isErrorReport = $isErrorReport;
        $this->modifiedProperties['isErrorReport'] = true;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsDef(): ?bool
    {
        return $this->isDef;
    }

    /**
     * @param bool|null $isDef
     * @return self
     */
    public function setIsDef(?bool $isDef): self
    {
        $this->isDef = $isDef;
        $this->modifiedProperties['isDef'] = true;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsMetro(): ?bool
    {
        return $this->isMetro;
    }

    /**
     * @param bool|null $isMetro
     * @return self
     */
    public function setIsMetro(?bool $isMetro): self
    {
        $this->isMetro = $isMetro;
        $this->modifiedProperties['isMetro'] = true;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getLogExecution(): ?bool
    {
        return $this->logExecution;
    }

    /**
     * @param bool|null $logExecution
     * @return self
     */
    public function setLogExecution(?bool $logExecution): self
    {
        $this->logExecution = $logExecution;
        $this->modifiedProperties['logExecution'] = true;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getLogHistory(): ?bool
    {
        return $this->logHistory;
    }

    /**
     * @param bool|null $logHistory
     * @return self
     */
    public function setLogHistory(?bool $logHistory): self
    {
        $this->logHistory = $logHistory;
        $this->modifiedProperties['logHistory'] = true;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsFavorite(): ?bool
    {
        return $this->isFavorite;
    }

    /**
     * @param bool|null $isFavorite
     * @return self
     */
    public function setIsFavorite(?bool $isFavorite): self
    {
        $this->isFavorite = $isFavorite;
        $this->modifiedProperties[static::IS_FAVORITE] = true;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUCreated(): ?string
    {
        return $this->uCreated;
    }

    /**
     * @param string|null $uCreated
     * @return self
     */
    public function setUCreated(?string $uCreated): self
    {
        $this->uCreated = $uCreated;
        $this->modifiedProperties['uCreated'] = true;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDCreated(): ?string
    {
        return $this->dCreated;
    }

    /**
     * @param string|null $dCreated
     * @return self
     */
    public function setDCreated(?string $dCreated): self
    {
        $this->dCreated = $dCreated;
        $this->modifiedProperties['dCreated'] = true;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUChanged(): ?string
    {
        return $this->uChanged;
    }

    /**
     * @param string|null $uChanged
     * @return self
     */
    public function setUChanged(?string $uChanged): self
    {
        $this->uChanged = $uChanged;
        $this->modifiedProperties['uChanged'] = true;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDChanged(): ?string
    {
        return $this->dChanged;
    }

    /**
     * @param string|null $dChanged
     * @return self
     */
    public function setDChanged(?string $dChanged): self
    {
        $this->dChanged = $dChanged;
        $this->modifiedProperties['dChanged'] = true;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getMobileLayout(): ?bool
    {
        return $this->mobileLayout;
    }

    /**
     * @param bool|null $mobileLayout
     * @return self
     */
    public function setMobileLayout(?bool $mobileLayout): self
    {
        $this->mobileLayout = $mobileLayout;
        $this->modifiedProperties['mobileLayout'] = true;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAttribute(): ?int
    {
        return $this->attribute;
    }

    /**
     * @param int|null $attribute
     * @return self
     */
    public function setAttribute(?int $attribute): self
    {
        $this->attribute = $attribute;
        $this->modifiedProperties['attribute'] = true;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'rep_id' => $this->getRepId(),
            'rep_name' => $this->getRepName(),
            'rep_hash_code' => $this->getRepHashCode(),
            'rep_desc' => $this->getRepDesc(),
            'cat_name' => $this->getCatName(),
            'is_active' => $this->getIsActive(),
            'is_drilldown' => $this->getIsDrilldown(),
            'is_webservice' => $this->getIsWebservice(),
            'is_error_report' => $this->getIsErrorReport(),
            'is_def' => $this->getIsDef(),
            'is_metro' => $this->getIsMetro(),
            'log_execution' => $this->getLogExecution(),
            'log_history' => $this->getLogHistory(),
            'is_favorite' => $this->getIsFavorite(),
            'u_created' => $this->getUCreated(),
            'd_created' => $this->getDCreated(),
            'u_changed' => $this->getUChanged(),
            'd_changed' => $this->getDChanged(),
            'mobile_layout' => $this->getMobileLayout(),
            'attribute' => $this->getAttribute(),
        ];
    }

    /**
     * @param array<string, mixed> $data
     * @param bool $ignoreMissingProperties
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function fromArray(array $data, bool $ignoreMissingProperties = false)
    {
        foreach ($data as $property => $value) {
            $normalizedPropertyName = $this->transferPropertyNameMap[$property] ?? $property;

            switch ($normalizedPropertyName) {
                case 'repId':
                case 'repName':
                case 'repHashCode':
                case 'repDesc':
                case 'catName':
                case 'isActive':
                case 'isDrilldown':
                case 'isWebservice':
                case 'isErrorReport':
                case 'isDef':
                case 'isMetro':
                case 'logExecution':
                case 'logHistory':
                case 'isFavorite':
                case 'uCreated':
                case 'dCreated':
                case 'uChanged':
                case 'dChanged':
                case 'mobileLayout':
                case 'attribute':
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
