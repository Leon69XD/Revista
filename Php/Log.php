<?php
/**
*  
*/
class User
{
	
	function Ingresar($matricula,$pass)
    {
        require ('Conexion.php');
        $pass2=md5($pass);
        $query="SELECT * FROM Usuario WHERE Matricula='".$matricula."' AND PAss='".$pass2."'";
        $res=mysqli_query($Conexion,$query);
        $Fila=mysqli_fetch_assoc($res);
        if($Fila>0){
            $Get_Rol=$Fila["Rol"];
            session_start();
            $_SESSION['User']=$Fila["Matricula"];
            print_r($_SESSION['User']);
            if($Get_Rol=="Administrador"){
                header('location: ../Admin.html');
            }
            else{
                if($Get_Rol=="Alumno"){
                    header('location: ../Editor.html');
                }
                else{
                    if($Get_Rol=="Maestro"){
                     header('location: ../Maestros.html');  
                    }
                }
            }
            }
        else{
            echo "nel";
            mysqli_error($Conexion);
        }
        
	}

	function RegistrarA($nombre,$apellidoP,$apellidoM,$nivel,$carrera,$matricula,$pass,$cuatrimestre,$correo)
	{
		require ('Conexion.php');
		$rol="Alumno";
        $activo='true';
		$pass2=md5($pass);	
		$query="INSERT INTO `Usuario`(`Matricula`, `Nombre`, `Pass`, `Nivel`, `ApellidoP`, `ApellidoM`, `Rol`, `Carrera`, `Cuatriemstre`, `Correo`, `Activo`) values ( '$matricula', '$nombre', '$pass2', '$nivel', '$apellidoP', '$apellidoM', '$rol', '$carrera', '$cuatrimestre', '$correo', 'true' )";
        mysqli_query($Conexion,$query);
	}

	function RegistrarM($nombre,$apellidoP,$apellidoM,$matricula,$pass,$correo)
	{
		require ('Conexion.php');
		$rol="Maestro";
		$pass2=md5($pass);
		$query="INSERT INTO Usuario (`Matricula`, `Nombre`, `Pass`, `ApellidoP`, `ApellidoM`, `Rol`, `Correo`, `Activo`)  values ( '$matricula', '$nombre', '$pass2', '$apellidoP', '$apellidoM', '$rol', '$correo', 'true' )";
        mysqli_query($Conexion,$query);
        echo mysqli_error($Conexion);
        header('location: ../Admin.html');
        
	}
    
    function RegistrarAd($nombre,$apellidoP,$apellidoM,$matricula,$pass,$correo,$activo)
	{
		require ('Conexion.php');
		$rol="Administrador";
        $activo='true';
		$pass2=md5($pass);
		$query="INSERT INTO Usuario (`Matricula`, `Nombre`, `Pass`, `ApellidoP`, `ApellidoM`, `Rol`, `Correo`, `Activo`)  values ( '$matricula', '$nombre', '$pass2', '$apellidoP', '$apellidoM', '$rol', '$correo', '$activo' )";
        mysqli_query($Conexion,$query);
        
	}

	function Baja($matricula){
        require ('Conexion.php');
        $query="UPDATE Usuario SET Activo='false' WHERE Matricula='".$matricula."'";
        mysqli_query($Conexion,$query);
	}

	function ActualizarA($nombre,$apellidoP,$apellidoM,$nivel,$carrera,$matricula,$pass,$cuatimestre,$correo,$activo,$rol)
	{
        require ('Conexion.php');
        $query="UPDATE `Usuario` SET `Nombre`='$nombre',`Pass`='$pass',`Nivel`='nivel',`ApellidoP`='apellidoP',`ApellidoM`='apellidoM',`Carrera`='carrera',`Cuatriemstre`='cuatimestre',`Correo`='correo' WHERE Matricula='".$matricula."' ";
	}

	function ActualizarM($nombre,$apellidoP,$apellidoM,$matricula,$pass,$correo,$activo,$rol)
	{
		$con=new Conexion();
		$conect=$con->Conectar;
		$rol="Maestro";
		$pass2=md5($pass);
		$query="UPDATE `usuario` SET`Nombre`='$nombre',`Pass`='pass',`ApellidoP`='ApellidoP',`apellidoP`='apellidoM',`Rol`='rol',`Correo`='correo' WHERE Matricula='".$matricula."'";
	}
    
    function Salir(){
        session_start();
        session_destroy();
    }
    
    

}

/*create table Usuario(
Matricula int unique primary key not null, 
Nombre varchar(50) not null, 
Pass varchar (500) not null,
Nivel varchar(5),
ApellidoP varchar(50),
ApellidoM varchar(50),
Rol varchar(20) not null,
Carrera varchar(50) null,
Cuatriemstre int null,
Correo varchar(100) unique not null,
Activo boolean
);*/

?>

