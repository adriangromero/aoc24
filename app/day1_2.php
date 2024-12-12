<?php
$filename = __DIR__ . "/day1.txt";


if (file_exists($filename)) {
    $file = fopen($filename, "r");

    while (($line = fgets($file)) !== false) {
        $lista_numeros = array_map('intval', preg_split('/\s+/', trim($line)));

        $listaIzquierda[] = $lista_numeros[0];
        $listaDerecha[] = $lista_numeros[1];
    }

    $countListaDerecha = array_count_values($listaDerecha);

    for ($i = 0; $i < count($listaIzquierda); $i++){
        $total += $listaIzquierda[$i] * $countListaDerecha[$listaIzquierda[$i]];
    }

    print_r($total);
}