<?php
    include('conec.php');
    $valor = $_GET['codigo'];
    $sql2 = new conectarMySQL("localhost","mesubocl_gdmin","mesubo1152", "mesubocl_RECTEM");
    $sql2->conectar();
    $sql2->consultar("SELECT T.TXT_TRANSPORTE, T.COD_SERVICIO, T.COD_TIPO_TRANSPORTE, T.COD_NUM_LINEA FROM M_TRANSPORTE T WHERE T.COD_TRANSPORTE = ".$valor);
    $row = $sql2->obtendatos();
    echo $row['COD_TIPO_TRANSPORTE'].'|'.$row['COD_SERVICIO'].'|'.$row['COD_NUM_LINEA'].'|'.$row['TXT_TRANSPORTE'];
    sleep(1);
    return $dat = $row['COD_TIPO_TRANSPORTE'].'|'.$row['COD_SERVICIO'].'|'.$row['COD_NUM_LINEA'].'|'.$row['TXT_TRANSPORTE'];
    $sql2->cerrarconexion();
    $sql2->limpiaconsulta();
?>