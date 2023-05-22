<?php

namespace App\Services\interfaces;

use App\Models\Paste;
use Illuminate\Pagination\LengthAwarePaginator;

interface PasteServiceInterface
{
    /**
     * @param array $data
     * @param int|null $user_id
     * @return Paste
     */
    public function savePaste(array $data, ?int $user_id = null): Paste;

    /**
     * @param string $url
     * @return Paste
     */
    public function showPaste(string $url): Paste;

    /**
     * @param string $id
     * @return LengthAwarePaginator
     */
    public function getPastesByUser(string $id): LengthAwarePaginator;
}
