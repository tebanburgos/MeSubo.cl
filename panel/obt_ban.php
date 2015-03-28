<?php
    include('conec.php');
    $valor = $_GET['codigo'];
    $sql2 = new conectarMySQL("localhost","mesubocl_gdmin","mesubo1152", "mesubocl_RECTEM");
    $sql2->conectar();
    $sql2->consultar("SELECT N.TXT_BANNER, R.COD_TIPO_BANNER, N.URL FROM M_BANNER N INNER JOIN M_TIPO_BANNER R ON N.COD_TIPO_BANNER = R.COD_TIPO_BANNER WHERE N.COD_BANNER = ".$valor);
    $row = $sql2->obtendatos();
    echo $row['COD_TIPO_BANNER'].'|'.$row['TXT_BANNER'].'|'.$row['URL'];
    sleep(1);
    return $dat = $row['COD_TIPO_BANNER'].'|'.$row['TXT_BANNER'].'|'.$row['URL'];
    $sql2->cerrarconexion();
    $sql2->limpiaconsulta();
?>