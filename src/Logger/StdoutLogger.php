<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Logger;

use Psr\Log\AbstractLogger;

class StdoutLogger extends AbstractLogger
{
    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param mixed[] $context
     *
     * @throws \Psr\Log\InvalidArgumentException
     */
    public function log($level, string|\Stringable $message, array $context = []): void
    {
        $contextString = !empty($context) ? json_encode($context) : '';
        echo sprintf("[%s] %s %s\n", strtoupper($level), $message, $contextString);
    }
}
