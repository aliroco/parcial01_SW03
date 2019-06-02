<?php

include 'materia.php';

if(!isset($_GET["codigo"]) || !isset($_GET["materia"])){
	echo "Error: setMateria.php - Parametros GET";
	exit(1);
}

$codigo = $_GET["codigo"];
$materia_cod = $_GET["materia"];
$nombre_fichero = $codigo .'.json';

$jsonMaterias = file_get_contents($nombre_fichero);
$materias = json_decode($jsonMaterias,true);

/*Cambiamos el estado de la materia*/
foreach ($materias as $key => $value) {
	if(strcmp($value['codigo'],$materia_cod)==0){
		$materias[$key]['estado'] = strcmp($value['estado'],true)==0?false:true;
		echo $materias[$key]['estado'];
	}
}

/*Generamos y guardamos el JSON*/
$materias_json = json_encode($materias);
$fp = fopen($nombre_fichero,'w+');
fwrite($fp,$materias_json);
fclose($fp);

?>