<?php

namespace Uzsoftic\LaravelEskiz;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Psr\Http\Message\ResponseInterface;
use Uzsoftic\LaravelEskiz\Models\EskizConfig;

class LaravelEskiz
{

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
