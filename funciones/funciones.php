<?php

function buscarMarcas(){
     include './funciones/conexion.php';
     try {
          $resultados =  $cnn->query("SELECT DISTINCT SUBSTRING_INDEX(nombre, ' ', 1) AS marca
                         FROM productos;");
          $cnn->close();
          return $resultados;
     } catch (Exception $e) {
          echo "Error!!" . $e->getMessage() . "<br>";
          return false;
      }
  }

  function buscarProductos(){
     include './funciones/conexion.php';
     try {
          $resultados =  $cnn->query("SELECT * FROM productos;");
          $cnn->close();
          return $resultados;
     } catch (Exception $e) {
          echo "Error!!" . $e->getMessage() . "<br>";
          return false;
      }
  }

function buscarMarca($marca){
     include './funciones/conexion.php';
     try {
         $resultados = $cnn->query("SELECT DISTINCT SUBSTRING_INDEX(nombre, ' ', 1) AS marca 
                         FROM productos WHERE nombre LIKE '%{$marca}%';");
         $cnn->close();
         return $resultados;
     } catch (Exception $e) {
         echo "Error!!" . $e->getMessage() . "<br>";
         return false;
     }
 }