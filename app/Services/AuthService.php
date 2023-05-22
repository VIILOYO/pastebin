<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class AuthService
{

    public function __construct(
        public readonly AuthRepositoryInterface $authRepository
    )
    {}


    /**
     * @inheritDoc
     */
    public function regUser(array $data): User
    {
        return $this->authRepository->create([
            'name' => $data['name'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
