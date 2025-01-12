<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

use InvalidArgumentException;

class LengthMaxRule implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
        if (empty($params[0])) {
            throw new InvalidArgumentException('Maksymalna długość nie została określona.');
        }
        $length = (int) $params[0];
        return strlen($data[$field]) < $length;
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "Wprowadzone dane przekraczają maksymalny dozwolony limit znaków wynoszący {$params[0]} znaków.";
    }
}
