<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $table = 'developer';

    protected $rules = [
		'nome' => 'required',
		'datanascimento' => 'required'
	];

	protected $messages = [
	    'nome.required' => 'Nome é obrigatório',
	    'datanascimento.required' => 'Data de nascimento é obrigatório'
    ];

    public function getRules()
    {

        return $this->rules;

    }

    public function getMessage()
    {

        return $this->messages;
        
    }
}
