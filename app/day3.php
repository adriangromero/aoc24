<?php
$filename = __DIR__ . "/day3.txt";

if (file_exists($filename)) {
    $file = fopen($filename, "r");
    $totalSum = 0;

    while (($text = fgets($file)) !== false) {
        $pattern = "/mul\((\d+),(\d+)\)/";

        preg_match_all($pattern, $text, $matches);

        // $matches[1] contiene los primeros números y $matches[2] los segundos números
        foreach ($matches[1] as $index => $match) {
            $totalSum += $match * $matches[2][$index];
        }
    }

    fclose($file);
    echo "El total de la multiplicación: " . $totalSum;
} else {
    echo "El archivo no existe.\n";
}
?>