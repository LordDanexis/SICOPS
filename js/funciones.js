// JavaScript Document
function mostrarCuadro(alto,ancho,titulo,top,pagina,datos)
{
	this.alto = new Number(alto);
	this.ancho = new Number(ancho);
	this.titulo = new String(titulo);
	this.top = new Number(top);
	this.pagina = String(pagina);
	this.datos = String(datos);
	
	$$('#cuadroRes').html('<center><img src="images/load_bar.gif" style="margin:100px 0"></center>');
	document.getElementById('cuadroTitulo').innerHTML = this.titulo;
	this.cuadro = document.getElementById('cuadroDialogo');	
	this.cuadroRes = document.getElementById('cuadroRes');	
	this.cuadro.style.height = this.alto+"px";
	this.cuadroRes.style.height = (this.alto-50)+"px";
	this.cuadro.style.width = this.ancho+"px";
	this.cuadro.style.marginLeft = this.ancho-(this.ancho*1.5)+"px"; // mientras mas alto mas a la izquierda
	
	if(this.top != 0 || this.top != '') this.cuadro.style.top = this.top+"px";
			
	$$("#fondoOscuro").fadeIn();
	$$("#cuadroDialogo").fadeIn();
	
	if(this.pagina != '' || this.pagina != 'undefined') $$("#cuadroRes").load(this.pagina+"?"+this.datos);
	if(this.pagina == 'undefined') $$('#cuadroRes').html(" ");
}
function cerrarCuadro()
{
	$$("#fondoOscuro").fadeOut();
	$$("#cuadroDialogo").fadeOut();
}
//---------------------------------------------------------------------------------------------------------------------------
function mostrarCuadro2(alto,ancho,titulo,top,pagina,datos)
{
	this.alto = new Number(alto);
	this.ancho = new Number(ancho);
	this.titulo = new String(titulo);
	this.top = new Number(top);
	this.pagina = String(pagina);
	this.datos = String(datos);
	
	$$('#cuadroRes2').html('<center><img src="images/load_bar.gif" style="margin:100px 0"></center>');
	document.getElementById('cuadroTitulo2').innerHTML = this.titulo;
	this.cuadro = document.getElementById('cuadroDialogo2');	
	this.cuadroRes = document.getElementById('cuadroRes2');	
	this.cuadro.style.height = this.alto+"px";
	this.cuadroRes.style.height = (this.alto-70)+"px";
	this.cuadro.style.width = this.ancho+"px";
	this.cuadro.style.marginLeft = this.ancho-(this.ancho*1.5)+"px"; // mientras mas alto mas a la izquierda
	
	if(this.top != 0 || this.top != '') this.cuadro.style.top = this.top+"px";
			
	$$("#fondoOscuro2").fadeIn();
	$$("#cuadroDialogo2").fadeIn();
	
	if(this.pagina != '' || this.pagina != 'undefined') $$("#cuadroRes2").load(this.pagina+"?"+this.datos);
	if(this.pagina == 'undefined') $$('#cuadroRes2').html(" ");
}
function cerrarCuadro2()
{
	$$("#fondoOscuro2").fadeOut();
	$$("#cuadroDialogo2").fadeOut();
}
//---------------------------------------------------------------------------------------------------------------------------
function mostrarCuadro3(alto,ancho,titulo,top,pagina,datos)
{
	this.alto = new Number(alto);
	this.ancho = new Number(ancho);
	this.titulo = new String(titulo);
	this.top = new Number(top);
	this.pagina = String(pagina);
	this.datos = String(datos);
	
	$$('#cuadroRes3').html('<center><img src="images/load_bar.gif" style="margin:100px 0"></center>');
	document.getElementById('cuadroTitulo3').innerHTML = this.titulo;
	this.cuadro = document.getElementById('cuadroDialogo3');	
	this.cuadroRes = document.getElementById('cuadroRes3');	
	this.cuadro.style.height = this.alto+"px";
	this.cuadroRes.style.height = (this.alto-70)+"px";
	this.cuadro.style.width = this.ancho+"px";
	this.cuadro.style.marginLeft = this.ancho-(this.ancho*1.5)+"px"; // mientras mas alto mas a la izquierda
	
	if(this.top != 0 || this.top != '') this.cuadro.style.top = this.top+"px";
			
	$$("#fondoOscuro3").fadeIn();
	$$("#cuadroDialogo3").fadeIn();
	
	if(this.pagina != '' || this.pagina != 'undefined') $$("#cuadroRes3").load(this.pagina+"?"+this.datos);
	if(this.pagina == 'undefined') $$('#cuadroRes3').html(" ");
}
function cerrarCuadro3()
{
	$$("#fondoOscuro3").fadeOut();
	$$("#cuadroDialogo3").fadeOut();
}
//---------------------------------------------------------------------------------------------------------------------------

