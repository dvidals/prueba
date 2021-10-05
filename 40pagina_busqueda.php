<style>
    table, th, tr, td{
        border: 2px solid #FF0000;
        margin:auto;
    }

    td {
        color:blue;
    }

</style>

<?php

$buscar=$_GET["buscar"];
require("40conexion.php");
$conexion=mysqli_connect($db_host, $db_usuario,$db_contra/*,$db_nombre*/);

if (mysqli_connect_errno()){ // se ejecuta esa función cuando no hay éxito en la conexión a la BD.

    echo "Fallo al conectar con la base de datos";
    exit();
}

mysqli_select_db($conexion,$db_nombre) or die("No se encuentr la BBDD");

mysqli_set_charset($conexion,"utf8");


$consulta="select * from cuadro where Npintor like '%$buscar%'";

$resultados=mysqli_query($conexion,$consulta);


$fila=mysqli_fetch_array($resultados);


echo "<table>";
echo"<tr><th>Ncuadro</th><th>Tecnica</th><th>NPintor</th><th>Npinacoteca</th></tr>";
foreach($resultados as $clave=> $fila){
    echo "<tr>";

    echo "<td>".$fila['Ncuadro']."</td>";
    echo "<td>".$fila['Tecnica']."</td>";
    echo "<td>".$fila['NPintor']."</td>";
    echo "<td>".$fila['NPinacoteca']."</td>";

    echo "</tr>";

}
echo "</table>";


mysqli_close($conexion);

?>