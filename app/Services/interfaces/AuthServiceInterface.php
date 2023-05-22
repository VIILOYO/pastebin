<?php

namespace App\Services\interfaces;

use App\Models\User;

interface AuthServiceInterface
{
    /**
     * @param array $data
     * @return User
     */
    public function regUser(array $data): User;
}
