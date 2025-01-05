<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Toyyibpay;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Donation;

class GuestController extends Controller
{
    public function GuestView1()
    {
        return view('Guest.Utama');
    }

    public function GuestView2()
    {
        return view('Guest.Syarat');
    }

    public function GuestView3()
    {
        return view('Guest.Infaq');
    }

    // Process Donation
    public function processDonation(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:1', // Minimum RM1 donation
        ]);

        $code = config('toyyibpay.category_codes.badan_kebajikan'); // Donation category code
        $amount = $validatedData['amount'] * 100; // Convert to cents

        // Generate unique reference for the donation
        $externalReference = 'Donation-' . uniqid();

        // Prepare the bill object
        $bill_object = [
            'billName' => 'Sumbangan',
            'billDescription' => 'Sumbangan untuk badan khairat kebajikan',
            'billPriceSetting' => 0, // Dynamic bill
            'billPayorInfo' => 0,
            'billAmount' => $amount,
            'billTo' => 0,
            'billEmail' => 0,
            'billPhone' => 0,
            'billExternalReferenceNo' => $externalReference,
            'billChargeToCustomer' => 0,
            'billCallbackUrl' => route('donation.callback'), // Callback for payment status
            'billReturnUrl' => route('donation.return'), // Redirect after payment
        ];
//
        try {
            // Create the bill via ToyyibPay API
            $data = Toyyibpay::createBill($code, (object) $bill_object);
            $bill_code = $data[0]->BillCode;

            // Save the donation to the database with "pending" status
            Donation::create([
                'bill_code' => $bill_code,
                'amount' => $validatedData['amount'],
                'status_id' => 'testing',
            ]);

            // Redirect to payment link
            return redirect()->route('bill::payment::link', $bill_code);
        } catch (\Exception $e) {
            // Log the error and redirect with an error message
            Log::error('Donation Process Error: ' . $e->getMessage());
            return back()->with('error', 'Failed to process your donation. Please try again.');
        }
    }

    // Callback for donation payment
    // Callback for donation payment
    public function donationCallback(Request $request)
    {
        Log::info('ToyyibPay Donation Callback Received:', $request->all());

        // Retrieve parameters from the callback request
        $status = $request->input('status_id'); // 1 = Success, 2 = Pending, 3 = Failed
        $billCode = $request->input('billcode');
        $amount = $request->input('amount'); // Amount paid

        // Update the donation's payment status using Query Builder
        $updateResult = DB::table('donations')
            ->where('bill_code', $billCode)
            ->update([
                'status_id' => $status == 1 ? 'paid' : ($status == 3 ? 'failed' : 'pending'),
            ]);

        if (!$updateResult) {
            // Log an error if no rows were updated
            Log::error('Failed to update donation status for Bill Code: ' . $billCode);
            return response('Donation not found or update failed', 404);
        }

        // Log the update for debugging purposes
        Log::info('Donation status updated', [
            'bill_code' => $billCode,
            'status_id' => $status == 1 ? 'paid' : ($status == 3 ? 'failed' : 'pending'),
        ]);

        // Return a success response to ToyyibPay
        return response('Donation processed', 200);
    }



    // Return URL handler for donations
    public function donationReturn(Request $request)
    {
        // Retrieve data from the return URL
        $statusID = $request->query('status_id'); // 1 = Success, 2 = Pending, 3 = Failed
        $billCode = $request->query('billcode');

        // Display appropriate message to the user
        if ($statusID == 1) {
            return redirect()->route('Infaq')->with('success', 'Thank you for your donation!');
        } elseif ($statusID == 3) {
            return redirect()->route('Infaq')->with('error', 'Donation failed. Please try again.');
        } else {
            return redirect()->route('Infaq')->with('warning', 'Donation is pending. Please wait for confirmation.');
        }
    }

    // Redirect to payment link
    public function billPaymentLink($bill_code)
    {
        $data = Toyyibpay::billPaymentLink($bill_code);

        return redirect($data);
    }
}
