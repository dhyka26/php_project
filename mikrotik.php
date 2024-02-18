<?php
$host = "localhost";
$user = "root";
$pass = "";
$nama_db = "db_office"; //nama database
$mysqli = new mysqli("$host", "$user", "$pass", "$nama_db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

require('routeros_api.php');
require('config.php');
$user_mikrotik = "dhyka26";
$pass_mikrotik = "ma5f7n4h12";
$toko = 'TXXX';
$host = '10.10.10.1';
$API = new RouterosAPI();
$API->debug = false;
if ($API->connect($host, $user_mikrotik, $pass_mikrotik)) {
    echo $toko . "-" . $host . "\n";
    //interface
    $API->write('/interface/getall');
    $READ = $API->read(false);
    $respone = $API->parseResponse($READ);
    $jml = count($respone);
    if ($jml > 0) {
        $hasil = tampil($respone);
        $hasil = trim(implode('', $hasil));
        $data = 'interface';
        $query = "INSERT INTO mikrotik(`kdtk`,`data`,`count`,`hasil`) VALUES ('$toko','$data','$jml','" . $hasil . "')";
        $mysqli->query($query);
        if ($mysqli) {
            echo "Insert to database $data \n";
        }else{
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }
    }
    //ipaddress
    $API->write('/ip/address/getall');
    $READ = $API->read(false);
    $respone = $API->parseResponse($READ);
    $jml = count($respone);
    if ($jml > 0) {
        $hasil = tampil($respone);
        $data = 'ipaddress';
        $hasil = trim(implode('', $hasil));
        $query = "INSERT INTO mikrotik(`kdtk`,`data`,`count`,`hasil`) VALUES ('$toko','$data','$jml','" . $hasil . "')";
        $mysqli->query($query);
        if ($mysqli) {
            echo "Insert to database $data \n";
        }else{
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }
    }
    //iproute
    $API->write('/ip/route/getall');
    $READ = $API->read(false);
    $respone = $API->parseResponse($READ);
    $jml = count($respone);
    if ($jml > 0) {
        $hasil = tampil($respone);
        $data = 'iproute';
        $hasil = trim(implode('', $hasil));
        $query = "INSERT INTO mikrotik(`kdtk`,`data`,`count`,`hasil`) VALUES ('$toko','$data','$jml','" . $hasil . "')";
        $mysqli->query($query);
        if ($mysqli) {
            echo "Insert to database $data \n";
        }else{
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }
    }
    //ipservice
    $API->write('/ip/service/getall');
    $READ = $API->read(false);
    $respone = $API->parseResponse($READ);
    $jml = count($respone);
    if ($jml > 0) {
        $hasil = tampil($respone);
        $data = 'ipservice';
        $hasil = trim(implode('', $hasil));
        $query = "INSERT INTO mikrotik(`kdtk`,`data`,`count`,`hasil`) VALUES ('$toko','$data','$jml','" . $hasil . "')";
        $mysqli->query($query);
        if ($mysqli) {
            echo "Insert to database $data \n";
        }else{
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }
    }
    //user
    $API->write('/user/getall');
    $READ = $API->read(false);
    $respone = $API->parseResponse($READ);
    $jml = count($respone);
    if ($jml > 0) {
        $hasil = tampil($respone);
        $data = 'user';
        $hasil = trim(implode('', $hasil));
        $query = "INSERT INTO mikrotik(`kdtk`,`data`,`count`,`hasil`) VALUES ('$toko','$data','$jml','" . $hasil . "')";
        $mysqli->query($query);
        if ($mysqli) {
            echo "Insert to database $data \n";
        }else{
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }
    }
    //system-resource
    $API->write('/system/resource/getall');
    $READ = $API->read(false);
    $respone = $API->parseResponse($READ);
    $jml = count($respone);
    if ($jml > 0) {
        $hasil = tampil($respone);
        $data = 'system-resource';
        $hasil = trim(implode('', $hasil));
        $query = "INSERT INTO mikrotik(`kdtk`,`data`,`count`,`hasil`) VALUES ('$toko','$data','$jml','" . $hasil . "')";
        $mysqli->query($query);
        if ($mysqli) {
            echo "Insert to database $data \n";
        }else{
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }
    }
}
$mysqli->close();
$API->disconnect();
