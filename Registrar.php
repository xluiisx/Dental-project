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
        <title>REGISTRAR</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/query/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="estilopagina.css">
    </head>
    <body>
       
        <center><h1 id="M">REGISTRAR</h1></center>
        <center>
        <center><table>
            <td id="menu"><ul><li><a href="nuevousuario.php"><font color="black">Nuevo usuario</font></a></li><br /></ul></td>
        </table>
        </center>
        <center><table>
            <td id="menu"><ul ><li><a href="formaltamedicos.php"><font color="black">Medico</font></a></li><br /></ul></td>
            <td id="menu"><ul><li><a href="formaltapacientes.php"><font color="black">Paciente</font></a></li><br /></ul></td>
            <td id="menu"><ul><li><a href="formaltaproveedor.php"><font color="black">Proveedor</font></a></li><br /></ul></td>
            <td id="menu"><ul><li><a href="Servicio.php"><font color="black">Servicio</font></a></li><br /></ul></td>
        </table></center>
        <center><table>
            <td id="menu"><ul><li><a href="formaltacita.php"><font color="black">Cita</font></a></li><br /></ul></td>
            <td id="menu"><ul><li><a href="formaltatratamiento.php"><font color="black">Tratamiento</font></a></li><br /></ul></td>
            <td id="menu"><ul><li><a href="formaltareceta.php"><font color="black">Receta</font></a></li><br /></ul></td>
            <td id="menu"><ul><li><a href="formaltaexpediente.php"><font color="black">Expediente</font></a></li><br /></ul></td>
        </table></center>
        <br />
        <img src="img/dientelimpio.png"/><br />
        <a href="administrador.php">Regresar</a>
    </body>
</html>