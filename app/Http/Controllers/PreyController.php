<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Prey;

class PreyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $response = Prey::with(relations: 'habitat')->get();
        return response()->json(data: $response, status: 201);
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
            'height' => 'required|float',
            'weight' => 'required|float',
            'description' => 'required|string',
            'species' => 'required|string|max:255',
        ]);

        $prey = Prey::create(attributes: $validated);
        return response()->json(data: $prey, status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $response = Prey::findOrFail(id: $id);
        return response()->json(data: $response, status: 0);
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
    public function update(Request $request, string $id): JsonResponse
    {
        $validated = $request->validate(rules: [
            'name' => 'required|string|max:255',
            'height' => 'required|float',
            'weight' => 'required|float',
            'description' => 'required|string',
            'species' => 'required|string|max:255',
        ]);

        $prey = Prey::findOrFail(id: $id)->update($validated);
        return response()->json(data: $prey, status: 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $deleted = Prey::destroy(ids: $id);
        return response()->json(data: null, status: 204);
    }
}
