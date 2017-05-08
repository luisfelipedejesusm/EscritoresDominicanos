<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */
    'facebook' => [
        'client_id' => '1323653514392698',
        'client_secret' => 'd48e838051048ceb3719247b8f1a4139',
        'redirect' => 'http://199.89.55.4/FinalProject/loginSocialiteCallback/facebook',
    ],
    'twitter' => [
        'client_id' => 'ndZroWQ7IjyYQ6bCoueXV8GXl',
        'client_secret' => 'qTxUst2kYDfgxVE1Cb03wsZ9dnDIbkKBftdDJFUlSQiCUXk2yC',
        'redirect' => 'http://199.89.55.4/FinalProject/loginSocialiteCallback/twitter',
    ],
    'google' => [
        'client_id' => '1022823178275-pdu3k5vkgikk2iqvqotvoi9iq5ca4qlv.apps.googleusercontent.com',
        'client_secret' => 'Fsrg1Ivb9po-ghO2wEXG__bT',
        'redirect' => 'http://199.89.55.4/FinalProject/loginSocialiteCallback/google',
    ],
    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key' => '',
        'secret' => '',
    ],

];
