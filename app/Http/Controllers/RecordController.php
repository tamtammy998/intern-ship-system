<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Campuses;
use App\Models\CampusProgram;
use App\Models\Program;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RecordController extends Controller
{
    public function index()
    {
        $records = collect(); 

        if (auth()->user()->usertype == 'Admin') {
            $programs = Program::all();
            $campuses = Campuses::all();
            $records = Record::with(['student','campus','programs']) ->get();
            return view('pages.records.admin',compact('records','programs','campuses'));
        }elseif(auth()->user()->usertype == 'ojt_in_charge'){

            $campuspgram =  CampusProgram::with('program','campus')->where('user_id', auth()->user()->id)->get();

            foreach($campuspgram as $row)
            {
                $data = Record::with(['student','campus','programs'])->where('campus_id', $row->campus_id)
                ->where('courses_id', $row->program_id)->get();
                if ($data->isNotEmpty()) {
                    $records = $records->merge($data); // Merge interns into the collection
                }
            }

            $programs = Program::all();
            $campuses = Campuses::all();       
            return view('pages.records.admin',compact('records','programs','campuses'));

        } else {
            $records = Record::with(['student','campus','programs'])
            ->where('student_id', auth()->user()->id)
            ->get();
            return view('pages.records.index',compact('records'));
        }
     
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048', // Adjust the allowed file types and maximum size (in KB)
            // 'student_id' => 'required|integer|max:10',
            'hours' => 'required|integer',
            'date_from' => 'required|date|max:255',
            'date_to' => 'required|date|max:255',
        ]);


        $file = $request->file('file');
        
        $originalFileName = $file->getClientOriginalName();
        $fileExtension = $file->getClientOriginalExtension();
        $fileNameWithoutExtension = pathinfo($originalFileName, PATHINFO_FILENAME);


        // Sanitize the file name
        $fileNameWithoutExtension = Str::slug($fileNameWithoutExtension, '-');
        $uploadPath = 'dtr/' . 'student_' . auth()->user()->id;

        // Generate a unique file name
        $fileName = $fileNameWithoutExtension . '.' . $fileExtension;
        $counter = 1;
        while (Storage::disk('public')->exists($uploadPath . '/' . $fileName)) {
            $fileName = $fileNameWithoutExtension . '-' . $counter . '.' . $fileExtension;
            $counter++;
        }

        $sizeInBytes = $file->getSize();

        // Determine the size format to use
        if ($sizeInBytes < 1048576) {
            // Convert the size to kilobytes (KB)
            $fileSize = number_format($sizeInBytes / 1024, 2) . ' KB';
        } else {
            // Convert the size to megabytes (MB)
            $fileSize = number_format($sizeInBytes / 1048576, 2) . ' MB';
        }

        $document = Record::create([
            'student_id' => auth()->user()->id,
            'campus_id' => auth()->user()->campus_id,
            'courses_id' => auth()->user()->courses_id,
            'hours' => $request->hours,
            'document_name' => $fileName,
            'document_path' => $file->storeAs($uploadPath, $fileName, 'public'),
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'document_size' => $fileSize,
            'document_extension' => $fileExtension,
            'status' => 'pending',
            'remarks' => '',
        ]);

        return redirect()->route('record.index')->with('success', 'Records save successfully.');
    }

    public function download(Record $document)
    {
        // Use the public disk to handle files in the public/storage directory
        $filePath = $document->document_path;
    
        // Check if the file exists using the public disk
        if (!Storage::disk('public')->exists($filePath)) {
            abort(404, 'File not found.');
        }
    
        // Get the full path to the file
        $fullPath = Storage::disk('public')->path($filePath);
    
        // Get the original extension or set a default extension
        $extension = pathinfo($document->document_name, PATHINFO_EXTENSION) ?: 'txt';
        $fileName = 'download-' . time() . '.' . $extension;
    
        // Return the download response
        return response()->download($fullPath, $fileName);
    }

    public function update(Record $records, Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'hours' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
        ]);
    
        // Update the record fields with validated data
        $records->update($validatedData);
        // Redirect back with a success message
        return redirect()->route('record.index')->with('success', 'Record updated successfully.');
    }
    

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $records = Record::findOrFail($id); // Fetch the agency by ID
        $docName = $records->document_name;

        if (Storage::disk('public')->exists($records->document_path)) {
            Storage::disk('public')->delete($records->document_path);
        }
        $records->delete();
        return redirect()->route('requirement.index')->with('success', 'Requirement delete successfully.');
    }

    public function data(Request $request)
    {
        $id = $request->input('id');
        $records = Record::with(['student','campus','programs'])->findOrFail($id);
        return view('pages.records.data',compact('records'));
    }

}
