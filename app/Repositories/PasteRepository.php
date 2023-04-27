<?php

namespace App\Repositories;

use App\Http\Requests\PasteCreateRequest;
use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use Illuminate\Support\Facades\Hash;

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

    public function store(PasteCreateRequest $request) 
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user() ? auth()->user()->id : null;
        $data['url'] = substr(Hash::make($request->title), 0, 10);

        Paste::create($data);

        return redirect()->route('pastes.index');
    }

    public function show($url)
    {
        $paste = Paste::where('url', $url)->first();
        return view('paste.show', compact('paste'));
    }
}