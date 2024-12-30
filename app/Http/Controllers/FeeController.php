<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Toyyibpay;

class FeeController extends Controller
{
/** @disregard P1009 Undefined type */
    public function getBankFpx(){
        $data = Toyyibpay::getBanksFPX();
        dd($data);
    }

    public function createFee(Request $request, User $user): void
    {
        $category_code = 'xrezn9xa';
        dd($user, $category_code);
        $bill_object = [
            'billName'=> $bill_object->billName,
            'billDescription'=> $bill_object->billDescription,
            'billPriceSetting'=> $bill_object->billPriceSetting,
            'billPayorInfo'=> $bill_object->billPayorInfo,
            'billAmount'=> $bill_object->billAmount,
            'billReturnUrl'=> $bill_object->billReturnUrl ?? $this->redirect_uri,
            'billCallbackUrl'=> $bill_object->billCallbackUrl ?? $this->redirect_uri,
            'billExternalReferenceNo' => $bill_object->billExternalReferenceNo,
            'billTo'=> $bill_object->billTo,
            'billEmail'=> $bill_object->billEmail,
            'billPhone'=> $bill_object->billPhone,
            'billSplitPayment'=> $bill_object->billSplitPayment ?? 0,
            'billSplitPaymentArgs'=> $bill_object->billSplitPaymentArgs ?? '',
            'billPaymentChannel'=> $bill_object->billPaymentChannel ?? '0',
            'billContentEmail'=> $bill_object->billContentEmail ?? '',
            'billChargeToCustomer'=> $bill_object->billChargeToCustomer ?? 1,
        ];

        $data = Toyyibpay::createBill($category_code, $bill_object);

    }
}
