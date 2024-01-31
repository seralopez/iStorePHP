<?php

function obtenerContactos() {
     include './funciones/conexion.php';
     try{
          return $cnn->query("SELECT * FROM productos");
     } catch(Exception $e) {
          echo "Error!!" . $e->getMessage() . "<br>";
          return false;
     }
}