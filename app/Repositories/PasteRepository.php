<?php

namespace App\Repositories;

use App\Models\Paste;
use App\Models\User;
use App\Repositories\Interfaces\PasteRepositoryInterface;

class PasteRepository implements PasteRepositoryInterface
{
    public function store(array $data)
    {
        return Paste::create($data);;
    }

    public function show(string $url)
    {
        return Paste::where('url', $url)->first();;
    }

    public function getPastesByUser(string $id)
    {
        $user = User::findOrFail($id);

        return $user->pastes()->paginate(10);
    }
}