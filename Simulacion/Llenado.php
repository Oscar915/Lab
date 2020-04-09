<?php
$con=mysqli_connect('localhost','root','','procesos') or die('Error al conectar');
//$sql="INSERT INTO `usuario` (`email`, `pass`) VALUES ('$_POST[email]', '$_POST[pass]')";
//mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulacion</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light " style="background-color: #e3f2fd;">
        <a class="navbar-brand " href="#">Simulacion Algoritmo round robin - Oscar Ballesta - Efrain Vega</a>
    </nav>


    <div class="p-4 text-muted padre text-center" style="max-width: 7000px;">
        <div class="px-4" style="margin-top: 20px;">
            <form action="http://localhost/Simulacion/Llenado.php" method="GET">
                <div class="row text-center">
                    <div class="col">
                        <label for="Seleccionar">Seleccionar por</label>
                        <select id="cars" name="Seleccion" class="form-control">
                            <option value="tiempo">Mayor uso de CPU</option>
                            <option value="memoria">Mayor uso de memoria</option>
                        </select><br><br>
                    </div>

                    <div class="col text-center">
                        <label>Sistema operativo </label>
                        <h2>Windows</h2>
                    </div>
                    <div class="col text-center">
                        <label for="Cantidad">Cantidad de procesos</label>
                        <input type="number" name="Cantidad" class="form-control" placeholder="Cantidad de procesos"
                            required>
                    </div>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-dark mb-2" style="margin-top: 20px;">Cargar
                            procesos</button>
                    </div>
                </div>
        </div>
    </div>
    <hr style="width:85%;">
    <div class="text-muted padre text-justify">
        <h1 class="text-center">Procesos cargados</h1>
    </div>


    <div class="p-4 text-muted padre" style="max-width: 5000px;">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">PID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Tiempo</th>
                    <th scope="col">Memoria KB</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $sele=($_GET['Seleccion']);
            $can=($_GET['Cantidad']);
            $sql="SELECT * FROM `datos` ORDER BY `datos`.$sele DESC LIMIT $can ";
            $resultado=mysqli_query($con,$sql);
            while($mostrar=mysqli_fetch_array($resultado)){
              ?>
                <tr>
                    <td><?php echo $mostrar['pid'] ?></td>
                    <td><?php echo $mostrar['nombre'] ?></td>
                    <td><?php echo $mostrar['usuario'] ?></td>
                    <td><?php echo $mostrar['descripcion'] ?></td>
                    <td><?php echo $mostrar['tiempo'] ?></td>
                    <td><?php echo $mostrar['memoria'] ?> KB</td>
                </tr>
                <?php
            }
              ?>

            </tbody>
        </table>
    </div>
    <hr style="width:85%;">
    <div class="text-muted padre text-justify">
        <h1 class="text-center">Simulación algoritmo de planificacion de procesos round robin</h1>
    </div>
    <div class="p-4 text-muted padre" style="max-width: 5000px;">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tiempo de llegada</th>
                    <th scope="col">Rafaga</th>
                    <th scope="col">Quantum</th>
                </tr>
            </thead>
            <tbody>
                <?php
            //`memoria`
            $sele=($_GET['Seleccion']);
            $can=($_GET['Cantidad']);
            $sql="SELECT * FROM `datos` ORDER BY `datos`.$sele DESC LIMIT $can ";
            $resultado=mysqli_query($con,$sql);
            $numero=1;
            $llegada=0;
            while($mostrar=mysqli_fetch_array($resultado)){
             
              
              ?>
                <tr>
                    <td><?php echo $numero?></td>
                    <td><?php echo $mostrar['nombre'] ?></td>
                    <td><?php echo $llegada?></td>
                    <td><?php echo strlen ($mostrar['nombre']) ?></td>
                    <td>2</td>

                </tr>
                <?php
             $numero++;
             $llegada++;
            }
              ?>

            </tbody>
        </table>
    </div>

    <hr style="width:85%;">

    <div class="px-4" style="margin-top: 20px;">
        <form action="http://localhost/Simulacion/index.php" method="GET">
            <div class="row text-center ">
                <div class="col">
                    <button type="button" id="iniciar" class="btn btn-outline-success">Iniciar simulación</button>
                </div>
                <div class="col">
                    <button type="button" id="pausar" class="btn btn-outline-danger">Pausar Simulación</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-outline-warning">Reiniciar simulación</button>
                </div>
            </div>
    </div>
    <hr style="width:85%;">



    <div class="px-4" style="margin-top: 20px;">
        <div class="row text-center ">
            <div class="col">
                <div class="text-muted padre">
                    <h2 class="text-center">Tiempo en ejecución:</h2>
                </div>
            </div>
            <div class="col">
                <div class="text-muted padre ">
                    <h2 id="temporizador" class="text-center">0.0</h2>
                </div>
            </div>
        </div>
    </div>
    <hr style="width:85%;">


    <div class="p-4 text-center box" id="Ejecu">
        <div class="alert alert-success ">
            <h4 class="alert-heading">En ejecución</h4>
            <p>Nombre del proceso</p>
            <p>rafaga restante </p>
            <hr>
            <p id="quantum" class="mb-0">Quantum: </p>
        </div>
    </div>

    <div class="px-4">
        <div class="row text-center" id="menu">
            <div class="col">
                <div class="p-4 text-center box" id="Ejecu">
                    <div class="alert alert-success ">
                        <h4 class="alert-heading">Procesos listos</h4>
                        <?php
                        $sele=($_GET['Seleccion']);
                        $can=($_GET['Cantidad']);
                        $sql="SELECT * FROM `datos` ORDER BY `datos`.$sele DESC LIMIT $can ";
                        $resultado=mysqli_query($con,$sql);
                        $numero=1;
                        $llegada=0;
                        $j=0;
                        while($mostrar=mysqli_fetch_array($resultado)){
             $j++;
              
             ?>
                        <p><?php echo $mostrar['nombre'] ?></p>
                        <hr>

                        <?php
            
                          }
              ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-4 text-center box" id="Ejecu">
                    <div class="alert alert-success ">
                        <h4 class="alert-heading">Procesos terminados</h4>
                        <p>------------------------</p>
                        <p>------------------------</p>
                        <hr>
                        <p class="mb-0">Quantum: </p>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script src="tiempos.js"></script>
   
</body>

</html>