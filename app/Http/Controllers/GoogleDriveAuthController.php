<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Google\Client;

class GoogleDriveAuthController extends Controller
{
    public function redirectToGoogle()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/google/client_secret_1049060891734-0u1hugk9j4f3p96h530o6i490bc0eoer.apps.googleusercontent.com.json'));
        $client->setAccessType('offline');
        $client->setRedirectUri(route('google.callback'));
        $client->addScope(\Google_Service_Drive::DRIVE);

        return redirect()->to($client->createAuthUrl());
    }

    public function handleCallback(Request $request)
{
    $client = new \Google\Client();
    $client->setAuthConfig(storage_path('app/google/client_secret_1049060891734-0u1hugk9j4f3p96h530o6i490bc0eoer.apps.googleusercontent.com.json'));
    $client->setRedirectUri(route('google.callback'));

    if ($request->has('code')) {
        // Obtener el código de autorización de la solicitud HTTP
        $authorizationCode = $request->query('code');

        // Utilizar el código de autorización para obtener un token de acceso
        $accessToken = $client->fetchAccessTokenWithAuthCode($authorizationCode);

        // Verificar si se recibió un token de acceso válido
        if (isset($accessToken['access_token'])) {
            // Verifica si existe el refresh_token en la respuesta
            if (isset($accessToken['refresh_token'])) {
                $refreshToken = $accessToken['refresh_token'];
                // Guarda $refreshToken de manera segura en tu base de datos

                // Después de obtener el refreshToken, puedes redirigir a donde quieras
                return redirect()->route('home');
            } else {
                // Manejar el caso donde no se proporcionó el refresh token
                // Por ejemplo, podrías lanzar un error, redirigir a una página de error, o manejarlo de otra manera apropiada para tu aplicación.
                return "no anda";
            }
        } else {
            // Manejar el caso donde no se recibió un token de acceso válido
            // Por ejemplo, mostrar un mensaje de error al usuario o redirigirlo a una página de error
            return "Error al obtener el token de acceso";
        }
    } else {
        // Manejar error de autorización
        return "Error: No se recibió el código de autorización";
    }
}

}
