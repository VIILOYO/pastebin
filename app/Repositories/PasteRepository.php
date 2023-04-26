<?php

namespace App\Repositories;

use App\Models\Paste;
use App\Models\User;
use App\Repositories\Interfaces\PasteRepositoryInterface;

class PasteRepository implements PasteRepositoryInterface
{
    public function all()
    {
        return Paste::all();
    }
    public function getByUser(User $user)
    {
        return Paste::where('user_id'. $user->id)->get();
    }
}