<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Logger;

use Psr\Log\AbstractLogger;

class StdoutLogger extends AbstractLogger
{
    /**
     * @param mixed $level
     * @param \Stringable|string $message
     * @param array<mixed> $context
     *
     * @return void
     */
    // phpcs:disable
    public function log($level, string|\Stringable $message, array $context = []): void
    {
        // phpcs:enable
        $contextString = (bool)$context ? json_encode($context) : '';
        echo sprintf("[%s] %s %s\n", strtoupper($level), $message, $contextString);
    }
}
