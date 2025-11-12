<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    // Show dashboard
    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }

    // Show edit form
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // Update profile
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255',
            'about_me' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle skills (if provided)
        if ($request->has('skill_name')) {
            $skills = [];
            $skillNames = $request->input('skill_name', []);
            $skillLevels = $request->input('skill_level', []);

            foreach ($skillNames as $index => $name) {
                if (!empty($name) && isset($skillLevels[$index])) {
                    $skills[] = [
                        'name' => $name,
                        'level' => (int) $skillLevels[$index]
                    ];
                }
            }
            $validated['skills'] = $skills;
        }

        // Handle education (if provided)
        if ($request->has('edu_program')) {
            $education = [];
            $programs = $request->input('edu_program', []);
            $schools = $request->input('edu_school', []);
            $years = $request->input('edu_years', []);

            foreach ($programs as $index => $program) {
                if (!empty($program)) {
                    $education[] = [
                        'program' => $program,
                        'school' => $schools[$index] ?? '',
                        'years' => $years[$index] ?? ''
                    ];
                }
            }
            $validated['education'] = $education;
        }

        // Handle projects (if provided)
        if ($request->has('project_name')) {
            $projects = [];
            $projectNames = $request->input('project_name', []);
            $projectDescriptions = $request->input('project_description', []);
            $projectLinks = $request->input('project_link', []);

            foreach ($projectNames as $index => $name) {
                if (!empty($name)) {
                    $projects[] = [
                        'name' => $name,
                        'description' => $projectDescriptions[$index] ?? '',
                        'link' => $projectLinks[$index] ?? ''
                    ];
                }
            }
            $validated['projects'] = $projects;
        }

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->profile_image && file_exists(public_path($user->profile_image))) {
                unlink(public_path($user->profile_image));
            }

            // Store new image
            $image = $request->file('profile_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/profiles'), $imageName);
            $validated['profile_image'] = 'uploads/profiles/' . $imageName;
        }

        // Update user
        $user->update($validated);

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
    }

    // Delete account (keep Breeze's default)
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
