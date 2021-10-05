<?php

$alimentos=array("fruta"=>array("tropical"=>"kiwi","cítrico"=>"mandarina"),"leche"=>array("animal"=>"vaca","vegetal"=>"coco"));

foreach($alimentos as $clave=>$valor){
    echo "El contenido de $clave es: <br/>";
        foreach($valor as $clave2=>$valor2){
            echo "$clave2 = $valor2 <br/>";
        }
        echo"<br/>";
}



?>