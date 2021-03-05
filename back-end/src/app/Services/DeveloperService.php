<?php namespace App\Services;

use App\Repositories\DeveloperRepository;
use App\Core\ResponseDefault;
use Illuminate\Support\Facades\Validator;
use App\Helper\Helper;


class DeveloperService extends Service{

    public function __construct(DeveloperRepository $r) {
		parent::__construct($r);
	}

    public function setIdade($dados)
    {
        if(!$dados->idade){
            return Helper::calculaIdade($dados->datanascimento)->y;
        }

        return $dados->idade;
    }

}