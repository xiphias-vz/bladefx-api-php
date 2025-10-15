<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Plugins\Formatter;

class AuthenticationRequestFieldFormatterPlugin implements AuthenticationRequestFormatterPluginInterface
{
    /**
     * @var string
     */
    protected const DEFAULT_DELIMITER = '_';

    /**
     * @var string
     */
    protected const DEFAULT_REGEX = '/(?=[A-Z])/';

    /**
     * @param array<mixed> $requestData
     *
     * @return array<mixed>
     */
    public function format(array $requestData): array
    {
        $formattedData = [];

        foreach ($requestData as $requestField => $requestFieldValue) {
            $fieldKey = strtolower(
                implode(
                    static::DEFAULT_DELIMITER,
                    preg_split(static::DEFAULT_REGEX, $requestField),
                ),
            );

            $formattedData[$fieldKey] = $requestFieldValue;
        }

        return $formattedData;
    }
}
