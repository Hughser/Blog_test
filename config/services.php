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

    'github' => [
        'client_id' => 'cd7ba3b3f71800e890e8',
        'client_secret' => '22e4583e504f54bf33c090c657d2768e0091964b',
        'redirect' => 'http://localhost:8000/login/visitorsuser/github/callback',
    ],

    'facebook' => [
        'client_id' => '187626761641750',
        'client_secret' => 'd0ed9a7aa97809f2083b01d10c45424a',
        'redirect' => 'http://localhost:8000/login/visitorsuser/facebook/callback',
    ],

    'google' => [
        'client_id' => '227014055763-jhtaa82nphvgqtvkjqf5us6b4vn27v7d.apps.googleusercontent.com',
        'client_secret' => 'MtVeHSCXx9EkaAWZ2OlYyq9r',
        'redirect' => 'http://localhost:8000/login/visitorsuser/google/callback',
    ],

];
