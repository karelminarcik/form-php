<?php

$connection = mysqli_connect("127.0.0.1", "root", "", "firm");

if (mysqli_connect_error()){
    echo mysqli_connect_error();
    exit;
}