function comprobarForm(form,estado,volantes,oficios,cral,SolventacionBaja)
{
	
	var mensaje = "Los Campos Marcados en Color Rojo son Obligatorios";
	var elementos = "";
	var error = 0;
	var adver = 0;
	frm = document.forms[form];
	for(i=0; ele=frm.elements[i]; i++)
	{
		//elementos += " Nombre = "+ele.name+" | Tipo = "+ele.type+" | Valor = "+ele.value+"\n";
		if((ele.value == ' ' || ele.value == '' || ele.value == 'nada') && (ele.type != 'button' && ele.type != 'hidden' && ele.type != 'image') && (ele.disabled == false))
		{
			mensaje += '\n - '+ele.name;	
			document.getElementById(ele.name).style.borderColor = 'red';
			error++;	
		} 		 
		if((ele.value != '') && (ele.type != 'button' && ele.type != 'hidden' && ele.type != 'image') && (ele.disabled == false))
			document.getElementById(ele.name).style.borderColor = 'silver';
	}
//----------------------------------------------------------------------------
	if(error != 0)
	{
			alert(mensaje);
			return false;
	}
	else 
	{
		//-------------------------
		if(estado != null)
		{
			if(estado == 2) var newEdo = "OPINIÓN PARA EMISION / CORRECCIÓN DEL PLIEGO";
			if(estado == 3) var newEdo = "DEVOLUCIÓN DEL PPO";
			if(estado == 4 || estado == 5) var newEdo = "EN PROCESO DE NOTIFICACION";
			if(estado == 6) var newEdo = "NOTIFICADO";
			if(estado == 7) var newEdo = "ET, PO Y OFICIOS NOTIFICADOS REMITIDOS A LA UAA";
			if(estado == 8) var newEdo = "";
			if(estado == 9) var newEdo = "";
			if(estado == 10) var newEdo = "";
			
			  var advertencia = 'La accion cambiara a: \n \n - '+newEdo;
			  advertencia += "\n \n ¿Desea Continuar?";
			  
			  var res = confirm(advertencia);
			  if(res == true) 
			  { 
			    if(correo != '') window.location = correo;
			  	frm.submit(); 
			  }
			  else { return false }
		}
		return true;
	}
}

//**********************ESTA FUNCIÓN  COMPLETA LOS CAMPOS AL SELECCIÓNAR EL ÁREA DEL MÓDULO DE ALTA PRA************************************* 

function completarCampos() {
	const select = document.getElementById("direccion");
	const director = document.getElementById("director");
	const subdirector = document.getElementById("subdirector");
	
	switch (select.value) {
	  case "A.1":
		director.value = "Alfonso Javier Arredondo Huerta";
		subdirector.value = "Alfonso Javier Arredondo Huerta";
		break;
	  case "A.2":
		director.value = "Isaid Rodríguez Esquivel";
		subdirector.value = "Alfonso Javier Arredondo Huerta";
		break;
	  default:
		campo1.value = "";
		campo2.value = "";
	}
  }
  //*******************TERMINA FUNCIÓN  COMPLETA LOS CAMPOS AL SELECCIÓNAR EL ÁREA DEL MÓDULO DE ALTA PRA************************************* 

//**********************ESTA FUNCIÓN  COMPLETA LOS CAMPOS DEL Subdirector Adscrito: AL SELECCIÓNAR EL ÁREA DEL MÓDULO DE EDITAR USUARIO************************************* 

