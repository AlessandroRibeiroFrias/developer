<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DeveloperService;
use Response;

class ControllerDeveloper extends Controller
{
    public function __construct(DeveloperService $s) 
    {
        parent::__construct($s);
    }
    
}
