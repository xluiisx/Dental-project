<html>
    <head>
        <title>Buscar Medico</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/query/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
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
        <center><h3 id="tit">Buscar Medico por Especialidad</h3>
        <fieldset id="feel">
            <form method="post">
                <font id="letras">Seleccione la Especialidad del Medico:</font><br />
                <?php
                $conexion=mysqli_connect("localhost","root")
                or die("Problemas de conexion");
                mysqli_select_db($conexion,"dentaltorreon")
                or die ("Problemas de conexion de la base de datos");
                $consulta="select distinct especialidad from medico";
                $res=mysqli_query($conexion,$consulta);
                echo "<select name='espe'>";
                    while($ver=mysqli_fetch_array($res))
                    {
                    echo "<option value='".$ver['especialidad']."'>".$ver['especialidad']."</option>";
                    }
                echo "</select><br/><br/>";
                ?>
                <input  type="submit" value="Buscar"/>
            </form></fieldset></center>
            <br />
            <br />
            <center>
            <?php
            if(isset($_POST['espe']))
            {
            $conexion=mysqli_connect("localhost","root")
            or die("Problemas de conexion");
            mysqli_select_db($conexion,"dentaltorreon")
            or die ("Problemas de conexion de la base de datos");
            $busca=mysqli_query($conexion,"select * from medico where especialidad='$_POST[espe]'");
            $total=mysqli_num_rows($busca);
            if($total==0)
            {
            echo "<font color='white'>No hay Medicos registrados con esa Especialidad</font><br/>";
            }
            else
            {
            echo "<table border='2'bgcolor='silver'>";
                echo "<tr><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Telefono</td>
                <td>Cedula</td><td>Especialidad</td></tr>";
                while($reg=mysqli_fetch_array($busca))
                {
                echo "<tr><td>".$reg['nombre']."</td><td>".$reg['apellidoP']."</td><td>".$reg['apellidoM']."</td>
                <td>".$reg['telefono']."</td><td>".$reg['cedula']."</td><td>".$reg['especialidad']."</td>";
                $id=$reg['especialidad'];
                $nmedico=mysqli_query($conexion,"select nombre from medico where id_medico='$id'");
                $row=mysqli_fetch_array($nmedico);
            echo $row['nombre']."</td></tr>";
            
            
            
            }
        echo "</table>";
        mysqli_close($conexion);
        }
        }
        ?>
        </center>
        <br />
        <center><img src="img/dientelimpio.png"/><br />
        <a href="buscar.php">Regresar</a></center>
        <style>
        body{
        background-image:url('img/log1.JPG');
        
        }
        #letras
        {
        color: black;
        font-family: Baskerrille Old Face;
        font-size: 20px;
        }
        #input[type=submit]:hover {
        cursor: pointer;
        background: #000040;
        color: white;
        }
        #feel{
        width: 425px;
        height: 120px;
        background: #88C4FF;
        }
        #tit{
        color: white;
        font-family: Baskerrille Old Face;
        }
        </style>
    </body>
</html>