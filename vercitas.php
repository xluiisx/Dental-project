<?php
session_start();

if(isset($_SESSION['usuario']))
{
    echo "<p align='right'><a href='index.php'>Cerrar Sesion</a></p>";
}
else
{
    echo "<p align='right'><a href='loginmedicos.php'>Login</a></p>";
}
?>
<html>
<head>
<title>Ver Citas</title>
</head>
<body>
<center><h1 id="tit">Citas</h1>
<?php

$dental=mysqli_connect("localhost","root") or die ("Problemas con la conexion");

mysqli_select_db($dental,"dentaltorreon") or die ("Problemas en la seleccion de la base de datos");
echo "<table border='1' bgcolor='silver'>";
echo "<tr><td>Fecha</td><td>Nombre de Paciente</td><td>Nombre de Servicio</td></tr>";

$registro=mysqli_query($dental,"select * from cita inner join persona on
cita.id_persona=persona.id_persona inner join tipodeservicio on cita.id_TipoDeServicio=tipodeservicio.
id_TipoDeServicio") or die ("Problemas con el select".mysqli_error());
while ($reg=mysqli_fetch_array($registro))
{
    echo "<tr>";
  echo $fila="<td>".$reg['fecha']."</td>";
  echo $fila="<td>".$reg['nombre']." ".$reg['apellidoP']."</td>";
  echo $fila="<td>".$reg['nombre_servicio']."</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($dental);
?>
<br />
<br />
<img src="img/dientelimpio.png"/><br />
<a href="Ver.php">Regresar</a></center>
<style>
body{
  background-image:url('img/log1.JPG'); 
    

}
#input[type=submit]:hover {
    cursor: pointer;
    background: #000040;
    color: white;
}
#tit{
    color: white;
    font-family: Baskerrille Old Face;
}
</style>
</body>
</html>