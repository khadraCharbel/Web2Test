<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies=Movie::all();
        return view('index')->with('movies',$movies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'description' => 'required',
            'production_year' => 'required|integer',
            'duration' => 'required|integer',
            'genre' => 'required',
            'synopsis' => 'required',
        ]);
        $thumbnailPath = $request->file('thumbnail')->store('thumbnails');
        Movie::create([
            'title' => $request->title,
            'thumbnail' => $thumbnailPath,
            'description' => $request->description,
            'production_year' => $request->production_year,
            'duration' => $request->duration,
            'genre' => $request->genre,
            'synopsis' => $request->synopsis,
        ]);
    
        return redirect()->route('movies.index')->with('success', 'Movie added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $movie = Movie::with('reviews')->findOrFail($id); // Fetch movie with its reviews
    return view('movies.show', compact('movie'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie=Movie::findOrFail($id);
        return view('movies.edit')->with('movie',$movie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = Movie::findOrFail($id);

    // Validate the input fields
    $request->validate([
        'title' => 'required',
        'thumbnail' => 'nullable|image', // Thumbnail is optional for updating
        'description' => 'required',
        'production_year' => 'required|integer',
        'duration' => 'required|integer',
        'genre' => 'required',
        'synopsis' => 'required',
    ]);

    if ($request->hasFile('thumbnail')) {
        $thumbnailPath = $request->file('thumbnail')->store('thumbnails');
        $movie->thumbnail = $thumbnailPath;
    }

    $movie->title = $request->title;
    $movie->description = $request->description;
    $movie->production_year = $request->production_year;
    $movie->duration = $request->duration;
    $movie->genre = $request->genre;
    $movie->synopsis = $request->synopsis;

    $movie->save(); 

    return redirect()->route('movies.index')->with('success', 'Movie updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id); 

    if ($movie->thumbnail && Storage::exists($movie->thumbnail)) {
        Storage::delete($movie->thumbnail);
    }

    $movie->delete(); 

    return redirect()->route('movies.index')->with('success', 'Movie deleted successfully!');
    }
    public function search(Request $request)
{
    $query = $request->input('query'); // Get the search term
    $movies = Movie::where('title', 'like', '%' . $query . '%')
        ->orWhere('description', 'like', '%' . $query . '%')
        ->get();

    return view('movies.index', compact('movies', 'query'));
}

}
