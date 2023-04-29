<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\PasteCreateRequest;
use Illuminate\Database\Eloquent\Collection;

interface PasteRepositoryInterface
{
    public function create();

    public function store(PasteCreateRequest $request);

    public function show(string $url);

    public function getPastesByUser(string $id);
}