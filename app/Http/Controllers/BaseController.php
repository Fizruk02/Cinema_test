<?php

namespace App\Http\Controllers;

use App\Services\Film\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
