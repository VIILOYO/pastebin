<?php

namespace App\Repositories;

use App\Http\Requests\PasteCreateRequest;
use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;

class PasteRepository implements PasteRepositoryInterface
{
    public function all()
    {
        return Paste::all();
    }

    public function create()
    {
        return view('paste.create');
    }

    public function store(PasteCreateRequest $request) {
        $data = $request->validate();

        dd($data);
    }
}