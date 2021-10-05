
<html>
<head>
    <title>Agenda</title>
    <style>

        form {
            width:30%;
            padding:10px;
            border: 3px solid #CCC;
            margin: 0 auto;
            border-radius: 10%;
        }


        #agenda{
            display: inline;
            width: 100%;
        }

        #agenda .titulos {
            display: flex;
            width: 100%;
            text-align: center;
        }

        #agenda div:first-child input {
            margin: 0 1em;
            border: 0px;
            font-weight: bold;
            width: 100%;
            text-align: center;
            display: flex;
            background: none;
        }

        #datos {
            width: 100%;
            text-align: center;
            display: flex;
        }

        #datos p {
            font-size: 1.5rem;
            width: 50%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .warning {
            width: 80%;
            text-align: center;
            background-color: #ee7;
            border: 1px solid #ea2;
            padding: 4px 2.8em;
        }

        .noborder {
            border: none;
            background-color: transparent;
        }

    </style>
</head>
<body>

<form  method="post">
    <h2>AGENDA DE CONTACTOS</h2>

    <label for="formNombre">
        Nombre:
    </label>
    <input id="formNombre" type="text" name="n"   autofocus>

    <label for="formTelefono">
        Teléfono:
    </label>
    <input id="formTelefono" type="text" name="t" >
    <input type="submit">

    <div id="agenda">
        <div class="titulos">
            <input readonly value="Nombre">
            <input readonly value="Teléfono">
        </div>
        <hr>
        <?php

        $n=$_POST['n'];
        $t=$_POST['t'];
        /*
            * mostrar advertencia si el nombre esta vacio
            * */

        if (isset($n) && strlen($n)==0) {
            echo '<div class="warning">';
            echo '  El nombre no puede estar vacío.';
            echo '</div>';
        }



        $existe = false;//ponemos false para que compare con los datos de la agenda
        /*
            * mostrar todos los registros que hayan en el array
            * */

        for ($i=0;$i<count($_POST["paco"]);$i++) {

            $nombre = $_POST["paco"][$i];
            $telefono = $_POST["pablo"][$i];

            if ($nombre==$n) {
                //mismo nombre
                $existe = true;
                if (strlen($t)==0) {      //si existe y t es cero eliminamos el item de la agenda
                    $nombre = null;
                    $telefono = null;
                } else {                 // si existe y t no es cero se sustituye para ese $nombre el $telefono por $t.
                    $telefono = $t;
                }
            }
            if ($nombre==null) {}else {     //para que vaya creciendo la agenda
                agenda_agregar($nombre, $telefono);
            }
        }

        // -----------------------------------------------------------------------

        if ($existe) {
        }
        else{                          //si no existe en la agenda lo agregamos, no tendríamos agenda
            if (strlen($n)>0)
                agenda_agregar($n,$t);
        }

        /*
            * añade un nombre y telefono
            * */
        function agenda_agregar($nombre,$telefono) {
            echo '<div id="datos">';
            echo '<td><p>' .$nombre. '</p></td>';
            echo '<td><p>' .$telefono. '</p></td>';
            echo '    <input name="paco[]" type="hidden" readonly value="'.$nombre.'">'; //estas 2 líneas hacen que la agenda crezca hacia abajo.
            echo '    <input name="pablo[]" type="hidden" readonly value="'.$telefono.'">';
            echo '</div>';
        }
        ?>
    </div>
</form>
</body>

</html>