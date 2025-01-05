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
        $dependents = $user->dependents;

        return view('Registration.dependent', compact('user', 'dependents'));
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

    return redirect()-> route('invoice.show',$user_id);
    }
        //return redirect()->route('create::Fee', $user_id)->with('success', 'Dependents added successfully. Proceed to payment.');

    public function editDependents(Dependent $dependent) // Renamed to match the route
{
    return view('dependents.edit', compact('dependent'));
}


    /**
     * Update the dependent's details.
     */
    public function updateDependents(Request $request, Dependent $dependent)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'relationship' => 'required|string|max:255',
            'age' => 'required|integer',
            'ic_number' => 'required|string|max:12',
        ]);

        $dependent->update($validatedData);

        return redirect()->route('profile.edit', ['#tambah-tanggungan'])->with('success', 'Dependent added successfully.');
    }

    public function deleteDependent(Dependent $dependent)
    {
        // Delete the dependent from the database
        $dependent->delete();

        // Redirect back with a success message
        return redirect()->route('profile.edit', ['#tambah-tanggungan'])->with('success', 'Dependent deleted successfully!');
    }


}
