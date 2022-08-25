<?php

namespace App\Repositories\API\User;

use App\Models\User;
use App\Services\DTO\User\CreateUserDto;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function get(int $id)
    {
        return $this->user->findOrFail($id);
    }

    public function create(CreateUserDto $data)
    {
        try {
            $storage = ['name' => $data->name, 'email' => $data->email, 'password' => $data->password];
            return $this->user->create($storage);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($id, array $data)
    {
        $user = $this->get($id);
        $user->fill($data);
        return $user->save();
    }
}
