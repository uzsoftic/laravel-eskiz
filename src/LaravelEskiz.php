<?php

namespace Uzsoftic\LaravelEskiz;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Cache;
use Psr\Http\Message\ResponseInterface;
use Uzsoftic\LaravelEskiz\Models\EskizConfig;

class LaravelEskiz
{

    /**
     * Send request to intend API
     *
     * @param string $method , POST/Get
     * @param string $url , Method url
     * @param array $data
     * @param null $auth_token , Need for intend member request
     *
     * @return ResponseInterface JSON Response
     * @throws Exception
     */
    private function sendRequest(string $method, string $url, array $data = [], $header = []): ResponseInterface
    {
        try {
            $client = new Client([
                'base_uri' => $this->getConfig()->protocol.$this->getConfig()->host,
                'exceptions' => false
            ]);

            $request_headers = [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'api-key' => $this->token,
                'Accept-Language' => $this->lang
            ];

            if ($auth_token)
                $request_headers['Authorization'] = "Bearer " . $auth_token;
            else
                $request_headers['Authorization'] = "Bearer " . $this->token;

            return $client->request($method, $url,
                [
                    'headers' => $request_headers,
                    'body' => json_encode($data)
                ]
            );
        } catch (ClientException $e) {
            $this->getResponse(false, [], $e->getResponse());
        }
    }

    private function getResponse(bool $status, array $data, string $message = ""){
        return response([
            'status' => $status,
            'data' => $data,
            'message' => $message,
        ]);
    }

    private function getConfig(){
        return Cache::remember('laravel-eskiz-cache', now()->addDay(), function (){
            return EskizConfig::first();
        });
    }

    protected function generateToken(){
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

    protected function updateToken(){

    }


}
