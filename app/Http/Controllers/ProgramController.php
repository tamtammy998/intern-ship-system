<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Programs\CreateProgram;
use App\Http\Requests\Programs\UpdateProgram;
use App\Models\Campuses;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::with('campus')->get();
        $campuses = Campuses::all();
        return view('pages.programs.index',compact('programs','campuses'));
    }

    public function store(CreateProgram $request)
    {
        Program::create($request->validated());
        return redirect()->route('programs.index')->with('success', 'Program created successfully.');
    }

    public function edit(Request $request)
    {     
        $id = $request->input('id');
        $programs = Program::with('campus')->findOrFail($id); // Fetch the user by ID
        $campuses = Campuses::all();
        return view('pages.programs.edit', compact('programs','campuses'));
    }

    public function update(UpdateProgram $request, Program $programs)
    {
        $validatedData = $request->validated();
        $programs->update($validatedData);
        return redirect()->route('programs.index')->with('success', 'Program updated successfully.');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $programs = Program::findOrFail($id); // Fetch the agency by ID
        $programs->delete();
        return redirect()->route('programs.index')->with('success', 'Program deleted successfully.');
    }
}
