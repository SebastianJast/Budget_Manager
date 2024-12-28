<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Rules\{RequiredRule, EmailRule};
use Framework\Validator;

class ValidatorService
{
    private Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator();

        $this->validator->add('required', new RequiredRule());
        $this->validator->add('email', new EmailRule());
    }

    public function validateRegister(array $formData)
    {
        $this->validator->validate($formData, [
            'login' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'confirmPassword' => ['required'],
            'terms' => ['required']
        ]);
    }
}
