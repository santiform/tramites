<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Google\Client;
use App\Models\Venta;



class GoogleDriveAuthController extends Controller
{
    public function uploadPhoto(Request $request, $ventaId)
    {
        // Buscar la venta en la base de datos
        $venta = Venta::find($ventaId);

        // Verificar si se encontró la venta
        if (!$venta) {
            // Devolver una respuesta de error si no se encontró la venta
            return back()->with('error', 'La venta no fue encontrada.');
        }

        // Verificar si se ha enviado un archivo
        if ($request->hasFile('photo')) {
            // Obtener el archivo de la solicitud
            $file = $request->file('photo');

            // Subir la foto a Google Drive y obtener la URL de la foto
            $photoUrl = $this->uploadToGoogleDrive($file);

            dd($photoUrl);

            // Asociar la URL de la foto con la venta correspondiente
            $venta->dato1 = $photoUrl;
            $venta->save();

            // Devolver una respuesta de éxito
            return "FOTO SUBIDA CORRECTAMENTE";
        }

        // Devolver una respuesta de error si no se envió ningún archivo
        return back()->with('error', 'No se ha seleccionado ningún archivo.');
    }

    private function uploadToGoogleDrive($file)
    {
        // Configurar el cliente de Google
        $client = new Client();
        $client->setAuthConfig(storage_path('app/google/client_secret_1049060891734-0u1hugk9j4f3p96h530o6i490bc0eoer.apps.googleusercontent.com.json'));
        $client->setScopes(\Google_Service_Drive::DRIVE);
        $client->setAccessType('offline'); // Para obtener refresh token

        // Verificar si existe un token de acceso válido
        if (!$client->isAccessTokenExpired()) {
            // Subir la foto a Google Drive
            $photoUrl = $this->uploadFile($client, $file);
            return $photoUrl;
        } else {
            // Obtener un nuevo token de acceso utilizando el flujo de autorización de OAuth de Google
            $authUrl = $client->createAuthUrl(); // Obtener la URL de autorización de Google
            // Redirigir al usuario a la URL de autorización de Google para obtener un nuevo token de acceso
            return redirect()->away($authUrl);
        }
    }

    private function uploadFile($client, $file)
    {
        // Crear el servicio de Google Drive
        $service = new \Google\Service\Drive($client);

        // Subir la foto a Google Drive
        $fileMetadata = new \Google\Service\Drive\DriveFile([
            'name' => $file->getClientOriginalName(),
        ]);
        $content = file_get_contents($file->getRealPath());
        $file = $service->files->create($fileMetadata, [
            'data' => $content,
            'mimeType' => $file->getClientMimeType(),
            'uploadType' => 'multipart',
        ]);

        // Obtener la URL pública de la foto
        return $file->getWebViewLink();
    }
}