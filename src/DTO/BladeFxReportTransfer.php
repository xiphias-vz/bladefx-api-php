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
     * @var int
     */
    protected int $repId;

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
    protected $transferPropertyNameMap = [
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
     * @return int
     */
    public function getRepId(): int
    {
        return $this->repId;
    }

    /**
     * @param int $repId
     * @return void
     */
    public function setRepId(int $repId): void
    {
        $this->repId = $repId;
        $this->modifiedProperties['repId'] = true;
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
     * @return void
     */
    public function setRepName(?string $repName): void
    {
        $this->repName = $repName;
        $this->modifiedProperties[static::REP_NAME] = true;
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
     * @return void
     */
    public function setRepHashCode(?string $repHashCode): void
    {
        $this->repHashCode = $repHashCode;
        $this->modifiedProperties['repHashCode'] = true;
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
     * @return void
     */
    public function setRepDesc(?string $repDesc): void
    {
        $this->repDesc = $repDesc;
        $this->modifiedProperties['repDesc'] = true;
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
     * @return void
     */
    public function setCatName(?string $catName): void
    {
        $this->catName = $catName;
        $this->modifiedProperties['catName'] = true;
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
     * @return void
     */
    public function setIsActive(?bool $isActive): void
    {
        $this->isActive = $isActive;
        $this->modifiedProperties['isActive'] = true;
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
     * @return void
     */
    public function setIsDrilldown(?bool $isDrilldown): void
    {
        $this->isDrilldown = $isDrilldown;
        $this->modifiedProperties['isDrilldown'] = true;
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
     * @return void
     */
    public function setIsWebservice(?bool $isWebservice): void
    {
        $this->isWebservice = $isWebservice;
        $this->modifiedProperties['isWebservice'] = true;
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
     * @return void
     */
    public function setIsErrorReport(?bool $isErrorReport): void
    {
        $this->isErrorReport = $isErrorReport;
        $this->modifiedProperties['isErrorReport'] = true;
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
     * @return void
     */
    public function setIsDef(?bool $isDef): void
    {
        $this->isDef = $isDef;
        $this->modifiedProperties['isDef'] = true;
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
     * @return void
     */
    public function setIsMetro(?bool $isMetro): void
    {
        $this->isMetro = $isMetro;
        $this->modifiedProperties['isMetro'] = true;
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
     * @return void
     */
    public function setLogExecution(?bool $logExecution): void
    {
        $this->logExecution = $logExecution;
        $this->modifiedProperties['logExecution'] = true;
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
     * @return void
     */
    public function setLogHistory(?bool $logHistory): void
    {
        $this->logHistory = $logHistory;
        $this->modifiedProperties['logHistory'] = true;
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
     * @return void
     */
    public function setIsFavorite(?bool $isFavorite): void
    {
        $this->isFavorite = $isFavorite;
        $this->modifiedProperties[static::IS_FAVORITE] = true;
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
     * @return void
     */
    public function setUCreated(?string $uCreated): void
    {
        $this->uCreated = $uCreated;
        $this->modifiedProperties['uCreated'] = true;
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
     * @return void
     */
    public function setDCreated(?string $dCreated): void
    {
        $this->dCreated = $dCreated;
        $this->modifiedProperties['dCreated'] = true;
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
     * @return void
     */
    public function setUChanged(?string $uChanged): void
    {
        $this->uChanged = $uChanged;
        $this->modifiedProperties['uChanged'] = true;
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
     * @return void
     */
    public function setDChanged(?string $dChanged): void
    {
        $this->dChanged = $dChanged;
        $this->modifiedProperties['dChanged'] = true;
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
     * @return void
     */
    public function setMobileLayout(?bool $mobileLayout): void
    {
        $this->mobileLayout = $mobileLayout;
        $this->modifiedProperties['mobileLayout'] = true;
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
     * @return void
     */
    public function setAttribute(?int $attribute): void
    {
        $this->attribute = $attribute;
        $this->modifiedProperties['attribute'] = true;
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
