<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Rules\{RequiredRule, EmailRule, LoginFormatRule, LoginLengthRule, MatchRule, PasswordLengthRule, TermsRule};
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
        $this->validator->add('loginFormat', new LoginFormatRule());
        $this->validator->add('passwordLength', new PasswordLengthRule());
    }

    public function validateRegister(array $formData)
    {
        $this->validator->validate($formData, [
            'login' => ['required', 'loginLength', 'loginFormat'],
            'email' => ['required', 'email'],
            'password' => ['required', 'passwordLength'],
            'confirmPassword' => ['required', 'match:password'],
        ]);
    }

    public function validateLogin(array $formData) 
    {
        $this->validator->validate($formData, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
    }

    public function validateIncome(array $formData) {
        $this->validator->validate($formData, [
            'amount' => ['required'],
            'date' => ['required'],
            'category' => ['required'],
            'comment' => ['required']
        ]);
    }
}
