<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use App\Services\interfaces\AuthServiceInterface;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
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
