<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '174890166470465',      // Your FACEBOOK Client ID
        'client_secret' => '441e3a55d9f405db25f1b8d87db5ea0a', // Your FACEBOOK Client Secret
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '170392948487-i7o53u2vs5vt9vsvr0fnghb3ijkij0q5.apps.googleusercontent.com',      // Your FACEBOOK Client ID
        'client_secret' => 'POM-qLdJ8YbQ_UdouWzDOe_M', 
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],

];
