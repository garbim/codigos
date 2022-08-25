<?php

namespace App\Services\DTO\Users;

use App\Services\DTO\AbstractDto;
use App\Services\DTO\DtoInterface;

class LoginUserDto extends AbstractDto implements DtoInterface
{

    /* @var string */
    public $email;
    public $password;

    /* @return array */
    protected function configureValidatorRules(): array
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }

    /* @return array */
    protected function configureValidatorMessages(): array
    {
        return [
            'email.required' => "The email field is required.",
            'password.required' => "The password field is required.",
        ];
    }


    /**
     * @inheritDoc
     */
    protected function map(array $data): bool
    {
        $this->email = $data['email'];
        $this->password = $data['password'];

        return true;
    }
}
