<!DOCTYPE html>
<?php
	echo "<script>\n";
	echo "var codigo_est= '".$_POST['codigo']."'\n";
	echo "</script>\n";
?>

<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/styles.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/script.js"></script>
	<script type="text/javascript">
		loadDoc(codigo_est);
	</script>
	<title>Pensum / Plan de estudio</title>
</head>
<body>
	<!--Header con divs del titulo y otro div donde se muestra en pantalla el codigo del usuario ingresado -->
	<header class="header-pensum">
			<div id="title-pensum"><h1>PENSUM / PLAN DE ESTUDIO</h1></div>
			<div id="codigo_estudiante"><img src="rsc/man_icon.png"><h2></h2></div>
	</header>
	<section>
		<!--Contenedor de todos los divs de semestre -->
		<div id = "contenedor">
			<!-- divs de los semestres -->
			<div name ="semestre" class = "semestre"><h1>Semestre</h1>
				<dir class = "numsemestre"><h1 id="numeroSemestre" >1</h1></dir>
				<!-- divs de las materias -->
					<div name="materia" class = "materia">
						<h2 class="mat_nombre">Materia</h2>
						<h3 class="mat_credito">#</h3>
						<h4 class="mat_codigo">#</h4>
					</div>
			</div>	
			<!--fin divs semestres -->
		</div>		
	</section>
	<footer>
		<div id="instrucciones">
			<p>
				Las materias están agrupadas por semestre, una estrella indica los créditos, en la parte inferior su código.<br>
				<b>El color verde representa las materias sin terminar</b>, para marcarlas como terminadas debe hacer clic encima de esta, <b>el color gris indicara que ya esta terminada.</b>
			</p>
		</div>
		<div class="contenedor-footer">
			<a href="index.html"><button id="btn-regresar" class="button-footer" type="button">Regresar</button></a>
			<button id="btn-instrucciones" class="button-footer" type="button">Instrucciones</button>
		</div>.
		<div class="creditos-footer">
			<p>
				Desarollado por Aliro Correa(aliriocorrea@unicauca.edu.co) y Johan Camilo Paz(pjhoan@unicauca.edu.co)
				<br>Universidad del Cauca | Popayán-Colombia | 2019
			</p>
		</div>
	</footer>
</body>
</html>