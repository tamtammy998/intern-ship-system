<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Campuses;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

class InternController extends Controller
{
    public function index()
    {
        $interns = User::with(['campus', 'programs'])
        ->where('usertype', 'Student')
        ->get();
        $programs = Program::all();
        $campuses = Campuses::all();
        return view('pages.students.index',compact('interns','programs','campuses'));
    }

    public function show(Request $request)
    {
        $id = $request->input('id');
        $intern = User::with(['campus', 'programs'])->findOrFail($id); // Fetch the user by ID
        return view('pages.students.profile',compact('intern'));
    }
}