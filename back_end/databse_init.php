<?php
function init_server($server_name,$db,int $overwrite){
    echo "init ";
    $s01 = new mysqli($server_name,"server01","memes");
    echo "connected ";
    if ($overwrite == 1)
        mysqli_query($s01,"DROP DATABASE $db");
    mysqli_query($s01,"CREATE DATABASE $db");
}

function droptable($server_name,$db,$name){
    $database = mysqli_connect($server_name, "admin","admin",$db);
    if (mysqli_query($database, "DROP TABLE ".$name))
        return (1);
    else
        return (0);
}

function buildtable($server_name,$db,$name,$state){
    $database = mysqli_connect($server_name, "admin","admin",$db);
    if (mysqli_query($database, "CREATE TABLE $name $state"))
        return (1);
    else
        return (0);
}

function init_console($server_name,$db){
    $st = "(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,";
    $column = "product VARCHAR(30) NOT NULL,";
    $column2 = "price INT NOT NULL,";
    $end = "reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

    buildtable($server_name,$db,"consoles", $opp.$st.$column.$column2.$end);
 }

function console_opp($server_name,$db,$name,$price,int $mode){
    $database = mysqli_connect($server_name, "admin","admin",$db);
    if ($mode == 1){
        if (mysqli_query($database, "INSERT INTO consoles (product,price) VALUES ('$name','$price')"))
            return (1);
        else
            return (0);
    }
    if ($mode == 0){
        if (mysqli_query($database, "DELETE FROM consoles WHERE product='$name'"))
            return (1);
        else
            return (0);
    }
}
function get_html($server_name,$db){
    $database = mysqli_connect($server_name, "admin","admin",$db);
    $f = mysqli_query($database,"SELECT id, product, price FROM consoles");
    while ($res = mysqli_fetch_assoc($f))
        print_r($res);
}

droptable("localhost:2345","server01","consoles");
init_server("localhost:2345","server01",1);
init_console("localhost:2345","server01");
console_opp("localhost:2345","server01","xbox","4999",1);
console_opp("localhost:2345","server01","pc","14999",1);
console_opp("localhost:2345","server01","ps4","7999",1);
console_opp("localhost:2345","server01","psp","6999",1);
get_html("localhost:2345","server01");
console_opp("localhost:2345","server01","psp","6999",0);
console_opp("localhost:2345","server01","pc","14999",0);
console_opp("localhost:2345","server01","ps4","7999",0);
echo "\n\n\nafter deletion";
get_html("localhost:2345","server01");
?>