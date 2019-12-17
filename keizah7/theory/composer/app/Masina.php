<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;

class Masina
{
    public function __construct()
    {
        $request = Request::createFromGlobals();

        _dc($request->query);
    }
}