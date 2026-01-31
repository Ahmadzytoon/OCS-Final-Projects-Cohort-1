<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'stripe' => [
        'key' => 'pk_test_51Su7q2LOSf0RI7CtYPo4sRfPK9yrQk5W6ocEkpUGL1cFnCfFsJMhOcrPIAKe09uTENHNLZWf4eYBbZB2Y3mXuKTR00unwoBCv6',
        'secret' => 'sk_test_51Su7q2LOSf0RI7Ct1N5PYKBlXG3yk2GsOmA6poyPdCaHnXVHWQWOjq6JsLrUrGGmWq5GWJFB86JvR19ctNiR7Cxt00BB95S9Aa',
    ],




];
