<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            [
                'nome' => 'José Henrique da Silva'
                , 'sexo' => 'M'
                , 'idade' => 28
                , 'hobby' => 'Jogador de xadrez'
                , 'datanascimento' => Carbon::create('1993','01','13')
                , 'created_at' => Carbon::create('2021','02','03')
                , 'updated_at' => Carbon::create('2021','02','03')
            ]
            , [
                'nome' => 'Mario de Andrade Souza'
                , 'sexo' => 'M'
                , 'idade' => 27
                , 'hobby' => 'Piloto de Kart'
                , 'datanascimento' => Carbon::create('1993','06','17')
                , 'created_at' => Carbon::create('2021','02','03')
                , 'updated_at' => Carbon::create('2021','02','03')
            ]
        ];

        DB::table('developer')->insert($dados);
    }
}
