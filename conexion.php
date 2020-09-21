<?php
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'agenda';

	$conn = @mysqli_connect($host,$user,$password,$db); /* @ => Cuando se antepone a una expresión, cualquier 
																mensaje de error que pueden ser generado por 
																esa expresión será ignorado.
														*/
	if(!$conn){
		echo "Error en la conexión";
	}