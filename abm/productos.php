<?php

function xammp(){
    require "../env.php";
    $query_sql = "SELECT * FROM productos;";

    $cnn = mysqli_connect($hostname, $username, $pass, $dbName);
    $resultados = mysqli_query($cnn, $query_sql);
    return $resultados
}

function sqlite(){
    $bd = new SQLite3('iStore.db');
    $resultados = $bd->query('SELECT * FROM productos;');
    $bd->close();
    return $resultados
}
function selectAll(): array
{
    //$resultados = xammp();
    $resultados = sqlite();
    $data = [];

    while ($rows = mysqli_fetch_assoc($resultados)) {
        $data[] = $rows;
    }

    //$res_json = json_encode($data);
    return $data;
}

print_r( selectAll())