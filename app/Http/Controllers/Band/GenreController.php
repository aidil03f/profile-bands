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
            'genres' => Genre::withCount('bands')->latest()->paginate(16),
            'title'  => 'All Music Genres'
        ]);
    }

    public function show(Genre $genre)
    {
        return view('genres.show',[
            'title' => "{$genre->name}",
            'genre' => $genre,
            'bands' => $genre->bands()->latest()->paginate(16),
        ]);
    }

    public function edit(Genre $genre)
    {
        return view('genres.edit',[
            'title' => "Edit genre: {$genre->name}",
            'genre' => $genre,
        ]);
    }

    public function update(Genre $genre, GenreRequest $request)
    {
        $genre->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
 
        return redirect()->route('genres.table')->with('success','The genre was updated');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
    }
}
