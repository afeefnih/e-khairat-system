<?php

return [

  'client_secret' => env('TOYYIBPAY_USER_SECRET_KEY', ''),
  'redirect_uri' => env('TOYYIBPAY_REDIRECT_URI', ''),
  'sandbox' => env('TOYYIBPAY_SANDBOX', true),
  'category_codes' => [
        'dana_khairat' => env('TOYYIBPAY_CATEGORY_CODE_DANA_KHAIRAT'),
        'badan_kebajikan' => env('TOYYIBPAY_CATEGORY_CODE_BADAN_KEBAJIKAN'),
    ],

];
