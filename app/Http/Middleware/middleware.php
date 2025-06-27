<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use App\Http\Middleware\IsAdmin;

return [
    'auth' => Authenticate::class,
    'verified' => EnsureEmailIsVerified::class,
    'isAdmin' => IsAdmin::class,
];
