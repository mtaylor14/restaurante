<?php
	include "controllers/Mysql.php";
	include "controllers/config.php";

	$rfc = strip_tags($_POST['rfc']);
	$error = validacionCampo($rfc);

	if($error == "")
	{
		$statusBusqueda = realizarBusqueda($rfc);
		echo json_encode($statusBusqueda);
	}
	else
	{
		echo json_encode(array('errores' => $error));
	}

	function validacionCampo($rfc)
	{
		$error = "";

		if(empty($rfc))
		{
			$error = "Favor de llenar el campo.";
		}

		return $error;
	}

	function realizarBusqueda($rfc)
	{
		$mysql = new MYSQL();
		$mysql = $mysql->connect();
		$query = "SELECT * FROM facturas WHERE rfc='$rfc'";
		$result = $mysql->query($query);
		$row = $result->fetch_assoc();

		if($result)
		{
			if(empty($row['rfc']))
			{
				return $arrayStatus = array('status' => 0);
			}
			else
			{
				$arrayInfo = array('status' => 1, 'rfc' => $row['rfc'], 'razon_social' => $row['razon_social'], 'direccion' => $row['direccion'], 'cp' => $row['cp']);
				$mysql->close();

				return $arrayInfo;
			}
		}
		else
		{
			return $arrayStatus = array('status' => -1);
		}
	}
?>