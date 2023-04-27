<?php

namespace App\Repositories;

use App\Http\Requests\PasteCreateRequest;
use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use Carbon\Carbon;
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

        $paste = Paste::create($data);
        $paste->update(['timeToDelete' => Carbon::now()->subMinutes(-$paste->expiration_time)]);

        return redirect()->route('pastes.show', ['url' => $paste->url]);
    }

    public function show(string $url)
    {
        $paste = Paste::where('url', $url)->first();

        if($paste->access_restriction === 3) {
            if(auth()->user() === null || auth()->user()->id !== $paste->user_id) {
                return redirect()->back();
            }
        }
        return view('paste.show', compact('paste'));
    }

    public function getPastesByUser(string $id)
    {
        $pastes = Paste::where('user_id', auth()->user()->id)->orderByDesc('created_at')->paginate(10);
        return view('paste.index', compact('pastes'));
    }
}