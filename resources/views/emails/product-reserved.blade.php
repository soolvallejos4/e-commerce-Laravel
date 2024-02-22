<?php
/** @var \App\Models\Product $product */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Producto Reservado</title>
</head>
<body>
    <h1>¡Reserva realizada con éxito!</h1>
    <x-product-data :product="$product"> </x-product-data>
    <p>La reserva de tu productoha sido realizada con éxito</p>
    <p>Saludos, <br>
    YoLife</p>
</body>
</html>