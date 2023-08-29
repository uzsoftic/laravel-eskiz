<?php

namespace Uzsoftic\LaravelEskiz\Traits;

use Uzsoftic\LaravelEskiz\Models\EskizConfig;

trait LaravelEskizTrait
{

    private function clearPhoneNumber($number): int
    {
        $clean = preg_replace('/\D/', '', $number);
        if(strlen($clean) == 9){
            $generated = '998'.$clean;
        }elseif(strlen($clean) == 12){
            $generated = $clean;
        }else{
            $generated = NULL;
        }
        return (int)$generated;
    }

    public function clearPhone($number, $type = 1) :string|null {
        $input = $this->clearPhoneNumber($number);
        if(isset($input) && $input != NULL){
            $back = $type == 1 ? '+' : '';
            $number = $back.substr($input, -12, -9)." (".substr($input, -9, -7).") ".substr($input, -7, -4)." ".substr($input, -4, -2)." ".substr($input, -2);
        }
        return $number;
    }

    private function getConfig(){
        return Cache::remember('laravel-eskiz-cache', now()->addDay(), function (){
            return EskizConfig::first();
        });
    }


}
