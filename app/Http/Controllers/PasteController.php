<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasteCreateRequest;
use App\Services\PasteService;

class PasteController extends Controller
{
    private PasteService $pasteService;

    public function __construct(PasteService $pasteService)
    {
        $this->pasteService = $pasteService;
    }

    public function create() 
    {
        return view('paste.create');
    }

    public function store(PasteCreateRequest $request) 
    {
        $paste = $this->pasteService->savePasteDate($request);

        return view('paste.show', compact('paste'));
    }

    public function show(string $url) 
    {
        $paste = $this->pasteService->showPaste($url);

        if($paste->access_restriction === 3 && (auth()->user() === null || auth()->user()->id !== $paste->user_id)) {
            return redirect()->back();
        };

        return view('paste.show', compact('paste'));
    }

    public function userPastes(string $id)
    {
        if($id != auth()->user()->id) {
            return redirect()->back();
        };

        $pastes = $this->pasteService->getPastesByUser($id);

        return view('paste.index', compact('pastes'));
    }
}
