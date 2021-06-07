<?php


$con = mysqli_connect('localhost', 'root', '', 'dynamic_menu');

if(mysqli_connect_error()){

    echo 'Failed to connect '.mysqli_connect_error();
}

?>