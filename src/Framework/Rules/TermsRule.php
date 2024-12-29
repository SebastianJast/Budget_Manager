<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class TermsRule implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
        return isset($data[$field]);
    }
    public function getMessage(array $data, string $field, array $params): string
    {
        return "Potwierdź akceptację regulaminu.";
    }
}
