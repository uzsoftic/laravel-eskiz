<?php

namespace Uzsoftic\LaravelEskiz;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Psr\Http\Message\ResponseInterface;
use Uzsoftic\LaravelEskiz\Models\EskizConfig;
use Uzsoftic\LaravelEskiz\Traits\LaravelEskizTrait;

class LaravelEskiz
{

    use LaravelEskizTrait;

    /**
     * Send request to intend API
     *
     * @param string $method , POST/GET
     * @param string $url , Method url
     * @param array $data
     * @param array $header
     *
     * @return Application|ResponseFactory|\Illuminate\Foundation\Application|Response Array Response
     * @throws Exception
     */
    private function sendRequest(string $method, string $url, array $data = [], $header = []): Application|ResponseFactory|\Illuminate\Foundation\Application|Response
    {
        try {
            $client = new Client([
                'base_uri' => $this->getConfig()->server_protocol.$this->getConfig()->server_host,
                'exceptions' => false
            ]);

            $request_headers = [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'api-key' => $this->getConfig()->token,
            ];

            /*if ($auth_token)
                $request_headers['Authorization'] = "Bearer " . $auth_token;
            else
                $request_headers['Authorization'] = "Bearer " . $this->token;*/

            $data = $client->request($method, $url,
                [
                    'headers' => $request_headers,
                    'body' => json_encode($data)
                ]
            );
            return $this->getResponse(true, (array)$data->getBody()->getContents(), "Success");
        } catch (ClientException $e) {
            return $this->getResponse(false, $e->getResponse()->getBody()->getContents(), $e->getResponse());
        }
    }

    private function getResponse(bool $status, object|array $data, string $message = ""){
        dd($data);
        return response([
            'status' => $status,
            'data' => $data,
            'message' => $message,
        ]);
    }

    protected function getToken(){
        $api_login = config('sms.eskiz.settings.api_login');
        $api_password = config('sms.eskiz.settings.api_password');

        $client = new Client(
            [
                'base_uri' => config('sms.eskiz.methods.base_uri')
            ], true
        );

        $options = [
            'multipart' => [
                [
                    'name' => 'email',
                    'contents' => md5($api_login)
                ],
                [
                    'name' => 'password',
                    'contents' => md5($api_password)
                ]
            ]
        ];

        $response = $client->post(config('sms.eskiz.methods.auth_uri'), $options);
        return $response->getBody()->getContents();
    }

    protected function callback(Request $request){

    }

    public function updateToken(){

    }

    public function deleteToken(){

    }

    public function getUserDetails(){

    }

    public function createContact(){

    }

    public function updateContact(){

    }

    public function getContact(){

    }

    public function allContact(){

    }

    public function deleteContact(){

    }

    public function createTemplate(){

    }

    public function updateTemplate(){

    }

    public function allTemplate(){

    }

    public function deleteTemplate(){

    }

    public function sendSms(int $number, string $message){
        $form = [
            'mobile_phone' => $number,
            'message' => $message,
            'from' => $this->getConfig()->alpha_name ?? config('laravel-eskiz.default_sender'),
            'callback_url' => route(config('laravel-eskiz.callback_url')),
        ];
        $response = $this->sendRequest('POST', '/message/sms/send', $form);
        return $this->getResponse(true, $response);
    }

    public function sendSmsGlobal(int $number, string $message, string $country_code){
        $form = [
            'mobile_phone' => $number,
            'message' => $message,
            'country_code' => $country_code,
            'from' => $this->getConfig()->alpha_name ?? config('laravel-eskiz.default_sender'),
            'callback_url' => route(config('laravel-eskiz.callback_url')),
            'unicode' => '0'
        ];
        $response = $this->sendRequest('POST', '/message/sms/send-global', $form);
        dd($response);
    }

    public function sendSmsBatch(){

    }

    public function getDispatchStatus(){

    }

    public function getNick(){

    }

    public function totalSms(){

    }

    public function getLimit(){

    }


}
