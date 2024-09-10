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

    
    public function edit(Request $request)
    {     
        $id = $request->input('id');
        $users = User::findOrFail($id); // Fetch the agency by ID
        $programs = Program::all();
        $campuses = Campuses::all();
        return view('pages.user.edit', compact('users','programs','campuses'));
    }

    public function update(UpdateUser $request, User $users)
    {
        $validatedData = $request->validated();
        $users->update($validatedData);
        return redirect()->route('user.index')->with('success', 'User updated successfully.'); // Changed message to reflect "User"
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
}
