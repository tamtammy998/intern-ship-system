<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Campuses\CreateCampus;
use App\Http\Requests\Campuses\UpdateCampus;
use App\Models\Campuses;
use Illuminate\Http\Request;

class CampusesController extends Controller
{
    public function index()
    {
        $campuses = Campuses::all();
        return view('pages.campuses.index',compact('campuses'));
    }

    public function show()
    {
        $campuses = Campuses::all();
        return view('pages.campuses.show',compact('campuses'));
    }

    
    public function store(CreateCampus $request)
    {
        Campuses::create($request->validated());
        return redirect()->route('campuses.index')->with('success', 'Campus created successfully.');
    }

    public function edit(Request $request)
    {     
        $id = $request->input('id');
        $campuses = Campuses::findOrFail($id); // Fetch the agency by ID
        return view('pages.campuses.edit', compact('campuses'));
    }

    public function update(UpdateCampus $request, Campuses $campuses)
    {
        $validatedData = $request->validated();
        $campuses->update($validatedData);
        return redirect()->route('campuses.index')->with('success', 'Campus updated successfully.');
    }
    
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $campuses = Campuses::findOrFail($id); // Fetch the agency by ID
        $campuses->delete();
        return redirect()->route('campuses.index')->with('success', 'Campus deleted successfully.');
    }
}