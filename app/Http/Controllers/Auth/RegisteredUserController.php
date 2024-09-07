<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Campuses;
use App\Models\Program;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $programs = Program::all();
        $campuses = Campuses::all();
        return view('auth.register',compact('programs','campuses'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'student_id' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:10'],
            'courses_id' => ['required', 'numeric', 'nullable'],
            'completion' => ['required', 'string', ],
            'intern_start' => ['required', 'date', ],
            'campus_id' => ['required','numeric', 'nullable'],
            'mname' => ['nullable', 'string', 'max:255'],
            'fname' => ['nullable', 'string', 'max:255'],
            'ccontact' => ['required', 'string', ],
            'contact' => ['required', 'string', ],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'student_id' => $request->student_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'courses_id' => $request->courses_id,
            'completion' => $request->completion,
            'campus_id' => $request->campus_id,
            'intern_start' => $request->intern_start,
            'mname' => $request->mname,
            'fname' => $request->fname,
            'ccontact' => $request->ccontact,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
