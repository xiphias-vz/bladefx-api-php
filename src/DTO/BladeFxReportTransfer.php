<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxReportTransfer extends AbstractTransfer
{
    protected int $repId;
    protected ?string $repName = null;
    protected ?string $repHashCode = null;
    protected ?string $repDesc = null;
    protected ?string $catName = null;
    protected ?bool $isActive = null;
    protected ?bool $isDrilldown = null;
    protected ?bool $isWebservice = null;
    protected ?bool $isErrorReport = null;
    protected ?bool $isDef = null;
    protected ?bool $isMetro = null;
    protected ?bool $logExecution = null;
    protected ?bool $logHistory = null;
    protected ?bool $isFavorite = null;
    protected ?string $uCreated = null;
    protected ?string $dCreated = null;
    protected ?string $uChanged = null;
    protected ?string $dChanged = null;
    protected ?bool $mobileLayout = null;
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

    public function getRepId(): int
    {
        return $this->repId;
    }

    public function setRepId(int $repId): void
    {
        $this->repId = $repId;
        $this->modifiedProperties['repId'] = true;
    }

    public function requireRepId(): self
    {
        $this->assertPropertyIsSet('repId');

        return $this;
    }

    public function getRepName(): ?string
    {
        return $this->repName;
    }

    public function setRepName(?string $repName): void
    {
        $this->repName = $repName;
        $this->modifiedProperties['repName'] = true;
    }

    public function requireRepName(): self
    {
        $this->assertPropertyIsSet('repName');

        return $this;
    }

    public function getRepHashCode(): ?string
    {
        return $this->repHashCode;
    }

    public function setRepHashCode(?string $repHashCode): void
    {
        $this->repHashCode = $repHashCode;
        $this->modifiedProperties['repHashCode'] = true;
    }

    public function requireRepHashCode(): self
    {
        $this->assertPropertyIsSet('repHashCode');

        return $this;
    }

    public function getRepDesc(): ?string
    {
        return $this->repDesc;
    }

    public function setRepDesc(?string $repDesc): void
    {
        $this->repDesc = $repDesc;
        $this->modifiedProperties['repDesc'] = true;
    }

    public function requireRepDesc(): self
    {
        $this->assertPropertyIsSet('repDesc');

        return $this;
    }

    public function getCatName(): ?string
    {
        return $this->catName;
    }

    public function setCatName(?string $catName): void
    {
        $this->catName = $catName;
        $this->modifiedProperties['catName'] = true;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): void
    {
        $this->isActive = $isActive;
        $this->modifiedProperties['isActive'] = true;
    }

    public function getIsDrilldown(): ?bool
    {
        return $this->isDrilldown;
    }

    public function setIsDrilldown(?bool $isDrilldown): void
    {
        $this->isDrilldown = $isDrilldown;
        $this->modifiedProperties['isDrilldown'] = true;
    }

    public function getIsWebservice(): ?bool
    {
        return $this->isWebservice;
    }

    public function setIsWebservice(?bool $isWebservice): void
    {
        $this->isWebservice = $isWebservice;
        $this->modifiedProperties['isWebservice'] = true;
    }

    public function getIsErrorReport(): ?bool
    {
        return $this->isErrorReport;
    }

    public function setIsErrorReport(?bool $isErrorReport): void
    {
        $this->isErrorReport = $isErrorReport;
        $this->modifiedProperties['isErrorReport'] = true;
    }

    public function getIsDef(): ?bool
    {
        return $this->isDef;
    }

    public function setIsDef(?bool $isDef): void
    {
        $this->isDef = $isDef;
        $this->modifiedProperties['isDef'] = true;
    }

    public function getIsMetro(): ?bool
    {
        return $this->isMetro;
    }

    public function setIsMetro(?bool $isMetro): void
    {
        $this->isMetro = $isMetro;
        $this->modifiedProperties['isMetro'] = true;
    }

    public function getLogExecution(): ?bool
    {
        return $this->logExecution;
    }

    public function setLogExecution(?bool $logExecution): void
    {
        $this->logExecution = $logExecution;
        $this->modifiedProperties['logExecution'] = true;
    }

    public function getLogHistory(): ?bool
    {
        return $this->logHistory;
    }

    public function setLogHistory(?bool $logHistory): void
    {
        $this->logHistory = $logHistory;
        $this->modifiedProperties['logHistory'] = true;
    }

    public function getIsFavorite(): ?bool
    {
        return $this->isFavorite;
    }

    public function setIsFavorite(?bool $isFavorite): void
    {
        $this->isFavorite = $isFavorite;
        $this->modifiedProperties['isFavorite'] = true;
    }

    public function getUCreated(): ?string
    {
        return $this->uCreated;
    }

    public function setUCreated(?string $uCreated): void
    {
        $this->uCreated = $uCreated;
        $this->modifiedProperties['uCreated'] = true;
    }

    public function getDCreated(): ?string
    {
        return $this->dCreated;
    }

    public function setDCreated(?string $dCreated): void
    {
        $this->dCreated = $dCreated;
        $this->modifiedProperties['dCreated'] = true;
    }

    public function getUChanged(): ?string
    {
        return $this->uChanged;
    }

    public function setUChanged(?string $uChanged): void
    {
        $this->uChanged = $uChanged;
        $this->modifiedProperties['uChanged'] = true;
    }

    public function getDChanged(): ?string
    {
        return $this->dChanged;
    }

    public function setDChanged(?string $dChanged): void
    {
        $this->dChanged = $dChanged;
        $this->modifiedProperties['dChanged'] = true;
    }

    public function getMobileLayout(): ?bool
    {
        return $this->mobileLayout;
    }

    public function setMobileLayout(?bool $mobileLayout): void
    {
        $this->mobileLayout = $mobileLayout;
        $this->modifiedProperties['mobileLayout'] = true;
    }

    public function getAttribute(): ?int
    {
        return $this->attribute;
    }

    public function setAttribute(?int $attribute): void
    {
        $this->attribute = $attribute;
        $this->modifiedProperties['attribute'] = true;
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
            $normalizedPropertyName = $this->transferPropertyNameMap[$property] ?? null;

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

