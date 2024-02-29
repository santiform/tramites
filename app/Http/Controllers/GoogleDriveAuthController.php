<?php

namespace App\Http\Controllers;

use Google\Client;

class GoogleDriveAuthController extends Controller
{
    public function redirectToGoogle()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/google/client_secret_1049060891734-1brkokrb32hubf1d2d0fsnj44rmqhd5p.apps.googleusercontent.com.json'));
        $client->setAccessType('offline');
        $client->setRedirectUri(route('google.callback'));
        $client->addScope(\Google_Service_Drive::DRIVE);

        return redirect()->to($client->createAuthUrl());
    }

    public function handleCallback()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/google/client_secret_1049060891734-1brkokrb32hubf1d2d0fsnj44rmqhd5p.apps.googleusercontent.com.json'));
        $client->setRedirectUri(route('google.callback'));

        if (request()->has('code')) {
            $accessToken = $client->fetchAccessTokenWithAuthCode(request('code'));

            // Aquí puedes guardar el refreshToken en tu base de datos
            $refreshToken = $accessToken['refresh_token'];
            // Guarda $refreshToken de manera segura en tu base de datos

            // Después de obtener el refreshToken, puedes redirigir a donde quieras
            return redirect()->route('home');
        } else {
            // Manejar error de autorización
        }
    }
}
