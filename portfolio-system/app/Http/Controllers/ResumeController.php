<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    // Public resume view
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('public.resume', compact('user'));
    }
}
