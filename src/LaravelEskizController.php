<?php

namespace Uzsoftic\LaravelEskiz;

use Uzsoftic\LaravelEskiz\Models\EskizConfig;
use Uzsoftic\LaravelEskiz\Models\EskizSms;
//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaravelEskizController
{
    public function dashboard(Request $request){
        $dashboard = (object)[
            'sms_count' => '0',
            'sms_count_daily' => '0',
            'sms_count_weekly' => '0',
            'sms_count_monthly' => '0',
            'eskiz_alpha_name' => 'ALPHA NAME',
        ];
        return view('vendor.laravel-eskiz.dashboard', compact('dashboard'));
    }

    public function listing(Request $request){
        $listing = EskizSms::query()->paginate(50);
        return view('vendor.laravel-eskiz.listing', compact('listing'));
    }

    public function config(Request $request){
        $config = EskizConfig::query()->first();
        return view('vendor.laravel-eskiz.config', compact('config'));
    }

    public function sender(Request $request){
        return view('vendor.laravel-eskiz.sender');
    }

}
