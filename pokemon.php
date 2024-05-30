<?php
    require 'conexion.php';

    $sql1 = "SELECT * FROM pokémon ORDER BY Ganadas DESC";
    $resultado1 = $mysqli->query($sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pokemon.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <main>
    <div class="container">
    <h1>Lista de los Pokémons</h1>
                <div class="row">
                    <div class="col">
                        <div class="carousel slide" id="mi-carousel" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <?php 
                                        while($fila1 = $resultado1->fetch_assoc()){
                                    ?>
                                        <img src="pokemon gif/<?php echo $fila1['Modelo']; ?>" />
                                    <?php         
                                    }
                                    ?>
                                        
                                    
                                    <img class="img-fluid" src="pokemon gif/blastoise.gif" alt="">
                                </div>
                                <div class="carousel-item" data-bs-interval="5000">
                                    
                                    <img class="img-fluid" src="pokemon gif/charizard.gif" alt="">
                                </div>
                                <div class="carousel-item">
                                    
                                    <img class="img-fluid" src="pokemon gif/pikachu.gif" alt="">
                                </div>
                            </div>
        
                            <!-- Botones -->
                            <button 
                                class="carousel-control-prev"
                                type="button"
                                data-bs-target="#mi-carousel"
                                data-bs-slide="prev"
                            >
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
        
                            <button 
                                class="carousel-control-next"
                                type="button"
                                data-bs-target="#mi-carousel"
                                data-bs-slide="next"
                            >
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Siguiente</span>
                            </button>
        
                            <!-- Indicadores -->
                            <div class="carousel-indicators">
                                <button 
                                    type="button"
                                    class="active"
                                    data-bs-target="#mi-carousel"
                                    data-bs-slide-to="0"
                                    
                                ></button>
                                <button 
                                    type="button"
                                    class=""
                                    data-bs-target="#mi-carousel"
                                    data-bs-slide-to="1"
                                    
                                ></button>
                                <button 
                                    type="button"
                                    class=""
                                    data-bs-target="#mi-carousel"
                                    data-bs-slide-to="2"
                                    
                                ></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
                <script src="bootstrap.bundle.min.js"></script>
    </main>
    <?php
//
    //    while($fila1 = $resultado1->fetch_assoc()){
    //        echo "<div>";
    //            echo "Nombre: $fila1[Nombre]";
    //            echo "Tipo: $fila1[Tipo]";
    //            $jugadas=$fila1['Jugadas'];
    //            $ganadas=$fila1['Ganadas'];
    //            if($ganadas==0){
    //                $media=0;
    //                echo " Win-Rate: $media%";
    //            }else{
    //                $media = ($ganadas / $jugadas) * 100;
    //                echo " Win-Rate: $media%";
    //            }
    //?>
                <img src="pokemon gif/<?php echo $fila1['Modelo']; ?>" />
    <?php
    //        echo "</div>";
    //    }
    //    
    //    $mysqli->close();
    //?>
    <a href="index.php">Volver</a>
    </div>
</body>
</html>