<?php
    include('conec.php');
    $valor = $_GET['codigo'];
    $sql2 = new conectarMySQL("localhost","mesubocl_gdmin","mesubo1152", "mesubocl_RECTEM");
    $sql2->conectar();
    $sql2->consultar("SELECT N.TXT_NEGOCIO, N.URL, N.UBICACION FROM M_NEGOCIO N WHERE N.COD_NEGOCIO = ".$valor);
    $row = $sql2->obtendatos();
    echo $row['TXT_NEGOCIO'].'|'.$row['URL'].'|'.$row['UBICACION'];
    sleep(1);
    return $dat = $row['TXT_NEGOCIO'].'|'.$row['URL'].'|'.$row['UBICACION'];
    $sql2->cerrarconexion();
    $sql2->limpiaconsulta();
?>