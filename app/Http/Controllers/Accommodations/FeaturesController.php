<?php

namespace App\Http\Controllers\Accommodations;

use App\Actions\FeatureAction;
use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeaturesController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Accommodation $accommodation)
    {
        $features = \App\Models\Features::where('accommodation_id', '=', $accommodation->id)->paginate(9);
        return view('features.index', compact('accommodation', 'features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Accommodation $accommodation)
    {
        return view('features.create', compact('accommodation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Accommodation $accommodation, FeatureAction $eatureAction)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'image' => ['nullable', 'string'], 
            'icon' => ['nullable', 'string', 'max:255'],
            'type' => ['required', 'string'], 
            'status' => ['nullable', 'string'],
        ]);
        $data = $request->only([
            'name', 'description', 'image', 'icon', 'type', 'status'
        ]);
        $eatureAction->create([...$data,'accommodation_id'=>$accommodation->id??null]);
        return redirect()->route('features.index', $accommodation);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
