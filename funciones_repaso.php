<?php

function tabla_multiplicar(){
    for($i=1;$i<=10;$i++){

        echo "<hr>";
        echo "Tabla del $i:<br/>";
        for($j=0;$j<=10;$j++){

            echo "$i x $j=".$i*$j."<br/>";

        }
        echo "<hr>";
    }
}
function tabla_del_n($n){
    echo"<hr>Tabla del $n:<br/>";
    for ($i=0;$i<=10;$i++){
        echo "$n x $i=".$n*$i."<br/>";
    }
}

function del_reves($sentencia){
    $reves="";
   for ($i=1;$i<=strlen($sentencia);$i++){
       $reves=$reves.$sentencia[strlen($sentencia)-$i];

   }
   print_r($reves);
}

function primos($n){
    $a=array();
    $b=true;
    for ($i=2;$i<$n;$i++){
        for ($j=2;$j<$i;$j++){
            if ($i%$j<>0);
            else $b=false;

        }
        if ($b) $a[]=$i;
        $b=true;
    }
    $c=implode(", ",$a);
    return $c."<br/>";

    }

function PrimosHasta($n){
    $sentencia="Los números primos hasta el $n son los siguientes: ";

    for ($i=2;$i<$n;$i++){
        $b=true;
        for ($j=2;$j<$i/2;$j++){
            if ($i%$j<>0);
            else $b=false;
        }
        if ($b) $sentencia=$sentencia." $i,";

    }
    return $sentencia."<br/>";
}

function amigos($n1,$n2){
    $d1=array();
    $d2=array();
    $s1=0;
    $s2=0;
    for ($i=1;$i<=$n1/2;$i++){
        if($n1%$i==0) $d1[]=$i;
    }
    for ($i=1;$i<=$n2/2;$i++){
        if($n2%$i==0) $d2[]=$i;
    }

    for ($i=0;$i<count($d1);$i++){
        $s1=$s1+$d1[$i];
    }
    for ($i=0;$i<count($d2);$i++){
        $s2=$s2+$d2[$i];
    }

    if($s1==$n2 and $s2==$n1) echo "$n1 y $n2 son amigos <br/>";
    else echo "$n1 y $n2 no son amigos <br/>";


}

function palindroma($palabra){
    $pr="";
    for ($i=0;$i<strlen($palabra);$i++){
        $pr[$i]=$palabra[strlen($palabra)-1-$i];
    }

    if($palabra==$pr)  return "La palabra $palabra es palíndroma <br/>";
    else return "La palabra $palabra no es palíndroma <br/>";
}


function medias(){
    $args=func_get_args(); //devuelve un array con la lista de argumentos.

    if (array_search('aritmética',$args)!=false){

        $sumatorio=0;
        for ($i=0;$i<count($args)-1;$i++){

            $sumatorio=$sumatorio+$args[$i];
        }

        $resultado=$sumatorio/(count($args)-1);
        return $resultado;

    }

    if (array_search('geométrica',$args)!=false){

        $productorio=1;
        for ($i=0;$i<count($args)-1;$i++){

            $productorio=$productorio*$args[$i];
        }

        $resultado=pow($productorio,1/(count($args)-1));
        return $resultado;

    }

    if (array_search('armónica',$args)!=false){

        $sumatorio=0;
        for ($i=0;$i<count($args)-1;$i++){

            $sumatorio=$sumatorio+(1/$args[$i]);
        }
        
        $resultado=(count($args)-1)/$sumatorio;
        return $resultado;

    }


}

//tabla_multiplicar();
//tabla_del_n(5);
//del_reves("paquito");
//echo primos(10);
//echo PrimosHasta(100);
//amigos(220,284);
//amigos(221,284);

//echo palindroma("paquito");
//echo palindroma("oneno");
echo medias(4,5,16,"aritmética");
echo"<br/>";
echo medias(4,5,16,"geométrica");
echo "<br/>";
echo medias(4,5,16,"armónica");



?>