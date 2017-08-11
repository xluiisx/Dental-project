<?php
session_start();
if (empty($_SESSION["user"])) {
header("Location:../index.php");
}
?>
<html>
    <head>
        <title>Buscar Expediente por Paciente</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
        <script src="bootstrap/query/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../Estilos/estilopagina.css">
    </head>
    <body>
        <nav class="navbar navbar-default fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dental Torreon</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="inicioMedico.php">Inicio</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if(isset($_SESSION['user']))
                        {
                        echo "<li><a href='../PHP/logout.php'><span class='glyphicon glyphicon-user'> </span>".$_SESSION['user'][0].":  Cerrar Sesion</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <center>
        <h1 id="tit">Buscar Expediente Por Paciente</h1>
        <fieldset  id="feel">
            <form method="post">
                <font id="letras">Seleccione el Paciente:</font><br />
                <?php
                $conexion=mysqli_connect("localhost","root")
                or die("Problemas de conexion");
                mysqli_select_db($conexion,"dentaltorreon")
                or die ("Problemas de conexion de la base de datos");
                $consulta="select * from persona";
                $res=mysqli_query($conexion,$consulta);
                echo "<select name='expe'>";
                    while($ver=mysqli_fetch_array($res))
                    {
                    echo "<option value='".$ver[id_persona]."'>".$ver['nombre']." ".$ver['apellidoP']." ".$ver['apellidoM']."</option>";
                    }
                echo "</select><br/><br/>";
                ?>
                <input type="submit" value="Buscar Expediente" />
            </form></fieldset></center>
            <br />
            <br />
            <center>
            <?php
            if(isset($_POST['expe']))
            {
            $conexion=mysqli_connect("localhost","root")
            or die("Problemas de conexion");
            mysqli_select_db($conexion,"dentaltorreon")
            or die ("Problemas de conexion de la base de datos");
            $busca=mysqli_query($conexion,"select expediente.*,persona.* from expediente inner join persona on expediente.id_persona=persona.id_persona
            where expediente.id_persona='$_POST[expe]'");
            $total=mysqli_num_rows($busca);
            if($total==0)
            {
            echo "<font color='white'>No hay Expediente Registrado para el Paciente</font><br/>";
            }
            else
            {
            echo "<table border='1' bgcolor='silver'>";
                echo "<tr><td>N.Expediente</td><td>Nombre</td><td>Apellido Paterno</td><td>Telefono</td><td>Fecha de Ingreso</td><td>Comentarios</td></tr>";
                while($reg=mysqli_fetch_array($busca))
                {
                echo "<tr><td>".$reg['id_Expediente']."</td><td>".$reg['nombre']."</td><td>".$reg['apellidoP']."</td><td>".$reg['telefono']."</td>
                <td>".$reg['ingreso']."</td><td>".$reg['comentarios']."</td>";
                $id=$reg['nombre'];
                $npaciente=mysqli_query($conexion,"select * from expediente where id_Expediente='$id'");
                $row=mysqli_fetch_array($npaciente);
            echo $row['nombre']."</td></tr>";
            }
        echo "</table>";
        mysqli_close($conexion);
        }
        }
        ?>
        </center>
    </body>
</html>