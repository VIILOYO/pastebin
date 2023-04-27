<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasteCreateRequest;
use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;


class PasteController extends Controller
{
    private $pasteRepository;

    public function __construct(PasteRepositoryInterface $pasteRepository)
    {
        $this->pasteRepository = $pasteRepository;
    }

    public function index()
    {
        $pastes = $this->pasteRepository->all();
        
        return view('paste.index', compact('pastes'));
    }

    public function create() 
    {
        return $this->pasteRepository->create();
    }

    public function store(PasteCreateRequest $request) 
    {
        return $this->pasteRepository->store($request);
    }

    public function show(string $url) 
    {
        return $this->pasteRepository->show($url);
    }
}
