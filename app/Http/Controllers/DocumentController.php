<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Documents\CreateDocument;
use App\Http\Requests\Documents\UpdateDocument;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('pages.documents.index',compact('documents'));
    }

    public function store(CreateDocument $request)
    {
        Document::create($request->validated());
        return redirect()->route('document.index')->with('success', 'Document created successfully.');
    }

    public function edit(Request $request)
    {     
        $id = $request->input('id');
        $documents = Document::findOrFail($id); // Fetch the agency by ID
        return view('pages.documents.edit', compact('documents'));
    }

    public function update(UpdateDocument $request, Document $documents)
    {
        $validatedData = $request->validated();
        $documents->update($validatedData);
        return redirect()->route('document.index')->with('success', 'Document updated successfully.');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $requirement = Document::findOrFail($id); // Fetch the agency by ID
        $requirement->delete();
        return redirect()->route('campuses.index')->with('success', 'Requirement deleted successfully.');
    }
}
