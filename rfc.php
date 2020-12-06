$matricula = $_POST['matricula'];
$conexion = new mysqli('servidor','usuario','password','basedatos',3306);
$consulta = "SELECT nombre,paterno,materno FROM tblalumno WHERE matricula = '$matricula'";
$result = $conexion->query($consulta);
  
$respuesta = new stdClass();
if($result->num_rows > 0){
    $fila = $result->fetch_array();
    $respuesta->nombre = $fila['nombre'];
    $respuesta->paterno = $fila['paterno'];
    $respuesta->materno = $fila['materno'];
}
echo json_encode($respuesta);