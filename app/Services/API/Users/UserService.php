<?php

namespace App\Services\API\Users;

use App\Services\DTO\Users\CreateUserDto;
use App\Services\DTO\Users\LoginUserDto;
use App\Repositories\API\User\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function create(array $data)
    {
        try {
            $data = new CreateUserDto($data);
            $data->password = bcrypt($data->password);
            $user = $this->userRepository->create($data);
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['name'] =  $user->name;
            return $success;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function login(array $data)
    {
        try {
            $data = new LoginUserDto($data);
            if (Auth::attempt(['email' => $data->email, 'password' => $data->password])) {
                $user = Auth::user();
                $success['token'] =  $user->createToken('MyApp')->accessToken;
                $success['name'] =  $user->name;
                return $success;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
