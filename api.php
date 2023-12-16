<?php

$urlAPI = "https://api.worldbank.org/pip/v1/pip?country=PER&year=all";

$ch = curl_init($urlAPI);


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

if (curl_errno($ch)) {
    die('Error ' . curl_errno($ch));
}

$response = curl_exec($ch);
$responseComprimida = gzdecode($response);
$data = json_decode($responseComprimida);


$array_headcount = array(); // Respuesta a devolver

//
function generarData($arr) {
    for ($i=0; $i < count($arr); $i++) { 
        yield round($arr[$i]->headcount * 100);
    }
}
foreach(generarData($data) as $val) {
    array_push($array_headcount, $val);
}


function searchTrendData ($arr) {
    $datos = array_map('intval', $arr);
    $frecuencias = array_count_values($datos);
    $moda = array_search(max($frecuencias), $frecuencias);
    return $moda;
}

$trend_data = searchTrendData($array_headcount); // tendendia moda

curl_close($ch);

?>
