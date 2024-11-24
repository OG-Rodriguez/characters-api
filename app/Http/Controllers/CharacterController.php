<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Movie;

class CharacterController extends Controller
{
    /**
     * Display a listing of all characters.
     */
    public function index()
    {
        // Fetch all characters with associated movies
        $characters = Character::with('movies')->get();
        return response()->json($characters);
    }

    /**
     * Store a newly created character in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'movies' => 'required|array', // Expect an array of movie IDs
            'movies.*' => 'exists:movies,id', // Validate each movie ID
            'picture' => 'required|url',
            'description' => 'required|string',
        ]);

        // Create the character
        $character = Character::create($request->only(['name', 'picture', 'description']));

        // Attach movies to the character
        $character->movies()->attach($request->movies);

        return response()->json($character, 201);
    }

    /**
     * Display the specified character.
     */
    public function show($id)
    {
        // Fetch the character with associated movies
        $character = Character::with('movies')->findOrFail($id);
        return response()->json($character);
    }

    /**
     * Update the specified character in storage.
     */
    public function update(Request $request, $id)
    {
        $character = Character::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|string',
            'movies' => 'sometimes|array', // Optional movies array
            'movies.*' => 'exists:movies,id',
            'picture' => 'sometimes|url',
            'description' => 'sometimes|string',
        ]);

        // Update character details
        $character->update($request->only(['name', 'picture', 'description']));

        // Sync movies if provided
        if ($request->has('movies')) {
            $character->movies()->sync($request->movies);
        }

        return response()->json($character->load('movies'));
    }

    /**
     * Remove the specified character from storage.
     */
    public function destroy($id)
    {
        $character = Character::findOrFail($id);
        $character->delete();

        return response()->json(['message' => 'Character deleted successfully']);
    }
}

