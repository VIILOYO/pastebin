<?php

namespace App\Repositories;

use App\Http\Requests\PasteCreateRequest;
use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class PasteRepository implements PasteRepositoryInterface
{
    public function create()
    {
        return view('paste.create');
    }

    public function store(PasteCreateRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user() ? auth()->user()->id : null;
        $data['url'] = substr(Hash::make($request->title), 0, 10);

        if($data['expiration_time'] > 0) $data['timeToDelete'] = Carbon::now()->subMinutes(-$data['expiration_time']);

        $paste = Paste::create($data);

        return redirect()->route('pastes.show', ['url' => $paste->url]);
    }

    public function show(string $url)
    {
        $paste = Paste::where('url', $url)->first();

        if($paste->access_restriction === 3 && (auth()->user() === null || auth()->user()->id !== $paste->user_id)) {
            return redirect()->back();
        };
        
        return view('paste.show', compact('paste'));
    }

    public function getPastesByUser(string $id)
    {
        $pastes = Auth()->user()->pastes()->paginate(10);

        return view('paste.index', compact('pastes'));
    }
}