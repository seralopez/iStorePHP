<?php



function selectAll(): array
{
    require "../env.php";
    $query_sql = "SELECT * FROM productos;";

    $cnn = mysqli_connect($hostname, $username, $pass, $dbName);
    $resultados = mysqli_query($cnn, $query_sql);

    $data = [];

    while ($rows = mysqli_fetch_assoc($resultados)) {
        $data[] = $rows;
    }

    //$res_json = json_encode($data);
    return $data;
}
