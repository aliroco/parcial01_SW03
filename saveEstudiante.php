<?php
include 'materia.php';

function createJsonFile($nombre_archivo){
	$materias = array();

	/*Primer Semestre*/
	array_push($materias, new Materia("Calculo I","CA41",1,4));
	array_push($materias, new Materia("Introduccion","IT83",1,2));
	array_push($materias, new Materia("Lectura","LE28",1,1));
	array_push($materias, new Materia("FISH I","FH13",1,1));
	array_push($materias, new Materia("Laboratorio 1","LA21",1,2));
	array_push($materias, new Materia("Fundamentos","FD98",1,1));

	/*Segundo Semestre*/
	array_push($materias, new Materia("Calculo II","CA02",2,4));
	array_push($materias, new Materia("Algebra","AL23",2,4));
	array_push($materias, new Materia("Mecanica","ME76",2,3));
	array_push($materias, new Materia("FISH II","FH34",2,1));
	array_push($materias, new Materia("Programacion I","PR01",2,3));

	/*Tercer Semestre*/
	array_push($materias, new Materia("Calculo III","CA03",3,4));
	array_push($materias, new Materia("Electromagnetismo","EL32",3,4));
	array_push($materias, new Materia("Programacion II","PR02",3,3));
	array_push($materias, new Materia("FISH III","FH82",3,1));

	/*Cuarto Semestre*/
	array_push($materias, new Materia("Ecuaciones","EC72",4,4));
	array_push($materias, new Materia("Vibraciones","VR21",4,4));
	array_push($materias, new Materia("Programacion III","PR03",4,3));

	/*Quinto Semestre*/
	array_push($materias, new Materia("Bases de Datos","BD02",5,3));
	array_push($materias, new Materia("Software I","SW11",5,3));

	/*Generamos y guardamos el JSON*/
	$materias_json = json_encode($materias);
	$fp = fopen($nombre_archivo, 'w');
	fwrite($fp,$materias_json);
	fclose($fp);
}

?>