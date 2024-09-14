<?php

use App\Http\Controllers\Branch;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CampusesController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\InternController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Campuses;
use App\Models\Document;
use App\Models\Program;
use App\Models\Record;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/dashboard', function () {
    $totalHours = '';
    $remaining = '';
    $percent = '';
    $userCount = 0;
    $campusCount = 0;
    $programsCount = 0;
    $user = '';

    $documents = Document::with('upload')
    ->whereHas('upload', function ($q) {
        $q->where('student_id', auth()->user()->id);
    })
    ->orWhereDoesntHave('upload')
    ->get();

    $user = User::with(['campus', 'programs', 'upload'])
    ->where('id', auth()->user()->id)
    ->firstOrFail();  // This will return the first matching user or throw a 404 if not found

    $requirements = Document::all();
    $campuses = Campuses::all();
    $coordinators = User::with(['campus','programs'])->where('usertype', 'ojt_in_charge')->get();
    if (auth()->user()->usertype == 'Admin') {
        $userCount = User::where('usertype', 'Student')->count();
        $records = Record::with(['student','campus','programs'])->get();
        $campusCount = Campuses::all()->count();
        $programsCount = Program::all()->count();
    }elseif(auth()->user()->usertype == 'ojt_in_charge'){
        $userCount = User::where('usertype', 'Student')
        ->where('campus_id', auth()->user()->campus_id)
        ->where('courses_id', auth()->user()->courses_id)
        ->count();
    
        $records = Record::with(['student','campus','programs'])->where('campus_id', auth()->user()->campus_id)
                  ->where('courses_id', auth()->user()->courses_id)->get();
    } else {
        $records = Record::with(['student','campus','programs'])
        ->where('student_id', auth()->user()->id)
        ->get();
        // $totalHours = $records->sum('hours');
        $totalHours = Record::where('student_id', auth()->user()->id)->where('status','approved')
        ->sum('hours');

        $remaining = auth()->user()->completion - intval($totalHours);
        $percent = round((intval($totalHours) / intval(auth()->user()->completion)) * 100, 2);

    }
    return view('dashboard',compact('documents','records','totalHours','remaining','percent','userCount','campusCount','programsCount','requirements','campuses','coordinators','user'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


        Route::name('programs.')->prefix('/programs')->group(function () {
            Route::get('/', [ProgramController::class, 'index'])->name('index');
            Route::post('/create', [ProgramController::class, 'store'])->name('create');
            Route::post('/edit', [ProgramController::class, 'edit'])->name('edit');
            Route::put('/update/{programs}', [ProgramController::class, 'update'])->name('update');
            Route::post('/delete', [ProgramController::class, 'destroy'])->name('delete');
        });
    
        Route::name('campuses.')->prefix('/campuses')->group(function () {
            Route::get('/', [CampusesController::class, 'index'])->name('index');
            Route::post('/create', [CampusesController::class, 'store'])->name('create');
            Route::post('/edit', [CampusesController::class, 'edit'])->name('edit');
            Route::put('/update/{campuses}', [CampusesController::class, 'update'])->name('update');
            Route::post('/delete', [CampusesController::class, 'destroy'])->name('delete');
            Route::post('/program', [CampusesController::class, 'program'])->name('program');
            
        });

        Route::name('intern.')->prefix('/intern')->group(function () {
            Route::get('/', [InternController::class, 'index'])->name('index');
            Route::post('/show', [InternController::class, 'show'])->name('show');
            Route::post('/status', [InternController::class, 'status'])->name('status');
        });

        Route::name('branch.')->prefix('/branch')->group(function () {
            Route::get('/', [BranchController::class, 'index'])->name('index');
        });

        Route::name('user.')->prefix('/user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::post('/edit', [UserController::class, 'edit'])->name('edit');
            Route::post('/create', [UserController::class, 'store'])->name('create');
            Route::put('/update/{users}', [UserController::class, 'update'])->name('update'); // Updated here
            Route::post('/delete', [UserController::class, 'destroy'])->name('delete');
            Route::post('/campus', [UserController::class, 'campus'])->name('campus');
            Route::post('/program', [UserController::class, 'program'])->name('program');
            Route::post('/get_program', [UserController::class, 'getProgram'])->name('get_program');
            Route::post('/password', [UserController::class, 'changePass'])->name('password');
            Route::put('/update_password/{users}', [UserController::class, 'updatePass'])->name('update_password'); // Updated here
            Route::post('/profile_edit', [UserController::class, 'profileEdit'])->name('profile_edit');
            Route::put('/profile_update/{users}', [UserController::class, 'profileUpdate'])->name('profile_update');
        });

        Route::name('student.')->prefix('/student')->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('index');
        });

        Route::name('requirement.')->prefix('/requirement')->group(function () {
            Route::get('/', [RequirementController::class, 'index'])->name('index');
            Route::post('/create', [RequirementController::class, 'store'])->name('create');
            Route::get('/documents/{document}/download', [RequirementController::class, 'download'])->name('documents.download');
            Route::post('/delete', [RequirementController::class, 'destroy'])->name('delete');
        });
    

        Route::name('document.')->prefix('/document')->group(function () {
            Route::get('/', [DocumentController::class, 'index'])->name('index');
            Route::post('/edit', [DocumentController::class, 'edit'])->name('edit');
            Route::post('/create', [DocumentController::class, 'store'])->name('create');
            Route::put('/update/{documents}', [DocumentController::class, 'update'])->name('update'); // Updated here
            Route::post('/delete', [DocumentController::class, 'destroy'])->name('delete');
        });

        Route::name('record.')->prefix('/record')->group(function () {
            Route::get('/', [RecordController::class, 'index'])->name('index');
            Route::post('/create', [RecordController::class, 'store'])->name('create');
            Route::put('/update/{records}', [RecordController::class, 'update'])->name('update'); // Updated here
            Route::get('/documents/{document}/download', [RecordController::class, 'download'])->name('documents.download');
            Route::post('/delete', [RecordController::class, 'destroy'])->name('delete');
            Route::post('/data', [RecordController::class, 'data'])->name('data');
        });
});

require __DIR__.'/auth.php';
