<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Record;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $intern = User::with(['campus', 'programs'])
        ->where('id', auth()->user()->id)
        ->first(); 
        $totalHours = Record::where('student_id', auth()->user()->id)->where('status','approved')->sum('hours');;
        $documents = Document::with('upload')
        ->whereHas('upload', function ($q) {
            $q->where('student_id', auth()->user()->id);
        })
        ->orWhereDoesntHave('upload')
        ->get();
    

        return view('pages.students.show',compact('intern','documents','totalHours'));
    }


}
