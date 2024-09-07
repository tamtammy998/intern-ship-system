<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Campuses;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $campuses = Campuses::all();
        return view('pages.campuses.show',compact('campuses'));
    }
}