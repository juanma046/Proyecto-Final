<?php
    //Creamos una funcion para insertar en la tabla enfrentamientos las veces que haya ganado el participante1
    function Fgana1($id1,$id2,$fecha,$ganador1,$mysqli){
        $sql3 = "INSERT INTO enfrentamiento (fecha, id_oponente1, id_oponente2, id_ganador) VALUES ('$fecha','$id1','$id2','$ganador1')";
        $resultadoF = $mysqli->query($sql3);
        Fupdate1($id1,$id2,$mysqli);
    }
    //Creamos una funcion para insertar en la tabla enfrentamientos las veces que haya ganado el participante2
    function Fgana2($id1,$id2,$fecha,$ganador2,$mysqli){
        $sql4 = "INSERT INTO enfrentamiento (fecha, id_oponente1, id_oponente2, id_ganador) VALUES ('$fecha','$id1','$id2','$ganador2')";
        $resultadoF = $mysqli->query($sql4);
        Fupdate2($id1,$id2,$mysqli);
    }
    //Craemos una función para hacer un update a la tabla de participantes añadiendoles una mas jugada y también a ganadas si ha ganado el participante1
    function Fupdate1($id1,$id2,$mysqli){
        $sql5 = ("UPDATE participantes SET Jugadas = Jugadas + 1 WHERE id_participante = $id1 OR id_participante = $id2");
        $resultado2 = $mysqli->query($sql5);

        $sql6 = ("UPDATE participantes SET Ganadas = Ganadas + 1 WHERE id_participante = $id1");
        $resultado2 = $mysqli->query($sql6);
    }
    //Craemos una función para hacer un update a la tabla de participantes añadiendoles una mas jugada y también a ganadas si ha ganado el participante2
    function Fupdate2($id1,$id2,$mysqli){
        $sql7 = ("UPDATE participantes SET Jugadas = Jugadas + 1 WHERE id_participante = $id1 OR id_participante = $id2");
        $resultado2 = $mysqli->query($sql7);

        $sql8 = ("UPDATE participantes SET Ganadas = Ganadas + 1 WHERE id_participante = $id2");
        $resultado2 = $mysqli->query($sql8);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        require 'conexion.php';
        //Obtengo los datos introducidos en el formulario anterior
        $id1 = $_POST['participante1'];
        $id2 = $_POST['participante2'];

        //Obtengo la fecha del combate
        $fecha=date('Y-m-d');

        //Obtengo la información de ambos participantes por su id

        $sql1 = "SELECT * FROM participantes WHERE id_participante LIKE '$id1'";
        $resultado1 = $mysqli->query($sql1);
        $fila1 = $resultado1->fetch_assoc();

        //Extraemos el id del pokemon de los participantes y creamos una consulta para conseguir el nombre
        $id_poke1 = $fila1['individuo_pokemon'];
        $sqlPK1="SELECT * FROM pokémon WHERE id_pokemon LIKE '$id_poke1'";
        $resultadoPK1 = $mysqli->query($sqlPK1);
        $filaPK1 = $resultadoPK1->fetch_assoc();
        $poke1 = $filaPK1['Nombre'];
        $tipos1 = $filaPK1['Tipo'];

        
        //Repetimos todo lo anterior para el pokemon del otro participante
        $sql2 = "SELECT * FROM participantes WHERE id_participante LIKE '$id2'";
        $resultado2 = $mysqli->query($sql2);
        $fila2 = $resultado2->fetch_assoc();

        $id_poke2 = $fila2['individuo_pokemon'];
        $sqlPK2="SELECT * FROM pokémon WHERE id_pokemon LIKE '$id_poke2'";
        $resultadoPK2 = $mysqli->query($sqlPK2);
        $filaPK2 = $resultadoPK2->fetch_assoc();
        $poke2 = $filaPK2['Nombre'];
        $tipos2 = $filaPK2['Tipo'];
  
    ?>
    <h1>Que comience el combate</h1>

    <?php 
    //Creamos el listado de gifs para todos los pokemons de la lista usando su nombre en la variable $poke1 o $poke2
        echo "<p>$fila1[Nombre]: $poke1 ($tipos1)</p>";
        if($poke1==="Blastoise"){
            echo "<img src='pokemon gif/blastoise.gif'>";
        }if($poke1==="Charizard"){
            echo "<img src='pokemon gif/charizard.gif'>";
        }if($poke1==="Venusaur"){
            echo "<img src='pokemon gif/venusaur.gif'>";
        }if($poke1==="Pikachu"){
            echo "<img src='pokemon gif/pikachu.gif'>";
        }if($poke1==="Gengar"){
            echo "<img src='pokemon gif/gengar.gif'>";
        }if($poke1==="Garchomp"){
            echo "<img src='pokemon gif/garchomp.gif'>";
        }
        echo "<h2>VS</h2>";
        echo "<p>$fila2[Nombre]: $poke2 ($tipos2)</p>";
        if($poke2==="Blastoise"){
            echo "<img src='pokemon gif/blastoise.gif'>";
        }if($poke2==="Charizard"){
            echo "<img src='pokemon gif/charizard.gif'>";
        }if($poke2==="Venusaur"){
            echo "<img src='pokemon gif/venusaur.gif'>";
        }if($poke2==="Pikachu"){
            echo "<img src='pokemon gif/pikachu.gif'>";
        }if($poke2==="Gengar"){
            echo "<img src='pokemon gif/gengar.gif'>";
        }if($poke2==="Garchomp"){
            echo "<img src='pokemon gif/garchomp.gif'>";
        }
    ?>

    <?php 
    //Creamos la tabla de tipos
        if($tipos1==="Fuego" && $tipos2==="Planta"){
            echo "<h2>Ha ganado $poke1</h2>";
            //Creamos la variable de ganador
            $ganador1=$id1;
            //Llamamos a la función con los datos necesarios
            Fgana1($id1,$id2,$fecha,$ganador1,$mysqli);
        }elseif($tipos1==="Agua" && $tipos2==="Fuego"){
            echo "<h2>Ha ganado $poke1</h2>";
            //Creamos la variable de ganador
            $ganador1=$id1;
            //Llamamos a la función con los datos necesarios
            Fgana1($id1,$id2,$fecha,$ganador1,$mysqli);
        }elseif($tipos1==="Planta" && $tipos2==="Agua"){
            echo "<h2>Ha ganado $poke1</h2>";
            //Creamos la variable de ganador
            $ganador1=$id1;
            //Llamamos a la función con los datos necesarios
            Fgana1($id1,$id2,$fecha,$ganador1,$mysqli);
        }elseif($tipos1==="Electrico" && $tipos2==="Agua"){
            echo "<h2>Ha ganado $poke1</h2>";
            //Creamos la variable de ganador
            $ganador1=$id1;
            //Llamamos a la función con los datos necesarios
            Fgana1($id1,$id2,$fecha,$ganador1,$mysqli);
        }elseif($tipos1==="Planta" && $tipos2==="Fuego"){
            echo "<h2>Ha ganado $poke2</h2>";
            //Creamos la variable de ganador
            $ganador2=$id2;
            //Llamamos a la función con los datos necesarios
            Fgana2($id1,$id2,$fecha,$ganador2,$mysqli);
        }elseif($tipos1==="Fuego" && $tipos2==="Agua"){
            echo "<h2>Ha ganado $poke2</h2>";
            //Creamos la variable de ganador
            $ganador2=$id2;
            //Llamamos a la función con los datos necesarios
            Fgana2($id1,$id2,$fecha,$ganador2,$mysqli);
        }elseif($tipos1==="Agua" && $tipos2==="Planta"){
            echo "<h2>Ha ganado $poke2</h2>";
            //Creamos la variable de ganador
            $ganador2=$id2;
            //Llamamos a la función con los datos necesarios
            Fgana2($id1,$id2,$fecha,$ganador2,$mysqli);
        }elseif($tipos1==="Agua" && $tipos2==="Electrico"){
            echo "<h2>Ha ganado $poke2</h2>";
            //Creamos la variable de ganador
            $ganador2=$id2;
            //Llamamos a la función con los datos necesarios
            Fgana2($id1,$id2,$fecha,$ganador2,$mysqli);
        }elseif($tipos1===$tipos2){
            $ganador = rand(1, 2);
            if ($ganador == 1) {
                echo "¡El ganador es $poke1!";
                //Creamos la variable de ganador
                $ganador1=$id1;
                //Llamamos a la función con los datos necesarios
            Fgana1($id1,$id2,$fecha,$ganador1,$mysqli);
            } else {
                echo "¡El ganador es $poke2!";
                //Creamos la variable de ganador
                $ganador2=$id2;
                //Llamamos a la función con los datos necesarios
                Fgana2($id1,$id2,$fecha,$ganador2,$mysqli);
            }
        }else{
            $ganador = rand(1, 2);
            if ($ganador == 1) {
                echo "<h2>¡El ganador es $poke1!</h2>";
                //Creamos la variable de ganador
                $ganador1=$id1;
                //Llamamos a la función con los datos necesarios
            Fgana1($id1,$id2,$fecha,$ganador1,$mysqli);
            } else {
                echo "<h2>¡El ganador es $poke2!</h2>";
                //Creamos la variable de ganador
                $ganador2=$id2;
                //Llamamos a la función con los datos necesarios
                Fgana2($id1,$id2,$fecha,$ganador2,$mysqli);
            }
        }
    ?>
    <a href="index.php">Volver</a>
</body>
</html>