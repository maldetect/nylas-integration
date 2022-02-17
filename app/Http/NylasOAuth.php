<?php

namespace App\Http;

use Nylas\Client;

class NylasOAuth
{
    public static function getNylasClient(): Client
    {
        $options = [
            'debug'            => env('NYLAS_DEBUG'),
            'region'           => env('NYLAS_REGION'),
            'log_file'         => dirname(__FILE__) . env('NYLAS_LOG_FILE'),
            'client_id'        => env('NYLAS_CLIENT_ID'),
            'client_secret'    => env('NYLAS_CLIENT_SECRET'),
            'access_token'     => env("NYLAS_ACCESS_TOKEN"),
        ];

        return new Client($options);
    }

    public static function getAuthorizationURL(): String
    {
        $params =
        [
            'state'         => env('NYLAS_STATE'),
            'login_hint'    => env('NYLAS_LOGIN_HINT'),
            'redirect_uri'  => env('NYLAS_CALLBACK_URL'),
            'scopes'        => env('NYLAS_SCOPES'),
            'client_id'     => env('NYLAS_CLIENT_ID'),
            'response_type' => env('NYLAS_RESPONSE_TYPE')
        ];

        return self::getNylasClient()
                    ->Authentication()
                    ->Hosted()
                    ->getOAuthAuthorizeUrl($params);
    }
}
