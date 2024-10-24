<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Campuses;
use App\Models\CampusProgram;
use App\Models\Document;
use App\Models\Program;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;

class InternController extends Controller
{
    public function index()
    {
        $allInterns = collect(); 

        if (auth()->user()->usertype == 'Admin') {

            $interns = User::with(['campus', 'programs', 'upload'])
            ->where('usertype', 'Student')
            ->withSum('upload', 'hours')  // Add this to calculate total hours
            ->get();
            $allInterns = $allInterns->merge($interns);

        } else {
     
            $campuspgram =  CampusProgram::with('program','campus')->where('user_id', auth()->user()->id)->get();
   
            foreach($campuspgram as $row)
            {
                $interns = User::with(['campus', 'programs','upload'])
                    ->where('usertype', 'Student')
                    ->where('campus_id', $row->campus_id)
                    ->where('courses_id', $row->program_id)
                    ->withSum('upload', 'hours')  // Add this to calculate total hours
                    ->get();

                    if ($interns->isNotEmpty()) {
                        $allInterns = $allInterns->merge($interns); // Merge interns into the collection
                    }
            }

        }
    
        $programs = Program::all();
        $campuses = Campuses::all();

        return view('pages.students.index',compact('interns','programs','campuses','allInterns'));
    }

    public function show(Request $request)
    {
        $id = $request->input('id');
        $intern = User::with(['campus', 'programs'])->findOrFail($id); // Fetch the user by ID
        $documents = Document::with('upload')
        ->where(function ($query) use ($id) {
            $query->whereHas('upload', function ($q) use ($id) {
                $q->where('student_id', $id);
            })
            ->orWhereDoesntHave('upload');
        })
        ->get();
    
        $uploads = Upload::all();
        return view('pages.students.profile',compact('intern','documents','uploads'));
    }

    public function status(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');

        $campuses = Upload::findOrFail($id);
        $campuses->status = $status;
        $campuses->save();
    }
}
