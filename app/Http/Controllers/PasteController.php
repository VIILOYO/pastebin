<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        
        return view('paste', compact('pastes'));
    }
}
