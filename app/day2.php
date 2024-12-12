<?php
$filename = __DIR__ . "/day2.txt";

if (file_exists($filename)) {
    $file = fopen($filename, "r");
    $countSafe = 0;

    while (($line = fgets($file)) !== false) {
        $lista_numeros = array_map('intval', preg_split('/\s+/', trim($line)));

        $incrementa = false;
        $decrementa = false;
        $unsafe = false;
        $numero_anterior = null;

        foreach ($lista_numeros as $key => $numero) {
            if ($key > 0 && $numero_anterior !== null) {
                if ($numero_anterior > $numero) {
                    $decrementa = true;
                } elseif ($numero_anterior < $numero) {
                    $incrementa = true;
                }

                if (abs($numero_anterior - $numero) > 3 || abs($numero_anterior - $numero) == 0) {
                    $unsafe = true;
                }
            }

            $numero_anterior = $numero;
        }

        if ($decrementa && $incrementa) {
            $unsafe = true;
        }

        if (!$unsafe) {
            $countSafe++;
        }
    }

    fclose($file);
    echo "El total de reportes seguros: " . $countSafe;
} else {
    echo "El archivo no existe.\n";
}
?>