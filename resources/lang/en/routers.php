<?php

return [
    'login' => 'login',
    'logout' => 'logout',
    'register' => 'register',
    'password' => [
        'reset' => 'password/reset',
        'email' => 'password/email',
        'reset-token' => 'password/reset/{token}',
    ],
    'email' => [
        'verify' => 'email/verify',
        'verify-id' => 'email/verify/{id}',
        'resend' => 'email/resend',
    ],
];
