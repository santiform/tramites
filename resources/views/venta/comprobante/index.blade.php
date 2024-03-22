<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Comprobante de Pago</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
    }

    .container {
        max-width: 310px;
        margin: 20px auto;
        margin-bottom: 1rem;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 19px -1px rgba(0, 0, 0, 0.3);
        position: relative;
        background-color: #e4e4e4;

    }
    .container2 {
        max-width: 300px;
        margin: 25px auto;
        margin-bottom: 1rem;
        padding: 20px;
        border-radius: 10px;
        position: relative;
        text-align: center;

    }

    h1, h2 {
        text-align: center;
        color: #333;
        font-size: 29px;
    }
    p {
        color: #555;
        font-size: 19px;
        text-align: center;
    }
    .id_tramite {
    	font-size: 80px;
    	font-weight: 700;
    	text-align: center;
    	margin-top: 0.7rem;
    	color: #128c7e;
    }
    .maxikiosko{
    	color: #128c7e;
    	font-size: 29px;
    	margin-bottom: -1.1rem;
    	margin-top: 0.3rem;
    }
    .barcode {
        text-align: center;
        margin-top: 20px;
    }
</style>
</head>
<body>
<div class="container">
    <h1 class="maxikiosko">Maxikiosko Cristianía</h1>
    <h1>Solicitud de Compra</h1>
    <hr style="width: 110%; margin-left: -1.25rem;" >
    <p><strong>Tipo de Trámite:</strong> {{$tipoDeTramite}}</p>
    <p><strong>Total a abonar:</strong> ${{$venta->precio_venta}}</p>
    <div class="barcode">
        <img src="https://192.168.0.100/tramites/resources/img/qr.png" height="220px" alt="QR">
    </div>


    <div class="id_tramite" >{{$id}}</div>

</div>

<div class="container2">
Con este cupón de pago, podés acercarte al kiosko y abonar el trámite.

</body>
</html>
