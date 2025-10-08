<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Logger;

use Psr\Log\AbstractLogger;

class StdoutLogger extends AbstractLogger
{
    public function log($level, $message, array $context = []): void
    {
        $contextString = !empty($context) ? json_encode($context) : '';
        echo sprintf("[%s] %s %s\n", strtoupper($level), $message, $contextString);
    }
}
