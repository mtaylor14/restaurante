<!DOCTYPE html>
<html lang="es">
	<head>

		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	    <title style="">Generar pdf</title>
	    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	    <script type="text/javascript" src="js/file_javascript.js"></script>
	</head>


	<body background="fondo.jpg" style="background-repeat: no-repeat;">
		<section>
			<form method="post" id="form_id_registrar" action="registrar.php">
				<fieldset style="margin: 55px;">
					<legend style="text-align: center; font:Times-Roman; font-size: 20pt;border-radius:15px;color:#FB9108 ; background:#FAF7F3">Datos de facturación</legend>

	<!--------------------------   RFC   ------------------------->
<div style="margin: 40px;  padding:10px;">
<tr><td><label style="font-size: 14pt; color:#0B0036"><b>RFC: </b></label></td>
<td width=80> <input type="text" name="rfc" id="rfc" style="border-radius:15px; width: 200px; height: 25px;"></td></tr>
					</div>

<!--------------------------   Razon social  ------------------------->
<div style="margin: -14px;  padding:-15px">
<tr><td><label style="font-size: 14pt; color:#0B0036"><b>Razon Social: </b></label></td>
<td width=80> <input type="text" name="razon_social" id="razon_social" style="border-radius:15px; width: 200px; height: 25px;"></td></tr>

					</div>
                    </br>

</br>

<!--------------------------- Direccion  ------------------------------->

<div style="margin: 13px;  padding:-15px">
<tr><td><label style="font-size: 14pt; color:#0B0036"><b>Direccion: </b></label></td>
<td width=80> <input type="text" name="direccion" id="direccion" style="border-radius:15px; width: 200px; height: 25px;"></td></tr>

					</div>




<!------------------------------ Codigo Postal (cp) ---._.---------------------------->

<div style="margin: 33px 0 0 63px;">
<tr><td><label style="font-size: 14pt; color:#0B0036"><b>CP: </b></label></td>
<td width=80> <input type="text" name="cp" id="cp" style="border-radius:15px;width: 200px; height: 25px;"></td></tr>

					</div>


<!--------------------------------- CDFI --------._.---------------------------->

<div style="margin: 38px 0 0 41px;">
<tr><td><label style="font-size: 14pt; color:#0B0036"><b>CDFI: </b></label></td>
<td width=80> <input type="text" name="cdfi" id="cdfi" style="border-radius:15px;width: 200px; height: 25px;"></td></tr>

					</div>

<!--------------------------------- Concepto --------._.---------------------------->
<div style="margin: 38px 0 0 11px;">
<tr><td><label style="font-size: 14pt; color:#0B0036"><b>Concepto: </b></label></td>
<td width=80> <input  type="text" name="concepto" id="concepto" style="border-radius:15px;  width: 200px; height: 25px;"></td></tr>



<!--------------------------------- !!!!!""""# ------------------------------------>



		 		</fieldset>
<center>
		<div>

<input style="padding: 10px;font-weight: 600;font-size: 20px;color: #ffffff;
 background-color:#FFA943;border-radius: 6px;border: 2px solid #000000;"
 type="submit" value="Registrar y generar pdf" name="generar" id="btn_generar">

			 	</div>

</center>
			</form>
		</section>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					$('#form_id_registrar').submit(function(e) {
						e.preventDefault();
						$.ajax({
							type: "post",
							url: 'registrar.php',
							data: $(this).serialize(),
							success: function(response)
							{
								response = JSON.parse(response)
								if(response.errores) {
									Swal.fire({
										icon: 'error',
										title: 'Generar pdf',
										html: response.errores
									})
								} else {
									if(response.status == 1) {
										Swal.fire({
											icon: 'success',
											title: 'Generar PDF',
											text: 'Registro completado, favor de presionar el botón para descargar el pdf.',
											confirmButtonText: 'Descargar PDf',
											showLoaderOnConfirm: true,
											preConfirm: function () {
												$.ajax({
													url: 'controllers/crearpdf.php',
													type: 'GET',
													xhrFields: {
														responseType: 'blob'
													},
													success: function (data) {
														debugger
														var a = document.createElement('a');
														var url = window.URL.createObjectURL(data);
														a.href = url;
														a.download = 'ejemplo_generar.pdf';
														document.body.append(a);
														a.click();
														a.remove();
														window.URL.revokeObjectURL(url);
														limpiarFormulario();
													}
												})
											}
										})
									}else {
										if(response.status == 2)
										{
											Swal.fire({
												icon: 'warning',
												title: 'Generar PDF',
												text: 'Empresa o institución ya registrada'
											})
										} else {
											Swal.fire({
												icon: 'error',
												title: 'Generar PDF',
												text: 'Ocurrió un error al realizar su registro, favor de volver a intentar'
											})
										}
									}
								}
							}
						});
					});
				});
			</script>
	</body>
</html>
