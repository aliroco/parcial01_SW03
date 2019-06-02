/*Peticion al servidor para obtener las materias del estudiante*/
async function loadDoc(parCodigo){
    $.ajax({
    	url: 'getEstudiante.php',
    	data: { codigo:parCodigo },
    	type: 'GET',
    	success: function(respuesta){
    		loadMaterias(respuesta,parCodigo);
    	},
    	error: function(){
    		console.log("Error loadDoc - getEstudiante");
    		alert("No se ha podido obtener la información");
    	}
    });
}
/*Carga el sistema con la informacion del estudiante y sus materias*/
function loadMaterias(materiasJson, codigo){
	var materias  = JSON.parse(materiasJson); // Vector de Materias
	var semestres = []; // Vector para llevar el control de todos los semestres
	var div_semestre = $('[name="semestre"]').clone(); // Div plantilla para los semestre
	var div_materia = $('[name="materia"]').clone(); // Div plantilla para las materias

	$('#codigo_estudiante').find('h2').text(codigo); // Muestra el codigo en la parte superior

    /*Creamos dinamicamente los divs dependiendo del numero de semestre que se encuentren*/
	materias.forEach( function(valor, indice, array) {
    	if (!semestres.includes(valor.semestre)){
    		semestres.push(valor.semestre);
            var semestre = newSemestre(div_semestre.clone(),valor.semestre); // Llenamos el semestre con la informacion
    		semestre.appendTo('#contenedor');
    	}
	});
    /*Agregamos a sus divs correspondientes las materias*/
	materias.forEach( function(valor, indice, array) {
        var materia = newMateria(div_materia.clone(),valor.nombre,valor.credito,valor.codigo,valor.estado); // llenamos la materia con la informacion
    	materia.appendTo('#semestre_'+valor.semestre);
	});
}

/*recibe un div plantilla semestre, y lo retorna ya modificado con la informacion entrante*/
function newSemestre(objSemestre,semestre){
    objSemestre.attr("id","semestre_"+semestre);
    objSemestre.find('#numeroSemestre').text(semestre);
    objSemestre.css("display", "inline");
    return objSemestre;
}
/*recibe un div plantilla materia, y lo retorna ya modificado con la informacion de la materia*/
function newMateria(objMateria,nombre,credito,codigo,estado){
    objMateria.find('.mat_nombre').text(nombre);
    objMateria.find('.mat_credito').text('☆ '+credito);
    objMateria.find('.mat_codigo').text(codigo);
    objMateria.css("display","block");
    if(estado){
         objMateria.addClass("materia_inactiva");
    }
    return objMateria;
}
/*Peticion al servidor para cambiar el estado de un materia*/
async function modificarMateria(parCodigo,parMateria,parDivMateria){
	$.ajax({
    url: 'setMateria.php',
    data: { codigo:parCodigo , materia:parMateria },
    type: 'GET',
    success: function(respuesta){
        if(respuesta)
            $(parDivMateria).addClass("materia_inactiva");
        else
            $(parDivMateria).removeClass("materia_inactiva");
        new Audio("../rsc/ok_sound.mp3").play();
    },
    error: function(){
    	console.log("Error loadDoc - setMateria");
    	alert("No se ha podido obtener la información de la Materia");
    }
    });
}


/*Jquery*/
$(document).ready(function(){
/*Captura el codigo de la materia cuando esta se selecciona*/
$(".materia").click(function(){
        var materia = $(this).find('h4').text();
        var codigo = $('#codigo_estudiante').text();
        modificarMateria(codigo,materia,this);
 });

$("#btn-instrucciones").click(function(){
    if ($("#instrucciones").css('display') == 'none'){
        $("#instrucciones").show(500);
    }else{
        $("#instrucciones").hide(500);
    }
});

});
