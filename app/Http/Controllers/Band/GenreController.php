<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Http\Requests\Band\GenreRequest;
use App\Models\Genre;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    public function create()
    {
        return view('genres.create',[
            'title' => 'New genre'
        ]);
    }

    public function store(GenreRequest $request)
    {
       Genre::create([
           'name' => $request->name,
           'slug' => Str::slug($request->name),
       ]);

       return back()->with('success','The genre was created');
    }

    public function table()
    {
        return view('genres.table',[
            'genres' => Genre::paginate(16),
            'title'  => 'All Music Genres'
        ]);
    }
}
