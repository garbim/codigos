<?php

namespace App\Services\DTO\Users;


use App\Services\DTO\AbstractDto;
use App\Services\DTO\DtoInterface;

class CreateUserDto extends AbstractDto implements DtoInterface
{

    /* @var string */
    public $name;
    public $email;
    public $password;
    protected $c_password;

    /* @return array */
    protected function configureValidatorRules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ];
    }

    /* @return array */
    protected function configureValidatorMessages(): array
    {
        return [
            'name.required' => "The name field is required.",
            'email.required' => "The email field is required.",
            'email.email' => "The email field must be a valid email address.",
            'email.unique' => "The email field must be a unique.",
            'password.required' => "The password field is required.",
            'c_password.required' => "The c_password field is required.",
            'c_password.same' => "The c_password field and The password field need to be the same.",
        ];
    }


    /**
     * @inheritDoc
     */
    protected function map(array $data): bool
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->c_password = $data['c_password'];

        return true;
    }
}
