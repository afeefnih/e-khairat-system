<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Dependent;
use App\Models\User;

class AuthController extends Controller
{
    // Step 1: Show the registration form for step 1
    public function registerStepAll()
    {
        return view('registration.register');
    }

    public function registerPost(Request $request)
    {

//dd($request->all());
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'ic_number' => 'required|string|unique:users,ic_num',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'residency_stat' => 'required|string',
            'age' => 'required|integer',
            'house_num' => 'nullable|string|max:255', // Mark as nullable if not required
        ]);

        // Map validated data to match database column names
        $user = User::create([
            'full_name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'ic_num' => $validatedData['ic_number'],
            'address' => $validatedData['address'],
            'tel_num' => $validatedData['phone'],
            'residency_stat' => $validatedData['residency_stat'],
            'age' => $validatedData['age'],
            'house_num' => $validatedData['house_num'] ?? null, // Use null if it's optional
        ]);

        // Log the user in
        Auth::login($user);

      // Redirect the user to the "Add Dependent" page
    return redirect()->route('dependent.add', $user->id);
    }

    public function registerDependent(Request $request)
    {
        // Validate the data for dependents
        $validatedData = $request->validate([
            'dependent_full_name.*' => 'required|string|max:255',
            'dependent_relationship.*' => 'required|string|max:255',
            'dependent_age.*' => 'required|integer',
            'dependent_ic_number.*' => 'required|string|max:12',
        ]);

        // Store dependents in the database
        foreach ($request->dependent_full_name as $key => $full_name) {
            \App\Models\Dependent::create([
                'No_Ahli' => $request->session()->get('user_id'), // Assuming user ID is stored in session
                'full_name' => $full_name,
                'relationship' => $request->dependent_relationship[$key],
                'age' => $request->dependent_age[$key],
                'ic_number' => $request->dependent_ic_number[$key],
            ]);
        }

        // After storing dependents, proceed to next step or redirect
        return redirect()->route('dashboard'); // Change this to the next appropriate route
    }

    public function invoice(User $user)
{
    $dependents = $user->dependents; // Fetch all dependents for the user
    $registrationFee = 100.00; // Set your registration fee

    return view('registration.invoice', compact('user', 'dependents', 'registrationFee'));
}

public function processInvoice(Request $request, $user_id)
{
    // Validate that the "agree" checkbox is checked
    $request->validate([
        'agree' => 'required|accepted', // Ensures the checkbox is checked and has a valid value
    ]);

    // Redirect to the payment gateway or fee creation route with a success message
    return redirect()->route('create::Fee', $user_id)->with('success', 'Invoice confirmed successfully. Proceed to payment.');
}



    // Final Step: Complete the registration

    // Show login form
    public function create()
    {
        return view('Guest.Login');
    }

    // Login user
    public function login(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'ic_number' => 'required|string', // Validate IC Number instead of email
            'password' => 'required|string',
        ]);

        // Attempt to log in the user
        if (Auth::attempt(['IC_Num' => $validatedData['ic_number'], 'password' => $validatedData['password']])) {
            // Regenerate session to avoid session fixation
            $request->session()->regenerate();

            // Redirect to the dashboard
            return redirect()->route('dashboard');
        }

        // If login fails, redirect back with an error message
        return back()->withErrors([
            'ic_number' => 'The provided credentials do not match our records.',
        ]);
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate and regenerate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the login page
        return redirect('/Login');
    }
}

// Step 2: Process Step 1 and show Step 2

/*
    public function registerStep2(Request $request)
    {
        // Validate Step 1 data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Store data from Step 1 in the session
        $request->session()->put('full_name', $request->full_name);
        $request->session()->put('email', $request->email);
        $request->session()->put('password', $request->password);

        // Show the second step
        return view('registration.step2');
    }

    // Step 3: Process Step 2 and show Step 3
    public function registerStep3(Request $request)
    {
        // Validate Step 2 data
        $request->validate([
            'ic_number' => 'required|numeric',
            'address' => 'required|string|max:255',
            'phone' => 'required|numeric',
        ]);

        // Store data from Step 2 in the session
        $request->session()->put('ic_number', $request->ic_number);
        $request->session()->put('address', $request->address);
        $request->session()->put('phone', $request->phone);

        // Show the third step
        return view('registration.step3');
    }

    */
