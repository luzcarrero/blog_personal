<?php

session_start();

    if(!isset($_SESSION['id']) && empty($_SESSION['id'])){
    header("location: acceso.php");
    }
