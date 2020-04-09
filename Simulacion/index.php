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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  

      <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="#">Simulacion Algoritmo round robin - Oscar Ballesta - Efrain Vega</a>  
      </nav>


      <div class="p-4 text-muted padre" style="max-width: 7000px;">
      <div class="px-4" style="margin-top: 20px;">
        <form action="http://localhost/Simulacion/Llenado.php" method="GET">
          <div class="row">
          <div class="col">
          <label for="Seleccionar">Seleccionar por</label>
          <select id="cars" name="Seleccion" class="form-control">
          <option value="tiempo">Mayor uso de CPU</option>
          <option value="memoria">Mayor uso de memoria</option>
           </select><br><br>
           </div>

            <div class="col">
              <label >Sistema operativo </label>
              <h2>Windows</h2>
            </div>
            <div class="col">
              <label for="Cantidad">Cantidad de procesos</label>
              <input type="number" name="Cantidad" class="form-control" placeholder="Cantidad de procesos" required>
            </div>
            <div class="col">
            <button type="submit" class="btn btn-dark mb-2" style="margin-top: 20px;">Cargar procesos</button>
            </div>
            </div>
          </div>
         </div>
         <hr style="width:85%;">
       <div class="text-muted padre text-justify"  ><h1 class="text-center" >Procesos cargados</h1></div>


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
           
               
            </tbody>
        
        
          </body>
</html>