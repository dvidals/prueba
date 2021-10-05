<?php
class Vehiculo{
    private $ruedas;
    private $motor;
    private $color;
    static private $combustible;
    static private $ayuda=0;
    private $precio_base;



     function __construct($motor,$color,$ruedas){
        $this->motor=$motor;
        $this->color=$color;
        $this->ruedas=$ruedas;
    }

     function arrancar(){
        echo "Estoy arrancando";
    }

    protected function girar(){
        echo "Estoy girando";
    }

    protected function acelerar(){
        echo "Estoy acelerando";
    }

    protected function frenar(){
        echo"Estoy frenando";
    }

    protected function set_color($color){
        $this->color=$color;
    }

    protected function set_motor($motor){
        $this->motor=$motor;
    }

    protected function set_ruedas($ruedas){
        $this->ruedas=$ruedas;
    }

    protected  function get_color(){
        return $this->color;
    }

    protected function get_motor(){
        return $this->motor;
    }

     function __get($propiedad){
        if(property_exists($this,$propiedad)) return $this->$propiedad;
        else echo "La propiedad $propiedad no existe para este objeto";
    }

    function __set($propiedad,$valor){
        if(property_exists($this,$propiedad))  $this->$propiedad=$valor;
        else echo "La propiedad $propiedad no existe para este objeto";

    }

    static function descuentoGobierno(){
         if(date("m-d-y")>"11-01-21"){
            self::$ayuda=4500;
        }
         else self::$ayuda=3500;
    }


    static function get_combustible(){
        return self::$combustible="Diesel";
    }


     function precio_final(){
         $valor_final=$this->precio_base-self::$ayuda;
        return $valor_final;
    }

     function set_precio_base($precio_base){
         $this->precio_base=$precio_base;
    }

}

echo Vehiculo::get_combustible();
echo "<br/>";

$opel= new Vehiculo(1900,"Blanco",5);
$opel->precio_base=15500;
echo $opel->__get($ruedas);
echo "<br/>";
//$opel->set_precio_base(15500);
echo $opel->precio_base;
echo "<br/>";
//echo Vehiculo::$ayuda;
echo "<br/>";
echo $opel->precio_final();


?>


