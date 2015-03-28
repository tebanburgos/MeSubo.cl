<?php
    include('conec.php');
    $valor = $_GET['codigo'];
    $sql2 = new conectarMySQL("localhost","mesubocl_gdmin","mesubo1152", "mesubocl_RECTEM");
    $sql2->conectar();
    $sql2->consultar("SELECT R.TXT_RECORRIDO, R.DES_RUTA_IDA, R.DES_RUTA_VUELTA, T.COD_TRANSPORTE FROM M_RECORRIDO R INNER JOIN M_TRANSPORTE T ON R.COD_TRANSPORTE = T.COD_TRANSPORTE WHERE R.COD_RECORRIDO = ".$valor);
    $row = $sql2->obtendatos();
    echo $row['COD_TRANSPORTE'].'|'.$row['TXT_RECORRIDO'].'|'.$row['DES_RUTA_IDA'].'|'.$row['DES_RUTA_VUELTA'];
    sleep(1);
    return $dat = $row['COD_TRANSPORTE'].'|'.$row['TXT_RECORRIDO'].'|'.$row['DES_RUTA_IDA'].'|'.$row['DES_RUTA_VUELTA'];
    $sql2->cerrarconexion();
    $sql2->limpiaconsulta();
?>