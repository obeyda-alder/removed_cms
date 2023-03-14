<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Auth\AuthenticationException;

trait HttpRequests
{

    protected static $ApiBaseUrl = 'http://127.0.0.1:8000/api/'; // for test..

    protected static function bootHttpRequests()
    {
        static::$ApiBaseUrl = config('custom.ApiBaseUrl');
    }
    public function get($url, $data = null)
    {
        try {
            $response = Http::get(config('custom.ApiBaseUrl') . $url, $data);
        } catch (\Exception $e) {
            info($e->getMessage());
            abort(503);
        }

        if ( $response->status() == 401) {
            throw new AuthenticationException();
        } else if (! $response->successful()) {
           abort(503);
        }

        return $response->json();
    }
    public function post($url, $data = [])
    {
        $token = session()->get('api_token');
        try {
            $response = Http::acceptJson()->withToken($token)->post(config('custom.ApiBaseUrl') . $url, $data);
        } catch (\Exception $e) {
            abort(503);
        }

        if ($response->status() == 401 && !request()->routeIs('login')) {
            throw new AuthenticationException();
        }
        if($response->status()){
            return json_decode($response->body(), true);
        }
    }
}
