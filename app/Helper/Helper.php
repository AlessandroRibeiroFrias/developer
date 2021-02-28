<?php
namespace App\Helper;
use Illuminate\Support\Facades\Log;
use DateTime;

class Helper
{
    public static function calculaIdade($datanascimento){
        $datanascimento = new DateTime($datanascimento);
        return $datanascimento->diff(new Datetime(date('Y-m-d')));
    }
}