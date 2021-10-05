####################### MATRIZ_DNI.PHP #######################

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Introduce DNI</title>
</head>
<body>
<h1> Exercicio 1 </h1>
<h4><b>
        Introduce un número, separado por comas o dos valores mayores que 0.
        <br>Posibles entradas correctas que no devuelven error: "1","1,2","2, 3" <br>
</h4>
<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

    <blockquote>
        <div>Tamaño: <input type="text" name="fila" placeholder="8"></div><br>
        <div><input type="submit" value="Crear"></div></b>
</form>
</body>
</html>

<?php
//include "funciones.php" ;
define('SIZE', 8); // Definimos una constante


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $entrada=$_POST['fila'];
    if ( ($pos=strpos($entrada,",")) !== FALSE) {
        $desglosar = explode(",",$entrada);
        $numfila=$desglosar[0];
        $numcolumna=$desglosar[1];
    }else{
        $numfila=$entrada;
        $numcolumna=$entrada;
    }
    if ($numfila==null){
        $numfila=SIZE;
        $numcolumna=SIZE;
    }
    if(!is_numeric($numfila)||!is_numeric($numcolumna)||($numfila<=0)||(($numcolumna<=0))) exit('Debe introducir algún número correcto.');

    $listado=array();

    $listado=crearArray($numfila,$numcolumna);

    visualizar($listado,$numfila,$numcolumna);

    $listado2=checkArray($listado,$numfila,$numcolumna);

    visualizar($listado2,$numfila,$numcolumna);

}
?>







<?php

// ####################### FUNCIONES.PHP #######################

//Función para construir un DNI Válido, pimero los números y luego la letra
function crearDNI(){
    $resultado="";
    for ($i=0; $i < 8; $i++) {
        $numeroAleatorio=mt_rand(0,9);
        $resultado=$resultado.$numeroAleatorio;
    }
    $letraFuncion=substr("TRWAGMYFPDXBNJZSQVHLCKE", $resultado % 23, 1);
    $resultado=$resultado.$letraFuncion;
    return $resultado;
}
/**
 * Función que crea un array de $num_rows filas x $num_colums columnas
 * con números de DNI
 */
function crearArray($num_rows, $num_colums){
    for ($i = 0; $i < $num_rows; $i++) {
        for ($j = 0; $j < $num_colums; $j++) {
            $array[$i][$j] = crearDNI();
        }
    }
    return $array;
}
// Función para localizar el digito mayor y crear un DNI con ese número
//asignándole la letra correspondiente
function dniMayor($dni){
    $parteNumerica=substr($dni,0,8);
    $max=-1; //Inicializamos en número que es mas bajo que los que tienen el DNI
    //Localizamos el número mayor del DNI
    for ($i=0; $i <8 ; $i++) {
        if ($max>$parteNumerica[$i]) {
            $max=$max;
        }else{
            $max=$parteNumerica[$i];
        }
    }
    //Rellanamos todos los números por el valor máximo
    for ($j=0; $j <8 ; $j++) {
        $parteNumerica[$j]=$max;
    }
    $relacion="TRWAGMYFPDXBNJZSQVHLCKE";
    $posicion=$parteNumerica % 23;
    $letraFuncion=substr($relacion,$posicion,1);
    $final=$parteNumerica.$letraFuncion;
    return $final;

}
//Función para visualizar un Array
function visualizar($array,$fila,$columna){
    echo "<br><table  text-align: center cellpadding=1 cellspacing:0>";
    for ($i=0; $i <$fila ; $i++) {
        echo "<tr text-align: center>";
        for($j=0; $j<$columna; $j++) {
            echo "<td text-align: center>". $array[$i][$j]." </td>";
        }
        echo "</tr>";
    }
    echo "</table> <br>";
}
// Función para recorrer un array y llamar a la función dniMayor en caso necesario
function checkArray($array,$numfila,$numcolumna){
    $salida=array();
    for ($i = 0; $i < $numfila; $i++) {
        for ($j = 0; $j < $numcolumna; $j++) {
            $dni2=$array[$i][$j];
            $letra=substr($dni2,-1);
            if (($letra=="A")||($letra=="E")) {
                $salida[$i][$j]= "<b>".dniMayor($array[$i][$j])."</b>";
            }else{
                $salida[$i][$j]= $array[$i][$j];
            }
        }
    }
    return $salida;
}

?>