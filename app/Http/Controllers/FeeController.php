<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Toyyibpay;

class FeeController extends Controller
{
    /** @disregard P1009 Undefined type */
    public function getBankFpx()
    {
        $data = Toyyibpay::getBanksFPX();
        dd($data);
    }

    public function createFee(Request $request, User $user)
    {
        $code = config('toyyibpay.code');


        $amount = 100 * 100; // RM100

        $bill_object = [
            'billName' => 'Bayaran pendaftaran E-Khairat',
            'billDescription' => 'Nombor Ic Ahli : ' . $user->IC_Num,
            'billPriceSetting' => 1,
            'billPayorInfo' => 1,
            'billAmount' => $amount,
            'billExternalReferenceNo' => 'No Ahli : ' . $user->id,
            'billTo' => $user->full_name,
            'billEmail' => $user->email,
            'billPhone' => $user->tel_num,
            'billChargeToCustomer' => 1,

        ];

        $data = Toyyibpay::createBill($code, (object) $bill_object);
        $bill_code = $data[0]->BillCode;
        return redirect()->route('bill::payment::link', $bill_code);
    }

    public function billPaymentLink($bill_code)
    {
        $data = Toyyibpay::billPaymentLink($bill_code);
        return redirect($data);
    }
}
