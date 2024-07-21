<?php

const API_URL = "https://whenisthenextmcufilm.com/api";

#Inicializar una nueva sesión de cURL; ch = cURL handle

$ch= curl_init(API_URL);

// Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Ejecutar la petició y guardamos el resultado */

$result = curl_exec($ch);

// una alternativa seria utilizar file_get_contents
// $result = file_get_contents(API_URL); si solo quieres hacer un GET de una aPI 

$data = json_decode($result, true);

curl_close($ch);
//var_dump($data);
?>

<head>
    <meta charset="UTF-8" />
    <title>La proxima pelicula de Marvel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"/>
</head>

<main>
      #<pre style="font-size: 12px; overflow:scroll; height:250px;"> codigo borrado para producción #
    #<?php var_dump($data)  ?> codigo borrado para producción #
    #</pre> codigo borrado para producción #
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de Marvel <?= $data["title"]; ?>"  >
    </section>

    <hgroup>
    <h2><?= $data["title"]; ?> Se estrena en <?= $data["days_until"]; ?></h2>
    <h2>Fecha de estreno <?= $data["release_date"]; ?></h2>
    <h2>La siguiente es <?= $data["following_production"]["title"]; ?></h2>
    </hgroup>
</main>

<style>
        :root {
            color-scheme: dark;
        }


        section {
        display:flex;
        justify-content: center;
        text-align: center;
        }

        hgroup {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        img {
            margin: 0 auto;
        }
        body {
            display: grid;
            place-content: center;
        }


</style>
