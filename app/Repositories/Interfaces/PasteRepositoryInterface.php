<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\PasteCreateRequest;

interface PasteRepositoryInterface
{
    public function all();

    public function create();

    public function store(PasteCreateRequest $request);

    public function show(string $url);
}