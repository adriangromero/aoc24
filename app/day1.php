<?php
$filename = __DIR__ . "/day1.txt";

if (file_exists($filename)) {
    $file = fopen($filename, "r");

    $listaIzquierda = [];
    $listaDerecha = [];

    while (($line = fgets($file)) !== false) {
        $lista_numeros = array_map('intval', preg_split('/\s+/', trim($line)));
        $listaIzquierda[] = $lista_numeros[0];
        $listaDerecha[] = $lista_numeros[1];
    }

    fclose($file);

    sort($listaIzquierda);
    sort($listaDerecha);

    $totalSum = 0;

    for ($i = 0; $i < count($listaIzquierda); $i++) {
        $totalSum += abs($listaDerecha[$i] - $listaIzquierda[$i]);
    }

    echo $totalSum;
} else {
    echo "El archivo no existe.\n";
}
?>