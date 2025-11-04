<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

use InvalidArgumentException;

class BladeFxSetFavoriteReportRequestTransfer extends AbstractTransfer
{
    /**
     * @var int|null
     */
    protected ?int $repId = null;

    /**
     * @var int|null
     */
    protected ?int $userId = null;

    /**
     * @var array<string, string>
     */
    protected array $transferPropertyNameMap = [
        'repId' => 'repId',
        'userId' => 'userId',
        'token' => 'accessToken',
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
     *
     * @return $this
     */
    public function setRepId(?int $repId)
    {
        $this->repId = $repId;
        $this->modifiedProperties['repId'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireRepId()
    {
        $this->assertPropertyIsSet('repId');

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int|null $userId
     *
     * @return $this
     */
    public function setUserId(?int $userId)
    {
        $this->userId = $userId;
        $this->modifiedProperties['userId'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireUserId()
    {
        $this->assertPropertyIsSet('userId');

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'repId' => $this->getRepId(),
            'userId' => $this->getUserId(),
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
                case 'repId':
                case 'userId':
                case 'accessToken':
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
