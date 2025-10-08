<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxReportParamFormRequestTransfer extends AbstractTransfer
{
    /**
     * @var BladeFxTokenTransfer
     */
    protected BladeFxTokenTransfer $token;

    /**
     * @var int|null
     */
    protected ?int $reportId = null;

    /**
     * @var string
     */
    protected string $rootUrl;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'token' => 'token',
        'rep_id' => 'reportId',
        'rootUrl' => 'rootUrl'
    ];

    /**
     * @return BladeFxTokenTransfer
     */
    public function getToken(): BladeFxTokenTransfer
    {
        return $this->token;
    }

    /**
     * @param BladeFxTokenTransfer $token
     * @return void
     */
    public function setToken(BladeFxTokenTransfer $token): void
    {
        $this->token = $token;
        $this->modifiedProperties['token'] = true;
    }

    /**
     * @return $this
     * @throws \Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException
     */
    public function requireToken(): self
    {
        $this->assertPropertyIsSet('token');

        return $this;
    }

    /**
     * @return int|null
     */
    public function getReportId(): ?int
    {
        return $this->reportId;
    }

    /**
     * @param int $reportId
     * @return void
     */
    public function setReportId(int $reportId): void
    {
        $this->reportId = $reportId;
        $this->modifiedProperties['reportId'] = true;
    }

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
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'token' => $this->token,
            'reportId' => $this->reportId,
            'rootUrl' => $this->rootUrl,
        ];
    }

    /**
     * @param array $data
     * @param bool $ignoreMissingProperties
     * @return $this
     */
    public function fromArray(array $data, bool $ignoreMissingProperties = false)
    {
        foreach ($data as $property => $value) {
            $normalizedPropertyName = $this->transferPropertyNameMap[$property] ?? null;

            switch ($normalizedPropertyName) {
                case 'token':
                case 'reportId':
                case 'rootUrl':
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
