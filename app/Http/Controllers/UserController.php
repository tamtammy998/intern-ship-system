<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUser;
use App\Models\Campuses;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['campus', 'programs'])
        ->where('usertype', '<>', 'Student')
        ->get();
        $programs = Program::all();
        $campuses = Campuses::all();
        
        return view('pages.user.index',compact('users','programs','campuses'));
    }

    public function getProgram(Request $request)
    {
        $id = $request->input('id');
        $programs = Program::where('campus_id', $id)->get();
        return response()->json($programs);
    }

    public function edit(Request $request)
    {     
        $id = $request->input('id');
        $users = User::findOrFail($id); // Fetch the agency by ID
        $programs = Program::all();
        $campuses = Campuses::all();
        return view('pages.user.edit', compact('users','programs','campuses'));
    }

    public function profileEdit(Request $request)
    {
        $id = $request->input('id');
        $users = User::findOrFail($id); // Fetch the agency by ID
        $programs = Program::all();
        $campuses = Campuses::all();
        return view('pages.students.edit', compact('users','programs','campuses'));
    }

    public function update(Request $request, User $users)
    {
   
         $users->first_name =  $request->first_name;
         $users->middle_name =  $request->middle_name;
         $users->last_name =  $request->last_name;
         $users->usertype =  $request->usertype;
         $users->gender =  $request->gender;
         $users->courses_id =  $request->courses_id;
         $users->campus_id =  $request->campus_id;
         $users->contact =  $request->contact;
         $users->email =  $request->email;
        $users->save();
        return redirect()->route('user.index')->with('success', 'User updated successfully.'); // Changed message to reflect "User"
    }

    public function profileUpdate(UpdateUser $request, User $users)
    {
        $validatedData = $request->validated();
        $users->update($validatedData);
        // return redirect()->route('user.index')->with('success', 'User updated successfully.'); // Changed message to reflect "User"
        return redirect()->back()->with('success', 'User updated successfully.'); // This refreshes the current page
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:10'],
            'courses_id' => ['required', 'numeric', 'nullable'],
            'campus_id' => ['required','numeric', 'nullable'],
            'contact' => ['required', 'string', ],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
            'usertype' => ['required', 'string'],
            
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'courses_id' => $request->courses_id,
            'campus_id' => $request->campus_id,
            'email' => $request->email,
            'contact' => $request->contact,
            'usertype' => $request->usertype,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'Campus created successfully.');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $user = User::findOrFail($id); // Fetch the agency by ID
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }

    public function campus(Request $request)
    {
        $id = $request->input('id');
        $user = User::findOrFail($id); // Fetch the agency by ID
        $user->campus_id = $request->input('value');
        $user->save();
    }

    public function program(Request $request)
    {
        $id = $request->input('id');
        $user = User::findOrFail($id); // Fetch the agency by ID
        $user->courses_id = $request->input('value');
        $user->save();
    }

    public function changePass(Request $request)
    {
        $id = $request->input('id');
        $users = User::findOrFail($id); // Fetch the agency by ID
        return view('pages.user.password', compact('users'));
    }

    public function updatePass(User $users ,Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        $users->password = Hash::make($request->password);
        $users->save(); 
        return redirect()->route('user.index')->with('success', 'Password  updated successfully.');

    }
}