function completarCamposUsuarios() {
	const datos = {
		"A.1": ["Daniela Armas Rendón", "Ivonne Celis Morales"],
		"A.2": ["Jazmín Alejandra Arriaga Hernández", "Jorge Jiménez Santana"],
		"A":   ["Diana Teresa Sedano Toledo"],
		"ST":  ["Eumir Fernando Zaldívar Jiménez"],
		"C":   ["Gustavo Rios Castro"],

	};

	// Función para actualizar el segundo select

		const nivel = document.getElementById("nivel");
		const subAdscrito = document.getElementById("subAdscrito");
		const seleccion = nivel.value; // Valor seleccionado

		// Limpia las opciones actuales
		subAdscrito.innerHTML = "";

		// Agrega las opciones nuevas
		if (datos[seleccion]) {
			datos[seleccion].forEach(function(opcion) {
				const nuevaOpcion = document.createElement("option");
				nuevaOpcion.value = opcion;
				nuevaOpcion.textContent = opcion;
				subAdscrito.appendChild(nuevaOpcion);
			});
		}
  }
  //*******************TERMINA FUNCIÓN  COMPLETA LOS CAMPOS DEL Subdirector Adscrito: AL SELECCIÓNAR EL ÁREA DEL MÓDULO DE EDITAR USUARIO************************************* 

  //**********************ESTA FUNCIÓN  COMPLETA LOS CAMPOS DEL Subdirector Adscrito: AL SELECCIÓNAR EL ÁREA DEL MÓDULO DE EDITAR USUARIO************************************* 

function completarCamposUsuariosJD() {
	const datos = {
		"Daniela Armas Rendón": ["Cuauhtémoc Correa Sánchez", "Jazmín Ruiz Córdova"],
		"Ivonne Celis Morales": ["Raúl Israel Mancilla Salazar", "José Manuel Palafox Pichardo"],
		"Jazmín Alejandra Arriaga Hernández": ["Irving Alcántara González Machorro Nieves", "Mario Jair Hernández Ibañez"],
		"Jorge Jiménez Santana":["Janin Jounuen Silva González", "Carlo Iván Muraira Torres"],
		"Gustavo Rios Castro":["Gustavo Rios Castro"],
		"Eumir Fernando Zaldívar Jiménez":["Eumir Fernando Zaldívar Jiménez"]
	};

	// Función para actualizar el segundo select

		const subAdscrito = document.getElementById("subAdscrito");
		const jefeAdscrito = document.getElementById("jefeAdscrito");
		const seleccion = subAdscrito.value; // Valor seleccionado

		// Limpia las opciones actuales
		jefeAdscrito.innerHTML = "";

		// Agrega las opciones nuevas
		if (datos[seleccion]) {
			datos[seleccion].forEach(function(opcion) {
				const nuevaOpcion = document.createElement("option");
				nuevaOpcion.value = opcion;
				nuevaOpcion.textContent = opcion;
				jefeAdscrito.appendChild(nuevaOpcion);
			});
		}
  }
  //*******************TERMINA FUNCIÓN  COMPLETA LOS CAMPOS DEL Subdirector Adscrito: AL SELECCIÓNAR EL ÁREA DEL MÓDULO DE EDITAR USUARIO************************************* 

  //**********************************FUNCION PARA ONVERTIR EN MAYÚSCULAS LOS CAMPOS ESCRITOS*********************************//
  function convertirMayusculas() {
	const campo = document.getElementById("nombre");
	campo.value = campo.value.toUpperCase();
}

// function convertirFormularioMayusculasAltaOficios() {
// 	// Seleccionar todos los elementos del formulario
// 	let elementos = document.querySelectorAll('#oficioForm input, #oficioForm textarea');
// 	// Iterar sobre los elementos y convertir a mayúsculas
// 	elementos.forEach(function(elemento) {
// 		if (elemento.type === 'text' || elemento.tagName === 'TEXTAREA') {
// 			elemento.value = elemento.value.toUpperCase();
// 		}
// 	});
// }

  //************************************* TERMINA FUNCION PARA ONVERTIR EN MAYÚSCULAS LOS CAMPOS ESCRITOS************************************************

//********************************** FUNCIÓN QUE TE DA POR DEFECTA LAS FUNCIONES AL SELECCIONAR DIRECCIÓN EN LA ALTA DEL PRA*****************************

