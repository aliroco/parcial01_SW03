<?php
include 'saveEstudiante.php'; 

if(!isset($_GET["codigo"])){
	echo "Error al recibir el parametro codigo";
	exit(1);
}
$codigo = $_GET["codigo"];
$nombre_fichero = $codigo .'.json';

if (!file_exists($nombre_fichero)) {
	//Creamos archivo JSON
	createJsonFile($nombre_fichero);
}

$materias = file_get_contents($nombre_fichero);
//Responde con el Json Encontrado
echo $materias;

?>