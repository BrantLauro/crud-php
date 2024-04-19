<?php

session_start();

if(@$_SESSION['autenticado'] != true) {
    header("location: index.php");
    exit();
}
