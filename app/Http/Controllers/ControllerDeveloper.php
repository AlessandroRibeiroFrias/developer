<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DeveloperService;
use App\Core\ResponseDefault;

class ControllerDeveloper extends Controller
{
    public function __construct(DeveloperService $s) 
    {
        parent::__construct($s);
    }

    public function update(Request $request, $id)
    {
        $request->idade = $this->service->setIdade($request);
        $r = $this->service->update($request, $id);
        return ResponseDefault::json($r);
	}

    public function store(Request $request)
    {
        $request->idade = $this->service->setIdade($request);
        $r = $this->service->store($request);
        return ResponseDefault::json($r);
	}

    
    
}
