<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class PasswordLengthRule implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
        return ((strlen($data[$field]) < 8) || (strlen($data[$field]) > 20)) ? false : true;
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "Hasło musi posiadać od 8 do 20 znaków!";
    }
}
