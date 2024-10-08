<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Campuses;
use App\Models\Document;
use App\Models\Program;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class RequirementController extends Controller
{

    public function printPdfRequest($id)
    {
        if($id == '1')
        {
            // Set options for Dompdf
        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', true); // Enable remote content
        $pdf = new \Dompdf\Dompdf($options); // Create a new instance of Dompdf
            
        $a = 'a';
        $campus = Campuses::findOrFail(auth()->user()->campus_id); // Fetch the agency by ID
        // Load a view that will be converted into the PDF
        $pdf->loadHtml(view('pages.templates.memorandom', compact('campus'))->render());
    
        // Set paper size and orientation
        // $pdf->setPaper('A4', 'portrait');
        $pdf->setPaper('legal', 'portrait');

    
        // Render the PDF
        $pdf->render();
    
        // Set headers to display PDF in the browser
        return response($pdf->output())
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="request.pdf"');

        }else if($id == '2'){

            // Set options for Dompdf
            $options = new \Dompdf\Options();
            $options->set('isRemoteEnabled', true); // Enable remote content
            $pdf = new \Dompdf\Dompdf($options); // Create a new instance of Dompdf
                
            $a = 'a';
            $program = Program::findOrFail(@auth()->user()->campus_id); // Fetch the agency by ID
            $user = User::findOrFail(@auth()->user()->id); // Fetch the agency by ID
            $campus = Campuses::findOrFail(@auth()->user()->campus_id); // Fetch the agency by ID
            // Load a view that will be converted into the PDF
            $pdf->loadHtml(view('pages.templates.consent', compact('program','user','campus'))->render());
        
            // Set paper size and orientation
            $pdf->setPaper('A4', 'portrait');

        
            // Render the PDF
            $pdf->render();
        
            // Set headers to display PDF in the browser
            return response($pdf->output())
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="request.pdf"');
                
            }else if($id == '3'){

                // Set options for Dompdf
                $options = new \Dompdf\Options();
                $options->set('isRemoteEnabled', true); // Enable remote content
                $pdf = new \Dompdf\Dompdf($options); // Create a new instance of Dompdf
                    
                $a = 'a';
    
                // Load a view that will be converted into the PDF
                $pdf->loadHtml(view('pages.templates.report', compact('a'))->render());
            
                // Set paper size and orientation
                $pdf->setPaper('A4', 'portrait');
    
            
                // Render the PDF
                $pdf->render();
            
                // Set headers to display PDF in the browser
                return response($pdf->output())
                    ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'inline; filename="report.pdf"');
                    
            }

    }

    public function index()
    {
        $documents = Document::all();

        if (auth()->user()->usertype == 'Admin') {
            $uploads = Upload::with(['document']) ->get();
        } else {
            $uploads = Upload::with(['document'])
            ->where('student_id', auth()->user()->id)
            ->get();
        }
        return view('pages.requirements.index',compact('documents','uploads'));
    }

    public function store(Request $request)
    {
            // Validate the incoming request
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048', // Adjust the allowed file types and maximum size (in KB)
            'document_id' => 'required|integer|max:10',
        ]);

        $uploadsCount = Upload::where('student_id', auth()->user()->id)
        ->where('document_id', $request->input('document_id'))
        ->where('status', 'pending')
        ->count();
        if($uploadsCount > 0){
            return redirect()->route('requirement.index')
            ->withErrors('You already uploaded this kind of attachment. Please wait for the admin to accept.');
        }else{
            $file = $request->file('file');
            
            $originalFileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $fileNameWithoutExtension = pathinfo($originalFileName, PATHINFO_FILENAME);


            // Sanitize the file name
            $fileNameWithoutExtension = Str::slug($fileNameWithoutExtension, '-');
            $uploadPath = 'documents/' . 'student_' . auth()->user()->id;

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

            $document = Upload::create([
                'document_id' => $request->document_id,
                'student_id' => auth()->user()->id,
                'document_name' => $fileName,
                'document_path' => $file->storeAs($uploadPath, $fileName, 'public'),
                'document_size' => $fileSize,
                'document_extension' => $fileExtension,
                'status' => 'pending',
                'description' => $request->description,
            ]);

            return redirect()->route('requirement.index')->with('success', 'Requirement save successfully.');
        }


        

    }

    public function download(Upload $document)
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

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $uploads = Upload::findOrFail($id); // Fetch the agency by ID
        $docName = $uploads->document_name;

        if (Storage::disk('public')->exists($uploads->document_path)) {
            Storage::disk('public')->delete($uploads->document_path);
        }
        $uploads->delete();
        return redirect()->route('requirement.index')->with('success', 'Requirement delete successfully.');
    }
}
