<?php
    //Mengakses file/dokumen di internet dengan alamat yang sudah ditentukan.
    $url = "http://localhost/praktikum_pwd/Praktikum%205/getdatamhs.php";
    //Menginisialisasi sesi baru dan menetapkan nilainya berupa $url.
    $client = curl_init($url);
    
    curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($client);
    $result = json_decode($response);
    foreach ($result as $r) {
        echo "<p>";
        echo "id : " . $r->id . "<br />";
        echo "Nama : " . $r->nama . "<br />";
        echo "jenis kel : " . $r->jkel . "<br />";
        echo "Alamat : " . $r->alamat . "<br />";
        echo "Tgl Lahir : " . $r->tgllhr . "<br />";
        echo "</p>";
    }