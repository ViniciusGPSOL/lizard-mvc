<?php

namespace App\Http\Controllers;

use App\Models\Habitat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class HabitatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $habitat = Habitat::with(relations: ['lizard', 'prey'])->get();
        return response()->json(data: $habitat, status: 201);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate(rules: [
            'name' => 'required|string|max:255',
            'biome' => 'required|string|max:255',
            'temperature' => 'required|string|in:hot,cold,mild',
            'lizard_id' => 'nullable|exists:lizards,id',
            'prey_id' => 'nullable|exists:preys,id',
        ]);

        $habitat = Habitat::create(attributes: $validated);
        return response()->json(data: $habitat, status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $habitat = Habitat::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(rules: [
            'name' => 'required|string|max:255',
            'biome' => 'required|string|max:255',
            'temperature' => 'required|string|in:hot,cold,mild',
            'lizard_id' => 'nullable|exists:lizards,id',
            'prey_id' => 'nullable|exists:preys,id',
        ]);
        $habitat = Habitat::findOrFail(id: $id)->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        return response()->json(data: null, status: 204);
    }
}
