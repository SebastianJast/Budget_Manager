<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Rules\{DateFormatRule, RequiredRule, EmailRule, LengthMaxRule, LoginFormatRule, LoginLengthRule, MatchRule, NumericRule, PasswordLengthRule, TermsRule};
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
        $this->validator->add('lengthMax', new LengthMaxRule());
        $this->validator->add('numeric', new NumericRule());
        $this->validator->add('dateFormat', new DateFormatRule());
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

    public function validateIncome(array $formData)
    {
        $this->validator->validate($formData, [
            'amount' => ['required', 'numeric'],
            'date' => ['required', 'dateFormat:Y-m-d'],
            'category' => ['required'],
            'comment' => ['required', 'lengthMax:255']
        ]);
    }

    public function validateExpense(array $formData)
    {
        $this->validator->validate($formData, [
            'amount' => ['required', 'numeric'],
            'date' => ['required', 'dateFormat:Y-m-d'],
            'category' => ['required'],
            'comment' => ['required', 'lengthMax:255'],
            'payMethod' => ['required']
        ]);
    }

    public function validateEditAccount(array $formData)
    {
        $this->validator->validate($formData, [
            'login' => ['required', 'loginLength', 'loginFormat'],
            'email' => ['required', 'email'],
            'password' => ['required', 'passwordLength'],
            'confirmPassword' => ['required', 'match:password'],
        ]);
    }
}
