<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxSetFavoriteReportResponseTransfer extends AbstractTransfer
{
    /**
     * @var int
     */
    protected int $statusCode = 0;

    /**
     * @var bool
     */
    protected bool $success = false;

    /**
     * @var string
     */
    protected string $rMessage = "";

    /**
     * @var string
     */
    protected string $causer = "";

    /**
     * @var int
     */
    protected int $id = 0;

    /**
     * @var bool
     */
    protected bool $areUsure = false;

    /**
     * @var string|null
     */
    protected ?string $optionValue = "";

    /**
     * @var bool
     */
    protected bool $licenceIssue = false;

    /**
     * @var array<string, string>
     */
    protected array $transferPropertyNameMap = [
        'statusCode' => 'statusCode',
        'success' => 'success',
        'rMessage' => 'rMessage',
        'causer' => 'causer',
        'id' => 'id',
        'areUsure' => 'areUsure',
        'optionValue' => 'optionValue',
        'licenceIssue' => 'licenceIssue',
    ];

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return self
     */
    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return bool
     */
    public function getSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @param bool $success
     * @return self
     */
    public function setSuccess(bool $success): self
    {
        $this->success = $success;
        $this->modifiedProperties['success'] = true;

        return $this;
    }

    /**
     * @return string
     */
    public function getRMessage(): string
    {
        return $this->rMessage;
    }

    /**
     * @param string $rMessage
     * @return self
     */
    public function setRMessage(string $rMessage): self
    {
        $this->rMessage = $rMessage;
        $this->modifiedProperties['rMessage'] = true;

        return $this;
    }

    /**
     * @return $this
     * @throws \Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException
     */
    public function requireRMessage(): self
    {
        $this->assertPropertyIsSet('rMessage');
        return $this;
    }

    /**
     * @return string
     */
    public function getCauser(): string
    {
        return $this->causer;
    }

    /**
     * @param string $causer
     * @return self
     */
    public function setCauser(string $causer): self
    {
        $this->causer = $causer;
        $this->modifiedProperties['causer'] = true;

        return $this;
    }

    /**
     * @return bool
     */
    public function getAreUsure(): bool
    {
        return $this->areUsure;
    }

    /**
     * @param bool $areUsure
     * @return self
     */
    public function setAreUsure(bool $areUsure): self
    {
        $this->areUsure = $areUsure;
        $this->modifiedProperties['areUsure'] = true;

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
     * @return self
     */
    public function setOptionValue(?string $optionValue): self
    {
        $this->optionValue = $optionValue;
        $this->modifiedProperties['optionValue'] = true;

        return $this;
    }

    /**
     * @return bool
     */
    public function getLicenceIssue(): bool
    {
        return $this->licenceIssue;
    }

    /**
     * @param bool $licenceIssue
     * @return self
     */
    public function setLicenceIssue(bool $licenceIssue): self
    {
        $this->licenceIssue = $licenceIssue;
        $this->modifiedProperties['licenceIssue'] = true;

        return $this;
    }

    /**
     * @param array<mixed> $data
     * @param bool $ignoreMissingProperties
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
                case 'areUsure':
                case 'optionValue':
                case 'licenceIssue':
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
