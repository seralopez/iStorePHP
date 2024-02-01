<?php

function obtenerContactos() {
     include './funciones/conexion.php';
     try {
          return $cnn->query("SELECT * FROM productos");
     } catch (Exception $e) {
          echo "Error!!" . $e->getMessage() . "<br>";
          return false;
     } finally {
          $cnn->close();
      }
}

function buscarMarcas(){
     include './funciones/conexion.php';
     try {
          return $cnn->query("SELECT DISTINCT SUBSTRING_INDEX(nombre, ' ', 1) AS marca
          FROM productos;");
     } catch(Exception $e) {
          echo "Error!!" . $e->getMessage() . "<br>";
          return false;
     } finally {
          $cnn->close();
      }
}

function buscarMarca($marca){
     include './funciones/conexion.php';
     try {
          return $cnn->query("SELECT DISTINCT SUBSTRING_INDEX(nombre, ' ', 1) AS marca
          FROM productos
          WHERE nombre LIKE '%{$marca}%';");
     } catch (Exception $e) {
          echo "Error!!" . $e->getMessage() . "<br>";
          return false;
     } finally {
          $cnn->close();
      }
}