<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxGetReportParamFormRequestTransfer extends AbstractTransfer
{
    /**
     * @var int|null
     */
    protected ?int $rep_id = null;

    /**
     * @var string|null
     */
    protected ?string $rootUrl = null;

    /**
     * @var array<string, string>
     */
    protected array $transferPropertyNameMap = [
        'token' => 'accessToken',
        'rep_id' => 'rep_id',
        'rootUrl' => 'rootUrl'
    ];

    /**
     * @return int|null
     */
    public function getReportId(): ?int
    {
        return $this->rep_id;
    }

    /**
     * @param int|null $rep_id
     * @return $this
     */
    public function setReportId(?int $rep_id): self
    {
        $this->rep_id = $rep_id;
        $this->modifiedProperties['rep_id'] = true;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRootUrl(): ?string
    {
        return $this->rootUrl;
    }

    /**
     * @param string|null $rootUrl
     * @return $this
     */
    public function setRootUrl(?string $rootUrl): self
    {
        $this->rootUrl = $rootUrl;
        $this->modifiedProperties['rootUrl'] = true;

        return $this;
    }

    /**
     * @return $this
     */
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
            'accessToken' => $this->getAccessToken(),
            'rep_id' => $this->getReportId(),
            'rootUrl' => $this->getRootUrl(),
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
                case 'accessToken':
                case 'rep_id':
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
