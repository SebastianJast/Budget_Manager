<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Rules\{RequiredRule, EmailRule, LoginLengthRule, MatchRule};
use Framework\Validator;

class ValidatorService
{
    private Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator();

        $this->validator->add('required', new RequiredRule());
        $this->validator->add('email', new EmailRule());
        $this->validator->add('match', new MatchRule());
        $this->validator->add('loginLength', new LoginLengthRule());
    }

    public function validateRegister(array $formData)
    {
        $this->validator->validate($formData, [
            'login' => ['required', 'loginLength'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'confirmPassword' => ['required', 'match: password'],
            'terms' => ['required']
        ]);
    }
}
