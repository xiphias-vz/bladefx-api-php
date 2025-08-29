<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Resources;

class ReportList
{
    /**
     * @var int|null
     */
    public ?int $catId = null;

    /**
     * @var string|null
     */
    public ?string $search = null;

    /**
     * @var string
     */
    public string $returnType = 'JSON';

    /**
     * @var bool
     */
    public bool $mobileLayoutOnly = false;

    /**
     * @var string|null
     */
    public ?string $attribute = null;

    public function __construct(
        ?int $catId = null,
        ?string $search = null,
        string $returnType = 'JSON',
        bool $mobileLayoutOnly = false,
        ?string $attribute = null
    ) {
        $this->catId = $catId;
        $this->search = $search;
        $this->returnType = $returnType;
        $this->mobileLayoutOnly = $mobileLayoutOnly;
        $this->attribute = $attribute;
    }
}
