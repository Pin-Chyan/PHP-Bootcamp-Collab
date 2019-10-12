<?php
$server_name = "10.213.6.9:3306";
$s69 = new mysqli($server_name,"admin","admin");

if (!$s69) {
    die("Connection failed: ");
} 
echo "Connected successfully";

if (mysqli_query($s69 ,"CREATE DATABASE d1")){
     echo "\n build successful \n";
}
 else
     echo "\n error \n";
// $table_in = "CREATE TABLE users";
// $st_f ="id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY";
// $firstname =",firstname VARCHAR(30) NOT NULL";
// $email = ",email VARCHER(30)";
// $end_f = ",reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
// if (mysqli_query($s69,$table_in.$st_f.$firstname.$email.$end_f)){
//     echo "\ntable success\n";
// }
// else
//     mysqli_query($s69)
?>