<?php
    date_default_timezone_set("Asia/Jakarta");
    // $host ="localhost";
    // $user ="root";
    // $pass = "";
    // $dbName = "karyasatria";

    // $konek = mysqli_connect($host,$user,$pass);
    // if(!$konek)
    //     die("Gagal koneksi...");

    // $hasil = mysqli_select_db($konek,$dbName);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "karyasatria";

// Create connection
$konek = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$konek) {
    die("Connection failed: " . mysqli_connect_error());
}
