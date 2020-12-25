<?php

namespace ShieldForce\AutoValidation\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Http\Request;

class RouteType extends Middleware
{
    public function __construct(Auth $auth)
    {
        $request = $auth->guard()->getRequest()->all();
        parent::__construct($auth);
    }
}
