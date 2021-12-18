<?php
session_start();
var_dump($_SESSION);
// echo count($_SESSION['arr']);
// $parkingLot = count($_SESSION['arr'])/2;
// echo "Session / 2 ==>" . $parkingLot;

if(isset($_SESSION['arr'])) {
    echo count($_SESSION['arr']);
}
?>