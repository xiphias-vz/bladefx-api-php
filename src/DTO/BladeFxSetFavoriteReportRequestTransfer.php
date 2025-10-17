<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxSetFavoriteReportRequestTransfer extends AbstractTransfer
{
    /**
     * @var int|null
     */
    protected ?int $repId = null;

    /**
     * @var string
     */
    protected string $userId;

//    /**
//     * @var string
//     */
//    protected string $token;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'repId' => 'repId',
        'userId' => 'userId',
        'token' => 'accessToken'
    ];

    /**
     * @return int|null
     */
    public function getRepId(): ?int
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
     * @throws \Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException
     */
    public function requireRepId(): self
    {
        $this->assertPropertyIsSet('repId');

        return $this;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return void
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
        $this->modifiedProperties['userId'] = true;
    }

    /**
     * @return $this
     */
    public function requireUserId(): self
    {
        $this->assertPropertyIsSet('userId');

        return $this;
    }

//    /**
//     * @return string
//     */
//    public function getToken(): string
//    {
//        return $this->token;
//    }
//
//    /**
//     * @param string $token
//     * @return $this
//     */
//    public function setToken(string $token): self
//    {
//        $this->token = $token;
//        $this->modifiedProperties['token'] = true;
//
//        return $this;
//    }

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
            'repId' => $this->getRepId(),
            'userId' => $this->getUserId(),
//            'token' => $this->getAccessToken(),
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
                case 'repId':
                case 'userId':
                case 'accessToken':
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
