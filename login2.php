<?php


$el_usuario=isset($_GET['usuario']) ? $_GET['usuario'] : $_POST['usuario'];

$el_array = new stdClass();

if ($el_usuario=="Juan") {

    $el_array->Nombre = "Juan";
    $el_array->Apellido = "Gómez";
    $el_array->Edad = "18";
    $json = json_encode($el_array);
    echo $json;


}else if ($el_usuario=="Maria") {

    $el_array->Nombre = "Maria";
    $el_array->Apellido = "Pérez";
    $el_array->Edad = "28";
    $json = json_encode($el_array);
    echo $json;

}else if ($el_usuario=="David") {

    $el_array->Nombre = "David";
    $el_array->Apellido = "Vidal";
    $el_array->Edad = "38";
    $json = json_encode($el_array);
    echo $json;

} else if(!empty($el_usuario)){
    $el_array->Nombre = "";
    $el_array->Mensaje = "El usuario no existe en la base de datos";
    $json = json_encode($el_array);
    echo $json;
}else{
    $el_array->Nombre = "";
    $el_array->Mensaje = "El cuadro de texto no puede quedar vacío. Por favor, introduzca el usuario que desea buscar.";
    $json = json_encode($el_array);
    echo $json;
}

?>