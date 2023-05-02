<?php

namespace App\Repositories\Interfaces;

interface PasteRepositoryInterface
{
    public function store(array $data);

    public function show(string $url);

    public function getPastesByUser(string $id);
}