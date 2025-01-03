<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dependent;

class DependentController extends Controller
{
    // Show the "Add Dependent" page
    public function addDependentPage($user_id)
    {
        // Fetch the user based on the ID
        $user = User::findOrFail($user_id);

        return view('Registration.dependent', compact('user'));
    }

    // Store the dependent in the database
    public function storeDependent(Request $request, $user_id)
    {
        // Fetch the user by ID
        $user = User::findOrFail($user_id);

        // Validate the dependent data
        $validatedData = $request->validate([
            'dependent_full_name.*' => 'required|string|max:255',
            'dependent_relationship.*' => 'required|string|max:255',
            'dependent_age.*' => 'required|integer',
            'dependent_ic_num.*' => 'required|string|max:12',
        ]);

        // Store multiple dependents
        foreach ($request->dependent_full_name as $key => $dependent_name) {
            Dependent::create([
                'No_Ahli' => $user->No_Ahli, // Use the user's No_Ahli
                'full_name' => $dependent_name,
                'relationship' => $request->dependent_relationship[$key],
                'age' => $request->dependent_age[$key],
                'ic_number' => $request->dependent_ic_num[$key],
            ]);
        }

        return redirect()->route('create::Fee', $user_id)->with('success', 'Dependents added successfully. Proceed to payment.');
    }
}
