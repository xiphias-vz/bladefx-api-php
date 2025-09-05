<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxReportParamFormRequestTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    protected string $rootUrl;

    /**
     * @var int|null
     */
    protected ?int $rep_id = null;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'rootUrl' => 'rootUrl',
        'rep_id' => 'rep_id',
    ];

    /**
     * @return string
     */
    public function getRootUrl(): string
    {
        return $this->rootUrl;
    }

    /**
     * @param string $rootUrl
     * @return void
     */
    public function setRootUrl(string $rootUrl): void
    {
        $this->rootUrl = $rootUrl;
        $this->modifiedProperties['rootUrl'] = true;
    }

    public function requireRootUrl(): self
    {
        $this->assertPropertyIsSet('rootUrl');

        return $this;
    }

    /**
     * @return int
     */
    public function getRepId(): int
    {
        return $this->rep_id;
    }

    /**
     * @param int $rep_id
     * @return void
     */
    public function setRepId(int $rep_id): void
    {
        $this->rep_id = $rep_id;
        $this->modifiedProperties['rep_id'] = true;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'rootUrl' => $this->rootUrl,
            'rep_id' => $this->rep_id,
        ];
    }
}
