<?php
$server_name = "10.213.6.9:3306";
$s69 = new mysqli($server_name,"admin","admin");

if (mysqli_query($s69,"DROP DATABASE d1")){
    echo "\n Drop successfull\n";
}
else
    echo "Drop unsuccessful";
?>