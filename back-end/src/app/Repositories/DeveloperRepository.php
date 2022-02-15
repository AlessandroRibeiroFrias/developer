<?php namespace App\Repositories;

use App\Models\Developer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class DeveloperRepository {

   private $developer;

   public function __construct()
   {
        $this->developer = new Developer();
   }

   public function getRules()
   {
        return $this->developer->getRules();
   }

   public function getMessage()
   {  
       return $this->developer->getMessage();
   }

   public function index()
   {
        return Developer::all();
   }

   public function show($id_developer)
   {
        return Developer::find($id_developer);
   }

   public function update($developerChange, $dados)
   {
        $developerChange->nome = $dados->nome;
        $developerChange->sexo = $dados->sexo;
        $developerChange->idade = $dados->idade;
        $developerChange->hobby = $dados->hobby;
        $developerChange->datanascimento = $dados->datanascimento;
        return $developerChange->save();
   }

     public function destroy($developerDelete, $id)
     {
          return $developerDelete->delete($id);
     }

   public function atualizacao($dados)
   {
        $this->developer->nome = $dados->nome;
        $this->developer->sexo = $dados->sexo;
        $this->developer->idade = $dados->idade;
        $this->developer->hobby = $dados->hobby;
        $this->developer->datanascimento = $dados->datanascimento;
        //comentario

        $codigoo = 'teste';
        return $this->developer->save();
   }
}