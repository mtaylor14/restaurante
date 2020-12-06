<?php
	session_start();
	include "controllers/Mysql.php";
	include "controllers/config.php";
	//include 'controllers/pdf_clase.php';

	//var_dump($_POST);
	$errores = "";
	$rfc = strip_tags($_POST['rfc']);
	$razon_social = strip_tags($_POST['razon_social']);
	$direccion = strip_tags($_POST['direccion']);
	$cp = strip_tags($_POST['cp']);
	$cdfi = strip_tags($_POST['cdfi']);
	$concepto = strip_tags($_POST['concepto']);

	$errores = validacionDatos($rfc, $razon_social, $direccion, $cp, $cdfi, $concepto);

	if($errores=="")
	{
		$statusRegister = registrarInstitucion($rfc, $razon_social, $direccion, $cp, $cdfi, $concepto);
		echo json_encode(array('status' => $statusRegister));
	}
	else
	{
		echo json_encode(array('errores' => $errores));
	}

	function validacionDatos($rfc, $razon_social, $direccion, $cp, $cdfi, $concepto)
	{
		$errores = "";

		//Validar campos
		if(empty($rfc))
		{
			$errores.="* Faltó ingresar rfc.<BR>";
		}
		
		if(empty($razon_social))
		{
			$errores.="* Faltó ingresar razon social.<BR>";
		}
		
		if(empty($direccion))
		{
			$errores.="* Faltó ingresar direccion.<BR>";
		}
		
		if(empty($cp))
		{
			$errores.="* Faltó ingresar código postal.<BR>";
		}
		
		if(empty($cdfi))
		{
			$errores.="* Faltó ingresar CDFI.<BR>";
		}
		
		if(empty($concepto))
		{
			$errores.="* Faltó ingresar concepto.<BR>";
		}

		return $errores;
	}

	function registrarInstitucion($rfc, $razon_social, $direccion, $cp, $cdfi, $concepto)
	{
		$mysql = new MYSQL();
		$mysql = $mysql->connect();
		$query = "SELECT * FROM facturas WHERE rfc='$rfc'";

		//Realizar la búsqeda
		$result = $mysql->query($query);
		$row = $result->fetch_assoc();

		if($rfc === $row['rfc'])
		{
			//echo 2;
			//echo json_encode(array('success' => 2));
			$result->free();
			$mysql->close();
			return 2;
		}
		else
		{
			//$result->free();
			$result = $mysql->query("INSERT INTO `facturas`(`rfc`, `razon_social`, `direccion`, `cp`,`cdfi`, `concepto`) 
								    VALUES ('".$rfc."','".$razon_social."', '".$direccion."', '".$cp."','".$cdfi."','".$concepto."')");

			if ($result)
			{
				$id = $mysql->insert_id; //Id que se agregó a la tabla
				$_SESSION['id_registro'] = $id;
				$mysql->close();
				return 1;
			}
			else
			{
				return -1;
			}
		}
	}
?>