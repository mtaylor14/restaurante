<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	    <title>Generar pdf</title>
	    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	    <script type="text/javascript" src="js/file_javascript.js"></script>
	</head>
	<body>
		<section>
			<form method="post" id="form_id_registrar" action="buscar.php">
				<fieldset style="margin: 10px;">
					<legend>Datos de facturación</legend>
					<div>
						<label>RFC</label>
						<input type="text" name="rfc" id="rfc">
					</div>
					<div>
						<label>Razon social</label>
						<input type="text" name="razon_social" id="razon_social">
					</div>
					<div>
						<label>Direccion</label>
						<input type="text" name="direccion" id="direccion">
					</div>
					<div>
				 		<label>CP</label>
						<input type="text" name="cp" id="cp">
					</div>
					<div>
						<label>CDFI</label>
						<input type="text" name="cdfi" id="cdfi">
					</div>
					<div>
						<label>Concepto</label>
						<input type="text" name="concepto" id="concepto">
					</div>
		 		</fieldset>

		 		<div>
		 			<input type="submit" value="Buscar" name="buscar" id="btn_buscar">
			 	</div>
			</form>
		</section>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					$('#form_id_registrar').submit(function(e) {
						e.preventDefault();
						$.ajax({
							type: "post",
							url: 'buscar.php',
							data: $(this).serialize(),
							success: function(response)
							{
								response = JSON.parse(response)
								if(response.errores) {
									Swal.fire({
										icon: 'error',
										title: 'Buscar',
										html: response.errores
									})
								} else {
									if(response.status == 1) {
										Swal.fire({
											icon: 'success',
											title: 'Buscar',
											text: 'Empresa o institución existente'
										})
										mostrarInformacion(response);
									}else {
										if(response.status == 2)
										{
											Swal.fire({
												icon: 'warning',
												title: 'Buscar',
												text: 'Empresa o institución no registrada'
											})
										} else {
											Swal.fire({
												icon: 'error',
												title: 'Buscar',
												text: 'Ocurrió un error al realizar su registro, favor de volver a intentar'
											})
										}
									}
								}
							}
						});
					});
				});

				function mostrarInformacion(response)
				{
					$('#rfc').val(response.rfc);
					$('#razon_social').val(response.razon_social);
					$('#direccion').val(response.direccion);
					$('#cp').val(response.cp);
				}
			</script>
	</body>
</html>