function seleccionDireccion(){

const opciones = {
	"A.1": {
	  directores: ["Alfonso Javier Arredondo Huerta"],
	  subdirector: {
		"Alfonso Javier Arredondo Huerta": ["Daniela Armas Rendón", "Ivonne Celis Morales"]
		// "[Nombre del Director]": ["Nombre de los subdirectores"],
	  },
	  jefeDepto: ["Cuauhtémoc Correa Sánchez", "Jazmín Ruiz Córdova", "Raúl Israel Mancilla Salazar", "José Manuel Palafox Pichardo"]
	},
	"A.2": {
	  directores: ["Isaid Rodríguez Esquivel"],
	  subdirector: {
		"Isaid Rodríguez Esquivel": ["Jazmín Alejandra Arriaga Hernández", "Jorge Jiménez Santana"]
		// "[Nombre del Director]": ["Nombre de los subdirectores"],
	  },
	  jefeDepto: ["Irving Alcántara González Machorro Nieves", "Mario Jair Hernández Ibañez","Janin Jounuen Silva González", "Carlo Iván Muraira Torres"]
	}
  };
  
  // Función para actualizar el segundo select
  document.getElementById("direccion").addEventListener("change", function () {
	const direccion = this.value;
	const directorSelect = document.getElementById("director");
	const subdirectorSelect = document.getElementById("subdirector");
	const jefeDeptoSelect = document.getElementById("jefeDepto");
  
	// Limpiar selects dependientes
	directorSelect.innerHTML = '<option value="" selected disabled>Selecciona la dirección del PRA...</option>';
	subdirectorSelect.innerHTML = '<option value="" selected disabled>Selecciona un Director de Área...</option>';
	jefeDeptoSelect.innerHTML = '<option value="" selected disabled>Selecciona un Subdirector de Área...</option>';
  
	if (direccion && opciones[direccion]) {
	  // Llenar subcategorías
	  opciones[direccion].directores.forEach(director => {
		const option = document.createElement("option");
		option.value = director;
		option.textContent = director;
		directorSelect.appendChild(option);
	  });
  
	  // Llenar extras
	  opciones[direccion].jefeDepto.forEach(jefeDepto => {
		const option = document.createElement("option");
		option.value = jefeDepto;
		option.textContent = jefeDepto;
		jefeDeptoSelect.appendChild(option);
	  });
	}
  });
  
  // Función para actualizar el tercer select
  document.getElementById("director").addEventListener("change", function () {
	const director = this.value;
	const direccion = document.getElementById("direccion").value;
	const subdirectorSelect = document.getElementById("subdirector");
  
	subdirectorSelect.innerHTML = '<option value="" selected disabled>Selecciona un Jefe de Departamento...</option>';
  
	if (direccion && director && opciones[direccion].subdirector[director]) {
	  opciones[direccion].subdirector[director].forEach(producto => {
		const option = document.createElement("option");
		option.value = producto;
		option.textContent = producto;
		subdirectorSelect.appendChild(option);
	  });
	}
  });
}

  //*************************************** TERMINA FUNCIÓN QUE TE DA POR DEFECTA LAS FUNCIONES AL SELECCIONAR DIRECCIÓN ******************************

  function cerrarMsg()
{
	$$("#message-green").fadeOut();
}

 //------------------- PESTAÑAS -------------------
function ocultaAll() 
{
	$$('.todosContPasos').removeClass("pActivo");
	$$('.todosContPasos').hide();
	$$('.todosPasos').removeClass("pasosActivo");
	$$('.todosNP').removeClass('noPasoActivo');
	$$('.todosNP').addClass('noPaso'); 
} 
function muestraPestana(divId)
{
	ocultaAll();
	$$('#p'+divId).removeClass('pInactivo');
	
	$$('#p'+divId).addClass('pActivo');	
	$$('#paso'+divId).addClass('pasosActivo'); 
	$$('#np'+divId).addClass('noPasoActivo');
		
	$$('#p'+divId).fadeIn();
}
function verPdf(archivo)
{
 new mostrarCuadro2(600,800,"Visor de Documento "+archivo,10,"cont/po_verPdf.php","archivo="+archivo);//alto,ancho,titulo,top,pagina,datos
}
