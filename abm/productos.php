<?php

function xammp(){
    require "../env.php";
    $query_sql = "SELECT * FROM productos;";

    $cnn = mysqli_connect($hostname, $username, $pass, $dbName);
    $resultados = mysqli_query($cnn, $query_sql);
    return $resultados;
}

function selectAll(): array
{
    $resultados = xammp();
    $data = [];

    while ($rows = mysqli_fetch_assoc($resultados)) {
        $data[] = $rows;
    }

    $res_json = json_encode($data);
    return $res_json;
}

print_r( selectAll());