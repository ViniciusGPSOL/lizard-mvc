<?php

namespace App\Http\Controllers;

use App\Models\Lizard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LizardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse //display the resources of Model, mostly everything.
    {
        $lizards = Lizard::with(relations: "habitat")->get();
        return response()->json(data: $lizards);
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
            "name" => "required|string|max:255",
            "species" => "required|string|max:255",
            "age" => "nullable|integer",
            "weight" => "nullable|numeric",
            "description" => "nullable|string",
            "poisonous" => "boolean",
        ]);

        $lizard = Lizard::create(attributes: $validated);
        return response()->json(data: $lizard, status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $lizard = Lizard::findOrFail(id: $id)->load(relations: 'habitat');
        return response()->json($lizard, status: 200);
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
        // Validate the request data
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "species" => "required|string|max:255",
            "age" => "nullable|integer",
            "weight" => "nullable|numeric",
            "description" => "nullable|string",
            "poisonous" => "boolean",
        ]);

        $lizard = Lizard::findOrFail($id);
        $lizard->update($validated);

        return response()->json($lizard, 200);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        Lizard::destroy(ids: $id);
        return response()->json(data: null, status: 204);
    }
}
