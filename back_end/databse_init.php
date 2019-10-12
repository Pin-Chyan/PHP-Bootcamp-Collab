<?php
$server_name = "http://10.123.6.9:1234/";
$conn = new mysqli($server_name,"root","password");

if ($conn->connect_error){
    echo "\nconnection fail\n";
}
else
    echo "\nsuccess\n";
?>