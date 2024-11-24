<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of all movies.
     */
    public function index()
    {
        // Fetch all movies with associated characters
        $movies = Movie::with('characters')->get();
        return response()->json($movies);
    }

    /**
     * Store a newly created movie in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'classification' => 'required|string|max:255',
            'release_date' => 'required|date',
            'review' => 'required|string',
            'season' => 'nullable|string',
        ]);

        // Create the movie
        $movie = Movie::create($validated);

        return response()->json($movie, 201);
    }

    /**
     * Display the specified movie.
     */
    public function show($id)
    {
        // Fetch the movie with associated characters
        $movie = Movie::with('characters')->findOrFail($id);
        return response()->json($movie);
    }

    /**
     * Update the specified movie in storage.
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'classification' => 'sometimes|string|max:255',
            'release_date' => 'sometimes|date',
            'review' => 'sometimes|string',
            'season' => 'nullable|string',
        ]);

        // Update movie details
        $movie->update($validated);

        return response()->json($movie);
    }

    /**
     * Remove the specified movie from storage.
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return response()->json(['message' => 'Movie deleted successfully']);
    }
}