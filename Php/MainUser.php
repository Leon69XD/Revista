<?php
include 'Log.php';

$Nombre=$_POST["Nombre"];
$Matricula=$_POST["Matricula"];
$Pass=$_POST["Pass"];
$Nivel=$_POST["Nivel"];
$ApellidoP=$_POST["ApellidoP"];
$ApellidoM=$_POST["ApellidoM"];
$Carrera=$_POST["Carrera"];
$Cuatrimestre=$_POST["Cuatrimestre"];
$Correo=$_POST["Correo"];
$Opc=$_POST["opc"];
$ins=new User();

switch ($Opc) {
	case 'login':
		$ins->Ingresar($Matricula,$Pass);
		break;

    case 'registroA':
        $ins->RegistrarA($Nombre,$ApellidoP,$ApellidoM,$Nivel,$Carrera,$Matricula,$Pass,$Cuatrimestre,$Correo);
		break;

	case 'registroM':
		$ins->RegistrarM($Nombre,$ApellidoP,$ApellidoM,$Matricula,$Pass,$Correo);
	   break;
    case 'registroAd':
        $ins->RegistrarAd($Nombre,$ApellidoP,$ApellidoM,$Matricula,$Pass,$Correo);
        break;
    case 'Baja':
        $ins->Baja($Matricula);
        break;
    case 'ActuA':
        $ins->ActualizarA($Nombre,$ApellidoP,$ApellidoM,$Nivel,$Carrera,$Matricula,$Pass,$Cuatimestre,$Correo);
        break;
    case 'ActuaM':
        $ins->ActualizarM($Nombre,$ApellidoP,$ApellidoM,$Matricula,$Pass,$Correo);
        break;
    default:
		echo "vales verga morro";
		break;
}

?>