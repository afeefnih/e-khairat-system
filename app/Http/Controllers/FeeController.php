<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Toyyibpay;
use Illuminate\Support\Facades\Log;

class FeeController extends Controller
{
    /** @disregard P1009 Undefined type */
    public function getBankFpx()
    {
        $data = Toyyibpay::getBanksFPX();
        dd($data);
    }

    public function createFee(Request $request, $user_id)
{
    $user = User::findOrFail($user_id);

    $code = config('toyyibpay.category_codes.dana_khairat');

    $amount = 100 * 100; // RM100



    $bill_object = [
        'billName' => 'Bayaran Pendaftaran E-Khairat',
        'billDescription' => $user->ic_num, // User's IC number
        'billPriceSetting' => 1,
        'billPayorInfo' => 1,
        'billAmount' => $amount,
        'billExternalReferenceNo' => $user->id, // External reference for tracking
        'billTo' => $user->full_name,
        'billEmail' => $user->email,
        'billPhone' => $user->tel_num,
        'billCallbackUrl' => route('payment.callback'), // Backend processing URL
        'billReturnUrl' => route('payment.return'), // User-facing URL
    ];


    $data = Toyyibpay::createBill($code, (object) $bill_object);


    $bill_code = $data[0]->BillCode;



    return redirect()->route('bill::payment::link', $bill_code);
}


    public function paymentCallback(Request $request)
    {
        // Log incoming callback for debugging
        Log::info('ToyyibPay Callback Received: ', $request->all());

        // Retrieve data from the callback
        $status = $request->input('status'); // 1 = Success, 2 = Pending, 3 = Failed
        $billCode = $request->input('billcode');
        $transactionID = $request->input('refno'); // Reference number
        $orderID = $request->input('order_id'); // External reference (e.g., user ID)
        $amount = $request->input('amount');
        $transactionTime = $request->input('transaction_time');

        dd($request->all());

        // Find the user or payment by external reference (order_id)
        $user = User::where('id', $orderID)->first();

        if (!$user) {
            Log::error('User not found for Order ID: ' . $orderID);
            return response('User not found', 404);
        }

        // Update user's payment status based on the callback
        $user->payment_status = $status == 1 ? 'paid' : ($status == 2 ? 'pending' : 'failed');
        $user->save();

        Log::info('User payment status updated', ['user_id' => $user->id, 'payment_status' => $user->payment_status]);

        // Return a success response to ToyyibPay
        return response('Payment processed', 200);
    }

    public function paymentReturn(Request $request)
{
    // Retrieve data from the return URL
    $statusID = $request->query('status_id'); // 1 = Success, 2 = Pending, 3 = Failed
    $billCode = $request->query('billcode');
    $orderID = $request->query('order_id');

    // Display appropriate message to the user
    if ($statusID == 1) {
        return redirect()->route('dashboard')->with('success', 'Payment successful!');
    } elseif ($statusID == 3) {
        return redirect()->route('Login')->with('error', 'Payment failed. Please try again.');
    } else {
        return redirect()->route('Login')->with('warning', 'Payment is pending. Please wait for confirmation.');
    }
}



    public function billPaymentLink($bill_code)
    {
        $data = Toyyibpay::billPaymentLink($bill_code);
        return redirect($data);
    }
}
