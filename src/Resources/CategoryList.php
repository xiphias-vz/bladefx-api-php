<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Resources;

class CategoryList
{
    /**
     * @var int|null
     */
    public ?int $catId = null;

    /**
     * @var string
     */
    public string $returnType = 'JSON';

    /**
     * @param int|null $catId
     * @param string $returnType
     */
    public function __construct(
        ?int $catId = null,
        string $returnType = 'JSON'
    ) {
        $this->catId = $catId;
        $this->returnType = $returnType;
    }
}
