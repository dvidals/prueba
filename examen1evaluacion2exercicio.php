<?php
function codigo_cuenta_correcto($cuenta){
    $cuenta=str_replace(" ","",$cuenta);
    $a=substr($cuenta,0,8);
    $d=substr($cuenta,-10,10);
    $b=substr($cuenta,8,1);
    $c=substr($cuenta,9,1);


    //$a=explode("",$a);
    $a=str_split($a);
    $d=str_split($d);

    $pesos_entid_sucursal=array(4,8,5,10,9,7,3,6);
    $pesos_num_cuenta=array(1,2,4,8,5,10,9,7,3,6);

    $suma_ponderada_a=0;
    $suma_ponderada_d=0;

    for($i=0;$i<8;$i++){

        $suma_ponderada_a=$suma_ponderada_a+ $a[$i]*$pesos_entid_sucursal[$i];
    }
    for($i=0;$i<10;$i++){

        $suma_ponderada_d=$suma_ponderada_d+ $d[$i]*$pesos_num_cuenta[$i];
    }

    $resto_a=$suma_ponderada_a%11;
    $resto_d=$suma_ponderada_d%11;

    $resultado_a=11-$resto_a;
    $resultado_d=11-$resto_d;

    if($resultado_a==11) $b_calculado=11;
    elseif ($resultado_a==10) $b_calculado=10;
    else $b_calculado=$resultado_a;

    if($resultado_d==11) $c_calculado=1;
    elseif ($resultado_d==10) $c_calculado=0;
    else $c_calculado=$resultado_d;

    if($b==$b_calculado & $c==$c_calculado) return true;
    else return false;




}

if(codigo_cuenta_correcto("0182 1294 18 0202873695")) echo "Cuenta Corriente válida";
else echo "Cuenta corriente no válida";
echo "<br/>";
if( codigo_cuenta_correcto("2100 0418 40 1234567891")) echo "Cuenta Corriente válida";
else echo "Cuenta corriente no válida";

echo "<br/>";
if( codigo_cuenta_correcto("2080 5102 9730 0005 7292")) echo "Cuenta Corriente válida";
else echo "Cuenta corriente no válida";


?>