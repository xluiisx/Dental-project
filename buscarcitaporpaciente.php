<?php
session_start();
if(isset($_SESSION['usuario']))
{
echo "<p align='right'>Usuario: ".$_SESSION['usuario']."</br><a href='logoutmedicos.php'>Cerrar Sesion</a></p>";
}
else
{
echo "<p align='right'><a href='login.php'>Login</a></p>";
}
?>
<html>
    <head>
        <title>Buscar Cita</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/query/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
          <link rel="stylesheet" type="text/css" href="estilopagina.css">
    </head>
    <body>
        <center>
        <h3 id="tit">Buscar Cita Por Paciente</h3>
        <fieldset id="feel"><form method="post">
            Seleccione al Paciente:
            <?php
            $conexion=mysqli_connect("localhost","root")
            or die("Problemas de conexion");
            mysqli_select_db($conexion,"dentaltorreon")
            or die ("Problemas de conexion de la base de datos");
            $consulta="select * from persona";
            $res=mysqli_query($conexion,$consulta);
            echo "<select name='paciente'>";
                while($ver=mysqli_fetch_array($res))
                {
                echo "<option value='".$ver[id_persona]."'>".$ver['nombre']." ".$ver['apellidoP']."</option>";
                }
            echo "</select><br/><br/>";
            ?>
            <input  type="submit" value="Buscar"/>
        </form></fieldset></center>
        <center>
        <?php
        if(isset($_POST['paciente']))
        {
        $conexion=mysqli_connect("localhost","root")
        or die("Problemas de conexion");
        mysqli_select_db($conexion,"dentaltorreon")
        or die ("Problemas de conexion de la base de datos");
        $busca=mysqli_query($conexion,"select cita.id_Cita,medico.nombre,medico.apellidoP,tipodeservicio.nombre_servicio from medico
        inner join cita on medico.id_medico=cita.id_medico inner join tipodeservicio on
        tipodeservicio.id_TipoDeServicio=cita.id_TipoDeServicio where cita.id_persona='$_POST[paciente]'");
        $total=mysqli_num_rows($busca);
        if($total==0)
        {
        echo "<font color='white'>No hay Citas registradas para este Paciente</font><br/>";
        }
        else
        {
        echo "<table border='1' bgcolor='silver'>";
            echo "<tr><td>Doctor que Atiende</td><td>Servicio Realizado</td></tr>";
            while($reg=mysqli_fetch_array($busca))
            {
            echo "<tr><td>".$reg['nombre']." ".$reg['apellidoP']."</td>
            <td>".$reg['nombre_servicio']."</td></td>";
            $id=$reg['nombre'];
            $npaciente=mysqli_query($conexion,"select nombre from medico where id_medico='$id'");
            $row=mysqli_fetch_array($npaciente);
        echo $row['nombre']."</td></tr>";
        
        
        
        }
    echo "</table>";
    mysqli_close($conexion);
    }
    }
    ?>
    </center>
    <br />
    <img src="img/dientelimpio.png"/><br />
    <a href="buscar.php">Regresar</font></a>
    
</body>
</html>