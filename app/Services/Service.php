<?php namespace App\Services;

use Illuminate\Support\Facades\Validator;
use App\Core\ResponseDefault;
use Illuminate\Support\Facades\Log;

class Service{

    protected $repository;

    public function __construct($r) 
    {
        $this->repository = $r;
	}

    public function index()
    {
        $retorno =  $this->repository->index();

        if(!$retorno)
        {
            return ResponseDefault::retorno([], 404);

        }

        return ResponseDefault::retorno($retorno, 200);
    }

    public function show($id)
    {
        $retorno =  $this->repository->show($id);
        if(!$retorno)
        {
            return ResponseDefault::retorno([], 404);
        }

        return ResponseDefault::retorno($retorno, 200);
    }

    public function update($dados, $id)
    {
        $dadosChange = $this->repository->show($id);
        
        if(!$dadosChange)
        {
            return ResponseDefault::retorno([], 404);
        }

        if($this->repository->getRules() && $this->repository->getMessage())
        {
            $validator = Validator::make($dados->all(), $this->repository->getRules(), $this->repository->getMessage());
    
            if ($validator->fails()) 
            {
                return ResponseDefault::retorno($validator->messages(), 422);
            }
        }
        

        $this->repository->update($dadosChange, $dados);

        return ResponseDefault::retorno([], 200);

    }

    public function destroy($id)
    {
        $dadosDestroy = $this->repository->show($id);
        
        if(!$dadosDestroy)
        {
            return ResponseDefault::retorno([], 404);
        }

        $this->repository->destroy($dadosDestroy, $id);

        return ResponseDefault::retorno([], 200);

    }

    public function store($dados)
    {
        if($this->repository->getRules() && $this->repository->getMessage())
        {
            $validator = Validator::make($dados->all(), $this->repository->getRules(), $this->repository->getMessage());

            if ($validator->fails()) 
            {
                return ResponseDefault::retorno($validator->messages(), 422);
            }
        }

        $this->repository->store($dados);

        return ResponseDefault::retorno(['Registro salvo com sucesso.'], 200);

    }

}