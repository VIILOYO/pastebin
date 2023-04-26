<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface PasteRepositoryInterface
{
    public function all();

    public function getByUser(User $user);
}