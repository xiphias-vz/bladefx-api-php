<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

use JsonSerializable;

class ReportParamsDefTransfer extends AbstractTransfer implements JsonSerializable
{
    /**
     * @param ReportParamsTransfer[] $params
     */
    public function __construct(
        protected int $rep_id = 0,
        protected int $layout_id = 0,
        protected string $imageFormat = '',
        protected ?array $params = null
    ) {
        parent::__construct();

        if ($params === null) {
            $params = [
                new ReportParamsTransfer(
                    0,
                    "",
                    "",
                    "",
                    "",
                    true,
                    true
                )
            ];
        }

        $this->params = $params;
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
    }

    /**
     * @return int
     */
    public function getLayoutId(): int
    {
        return $this->layout_id;
    }

    /**
     * @param int $layout_id
     * @return void
     */
    public function setLayoutId(int $layout_id): void
    {
        $this->layout_id = $layout_id;
    }

    /**
     * @return string
     */
    public function getImageFormat(): string
    {
        return $this->imageFormat;
    }

    /**
     * @param string $imageFormat
     * @return void
     */
    public function setImageFormat(string $imageFormat): void
    {
        $this->imageFormat = $imageFormat;
    }

    /**
     * @return array<mixed>
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param array<mixed> $params
     * @return void
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    /**
     * @return array<mixed>
     */
    public function jsonSerialize(): array
    {
        return [
            'rep_id' => $this->getRepId(),
            'layout_id' => $this->getLayoutId(),
            'imageFormat' => $this->getImageFormat(),
            'params' => $this->getParams(),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'rep_id' => $this->getRepId(),
            'layout_id' => $this->getLayoutId(),
            'imageFormat' => $this->getImageFormat(),
            'params' => array_map(fn(ReportParamsTransfer $p) => $p->toArray(), $this->getParams()),
        ];
    }
}
