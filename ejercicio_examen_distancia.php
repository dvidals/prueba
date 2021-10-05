<!DOCTYPE html>
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

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $tel=$_POST['t'];
    $nom=$_POST['n'];
    $contacto=array($nom,$tel);
    $agenda_nombres=$_POST['nom'];
    $agenda_telefonos=$_POST['tel'];

    mostrar_agenda($contacto);

    for ($i=0;$i<count($agenda_nombres);$i++){
            $agenda_contactos[$i]=array($agenda_nombres[$i],$agenda_telefonos[$i]);
            mostrar_agenda($agenda_contactos[$i]);

    }


}


function mostrar_agenda($contacto){
    echo '<div id="datos">';
        echo "<tr>";
        foreach ($contacto as $valor) {
            echo "<td>";
            echo "<p>$valor</p>";
            echo "</td>";
        }
        echo "</tr>";
        echo'<input readonly type="hidden" name="nom[]" value="'.$contacto[0].'">';
        echo'<input readonly type="hidden" name="tel[]" value="'.$contacto[1].'">';
    echo '</div>';



}
?>