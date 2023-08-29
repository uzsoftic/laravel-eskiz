<?php

namespace Uzsoftic\LaravelEskiz\Helper;

use Exception;
use Illuminate\Support\Str;
use Uzsoftic\LaravelEskiz\Traits\LaravelEskizTrait;

class Helper
{

    use LaravelEskizTrait;

    public function strLimit($string, $length = 200) :string
    {
        try {
            return (string) Str::limit($string, $length) ?? '';
        }catch (Exception $exception){
            return '';
        }
    }

}
