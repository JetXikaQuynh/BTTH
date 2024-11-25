<?php

$filename = "KTPM2.csv";
$sinhvien = [];

if (!file_exists($filename)) {
    die("Không tìm thấy tệp CSV!");
}

if (($handle = fopen($filename, "r")) !== FALSE) {
    $line = fgets($handle);
    $bom = pack('CCC', 0xEF, 0xBB, 0xBF);
    if (strncmp($line, $bom, 3) === 0) {
        $line = substr($line, 3);
    }

    $headers = str_getcsv($line, ",");

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $sinhvien[] = array_combine($headers, $data);
    }
    fclose($handle);
}
