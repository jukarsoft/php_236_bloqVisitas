<?php
	//inicializar variables
	$fcontenido=null;
	$comentarios=null;
	$nombre=$textarea=$fecha=$linea=null;
	//comprobar si existe el fichero
	$fichero = fopen('php_236_bloq.txt','a+');
		
	//comprobar si se ha pulsado enviar
	if (isset($_POST['enviar'])) {
		//recuperar datos del formulario
		$nombre=$_POST['nombre'];
		$textarea=$_POST['comentarios'];
		$fecha=date("j-n-y");
		//confeccionar el  mensaj con el formato especificado (saltos de linea con <br>)
		$linea.="$nombre escribió el $fecha <br>$textarea <br>";
	}

		//recuperar contenido del fichero  en una variable
	while (!feof($fichero)) {
		//gets linea a linea
		$fcontenido.= fgets($fichero);
	}
		$comentarios.=$linea.$fcontenido;
	//escribir el fichero
	fwrite($fichero,$linea);
	fclose($fichero);

	//touch('file') para crear fichero
	//unline('file') para borrar fichero
	
?>
<html>
<head>
	<title>visibilidad</title>
	<meta charset='UTF-8'>
</head>
<body>
	<center><h3>Escritura en ficheros</h3></center>
	<div style="width:700px; background: white; margin:auto; border:1px solid black; padding:20px; border-radius:10px;">
		<form method="post" action="#">
			<input type="text" name="nombre" placeholder="nombre" required /><br><br>
			<textarea style="width:300px; height:100px" name="comentarios"></textarea><br><br>
			
			<input type="submit" name="enviar" value="Enviar" />
		</form>
		<h3>Comentarios: </h3>
		<p><?=$comentarios;?></p>
	</div>	
</body>
</html>