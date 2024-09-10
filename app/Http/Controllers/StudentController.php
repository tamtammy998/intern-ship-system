<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $intern = User::with(['campus', 'programs'])
        ->where('id', auth()->user()->id)
        ->first(); // Use first() instead of get() to retrieve a single record
        $documents = Document::all();

        $uploads = Upload::where('student_id', auth()->user()->id)
        ->get();

        return view('pages.students.show',compact('intern','documents','uploads'));
    }

}
