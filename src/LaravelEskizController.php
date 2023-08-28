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
        if ($request->has('submit')){
            if(EskizConfig::query()->exists()){
                $eskiz = EskizConfig::first();
                $eskiz->server_host = $request->server_host;
                $eskiz->server_protocol = $request->server_protocol;
                $eskiz->alpha_name = $request->alpha_name;
                $eskiz->api_login = $request->api_login;
                $eskiz->api_password = $request->api_password;
                $eskiz->sms_email = $request->sms_email;
                $eskiz->sms_password = $request->sms_password;
            }else{
                $eskiz = new EskizConfig;
                $eskiz->server_host = $request->server_host;
                $eskiz->server_protocol = $request->server_protocol;
                $eskiz->alpha_name = $request->alpha_name;
                $eskiz->api_login = $request->api_login;
                $eskiz->api_password = $request->api_password;
                $eskiz->sms_email = $request->sms_email;
                $eskiz->sms_password = $request->sms_password;
            }
            if ($eskiz->save()){
                //dump('success');
            }else{
                //dump('error');
            }
        }

        $config = EskizConfig::query()->first();
        return view('vendor.laravel-eskiz.config', compact('config'));
    }

    public function sender(Request $request){
        if(EskizConfig::query()->exists()){

            return view('vendor.laravel-eskiz.sender');
        }else{
            return redirect()->route('eskizsms.config')->withError('Token not generated');
        }
    }

}
