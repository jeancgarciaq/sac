<?php
//Esta linea se incluye cuando vamos a usar las clases
//require_once "autoload.php"

//Marca el in(icio de sesión
require "Scripts/session_start.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once "Inc/head.php"; ?>
  </head>
  <body>
  <section class="section">
    <div class="container">
      <?php

      //Vamos a evaluar que vista cargar
      if(!isset($_GET['views']) || $_GET['views'] == "") {
        $_GET['views'] = 'login';
      }

      //Comprobación de la vistas activas
      if(is_file("Views/".$_GET['views'].".php") && $_GET['views'] != 'login' && $_GET['views'] != '404'){

          include_once "Inc/navbar.php";
          include_once "Views/".$_GET['views'].".php";
          echo "</div>";
          echo "</section>";
          echo "<script src='Scripts/navbar.js'></script>";
      } else {
        if($_GET['views'] == 'login') {
          include "Views/login.php";
        }else {
          include "Views/404.php";
        }
      }
      ?>
  </body>
</html>
