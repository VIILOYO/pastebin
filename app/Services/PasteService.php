<?php

namespace App\Services;

use App\Http\Requests\PasteCreateRequest;
use App\Repositories\PasteRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class PasteService 
{
    private $pasteRepository;

    public function __construct(PasteRepository $pasteRepository)
    {
        $this->pasteRepository = $pasteRepository;
    }

    public function savePasteDate(PasteCreateRequest $request) 
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user() ? auth()->user()->id : null;
        $data['url'] = substr(Hash::make($request->title), 0, 10);

        if($data['expiration_time'] > 0) $data['timeToDelete'] = Carbon::now()->subMinutes(-$data['expiration_time']);

        $result = $this->pasteRepository->store($data);

        return $result;
    }

    public function showPaste(String $url) 
    {
        return $this->pasteRepository->show($url);
    }

    public function getPastesByUser(string $id)
    {
        return $this->pasteRepository->getPastesByUser($id);
    }
}