<?php
session_start();
if(isset($_SESSION['usuario']))
{
echo "<p align='right'></br><a href='logoutmedicos.php'>Cerrar Sesion</a></p>";
}
else
{
echo "<p align='right'><a href='loginmedicos.php'>Login</a></p>";
}
?>
<html>
    <head>
        <title>Alta Tratamiento</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/query/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilopagina.css">
    </head>
    <body>
        <center><h1 id="tit">Alta Tratamiento</h1>
        <fieldset id="feel">
            <form method="post" action="verificaaltatratamiento.php">
                <font id="letras"> <strong>Tipo de Servicio:</font>
                <?php
                $conexion=mysqli_connect("localhost","root","","dentaltorreon")or die("Problemas de conexion");
                $consulta="select * from tipodeservicio";
                $res=mysqli_query($conexion,$consulta);
                echo "<select name='servicio'>";
                    while($ver=mysqli_fetch_array($res))
                    {
                    echo "<option value='".$ver['id_TipoDeServicio']."'>".$ver['nombre_servicio']."</option>";
                    }
                echo "</select><br/><br/>";
                ?>
                <font id="letras">Nombre de Tratamiento:</font> <input type="text" name="nombre_tratamiento" size="10" maxlength="30" /><br /><br />
                <font id="letras">Comentarios: </strong></font> <textarea name="comentarios" cols="26" rows="5"></textarea><br /><br /> <br /> 
                <input type="submit" value="Registrar" id="input" class="btn btn-info btn-lg" />
                <br />
                
            </form></fieldset><br /><br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />  <br />
            <img src="img/dientelimpio.png"/><br />
            <a href="registrar.php">Regresar</a></center>
           
        </body>
    </html>