<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dependent;

class ProfileController extends Controller
{
    // Show the profile and dependents page
    public function edit()
    {
        $user = auth()->user(); // Get the authenticated user

        if (!$user) {
            return redirect()->route('Login')->with('error', 'Please log in to access this page.');
        }

        $dependents = $user->dependents; // Fetch the dependents of the user

        return view('ProfileEdit', compact('user', 'dependents'));
    }

    // Update user's profile
    public function update(Request $request)
    {
        $user = auth()->user(); // Get the authenticated user

        // Validate the input
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'ic_num' => 'required|string|max:255|unique:users,ic_num,' . $user->id,
            'address' => 'required|string|max:255',
            'tel_num' => 'required|string|max:15',
            'age' => 'required|integer',
            'house_num' => 'nullable|string|max:255',
            'residency_stat' => 'required|string',
        ]);

        // Update the user's profile
        $user->update($validatedData);

        // Redirect back with a success message
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }

    // Add a new dependent
    public function addDependent(Request $request)
    {
        $user = auth()->user();

        // Validate the dependent input
        $validatedData = $request->validate([
            'dependent_full_name.*' => 'required|string|max:255',
            'dependent_relationship.*' => 'required|string|max:255',
            'dependent_age.*' => 'required|integer',
            'dependent_ic_num.*' => 'required|string|max:12',
        ]);

        foreach ($validatedData['dependent_full_name'] as $key => $fullName) {
            Dependent::create([
                'No_Ahli' => $user->No_Ahli,
                'full_name' => $fullName,
                'relationship' => $validatedData['dependent_relationship'][$key],
                'age' => $validatedData['dependent_age'][$key],
                'ic_number' => $validatedData['dependent_ic_num'][$key],
            ]);
        }

        return redirect()->route('profile.edit', ['#tambah-tanggungan'])->with('success', 'New dependents added successfully.');
    }


    public function showChangePasswordForm()
{
    return view('change-password');
}

public function changePassword(Request $request)
{
    // Validate the request data
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    // Get the currently authenticated user
    $user = Auth::user();

    // Check if the current password matches
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'The current password is incorrect.']);
    }

    // Update the user's password
    $user->update([
        'password' => Hash::make($request->new_password),
    ]);

    return redirect()->route('dashboard')->with('success', 'Password changed successfully.');
}
}
