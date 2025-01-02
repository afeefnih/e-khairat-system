<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user(); // Get the authenticated user

        if (!$user) {
            return redirect()->route('Login')->with('error', 'Please log in to access this page.');
        }

        return view('ProfileEdit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user(); // Get the authenticated user

        // Validate the input
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id, // Exclude the current user's email
'ic_num' => 'required|string|max:255|unique:users,ic_num,' . $user->id, // Exclude the current user's IC number
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
}
