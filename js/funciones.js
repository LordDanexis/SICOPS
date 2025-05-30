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

//*****************************************************************************************************************************************
//***************************************************NUEVA PROGRAMACIÓN********************************************************************
//*****************************************************************************************************************************************


//**********************************FUNCION PARA CONVERTIR EN MAYÚSCULAS LOS CAMPOS ESCRITOS*********************************//
function convertirMayusculas() {
	const campo = document.getElementById("nombreU");
	campo.value = campo.value.toUpperCase();
}
//************************************* TERMINA FUNCION PARA ONVERTIR EN MAYÚSCULAS LOS CAMPOS ESCRITOS************************************************


//*************************************************FUNCIÓN QUE CAMBIA LOS SELECTS DINAMICO AL EDITAR UN USUARIO ********************************************************
  function selectDinamicoEditaUsuario() {
  const opciones = {
    "A.1": {
      nivel: ["N/A", "ALFONSO JAVIER ARREDONDO HUERTA", "DIANA TERESA SEDANO TOLEDO"],
      subdirector: {
        "ALFONSO JAVIER ARREDONDO HUERTA": ["N/A", "DANIELA ARMAS RENDÓN", "IVONNE CELIS MORALES"],
		"DIANA TERESA SEDANO TOLEDO": ["N/A"],
        "N/A": ["N/A"]
      },
      jefeDepto: ["N/A"],
      coordinador: ["N/A", "CUAUHTÉMOC CORREA SÁNCHEZ", "JAZMÍN RUIZ CÓRDOVA", "RAÚL ISRAEL MANCILLA SALAZAR", "JOSÉ MANUEL PALAFOX PICHARDO"]
    },
    "A.2": {
      nivel: ["N/A", "ISAID RODRÍGUEZ ESQUIVEL", "DIANA TERESA SEDANO TOLEDO"],
      subdirector: {
        "ISAID RODRÍGUEZ ESQUIVEL": ["N/A", "JAZMÍN ALEJANDRA ARRIAGA HERNÁNDEZ", "JORGE JIMÉNEZ SANTANA"],
		"DIANA TERESA SEDANO TOLEDO": ["N/A"],
        "N/A": ["N/A"]
      },
      jefeDepto: ["N/A", "IRVING ALCÁNTARA GONZÁLEZ", "MARIO JAIR HERNÁNDEZ IBAÑEZ",  "CARLO IVÁN MURAIRA TORRES"],
      coordinador: ["N/A", "JANIN JOUNUEN SILVA GONZÁLEZ"]
    },
    "ST": {
      nivel: ["DIANA TERESA SEDANO TOLEDO"],
      subdirector: {
        "DIANA TERESA SEDANO TOLEDO": ["N/A", "EUMIR FERNANDO ZALDIVAR JIMENEZ"]
      },
      jefeDepto: ["N/A", "DANIEL ALEXIS CARRASCO ARCINIEGA", "BEATRIZ MACHORRO NIEVES", "ISRAEL ESPINOSA RAMOS"],
      coordinador: ["N/A"]
    },
    "A": {
      nivel: ["N/A", "DIANA TERESA SEDANO TOLEDO"],
      subdirector: {
		"DIANA TERESA SEDANO TOLEDO": ["N/A"],
        "N/A": ["N/A"]
      },
      jefeDepto: ["N/A"],
      coordinador: ["N/A"]
    }
  };

  document.getElementById("nivel").addEventListener("change", function () {
    const nivel = this.value;
    const directorSelect = document.getElementById("director");
    const subdirectorSelect = document.getElementById("subdirector");
    const jefeDeptoSelect = document.getElementById("jefeDepto");
    const coordinadorSelect = document.getElementById("coordinador");

    directorSelect.innerHTML = '<option value="" selected disabled>Selecciona un director de área...</option>';
    subdirectorSelect.innerHTML = '<option value="" selected disabled>Selecciona un subdirector de área...</option>';
    jefeDeptoSelect.innerHTML = '<option value="" selected disabled>Selecciona un jefe departamento...</option>';
    coordinadorSelect.innerHTML = '<option value="" selected disabled>Selecciona un coordinador...</option>';

    if (nivel && opciones[nivel]) {
      opciones[nivel].nivel.forEach(director => {
        const option = document.createElement("option");
        option.value = director;
        option.textContent = director;
        directorSelect.appendChild(option);
      });

      opciones[nivel].jefeDepto.forEach(jefeDepto => {
        const option = document.createElement("option");
        option.value = jefeDepto;
        option.textContent = jefeDepto;
        jefeDeptoSelect.appendChild(option);
      });

      opciones[nivel].coordinador.forEach(coordinador => {
        const option = document.createElement("option");
        option.value = coordinador;
        option.textContent = coordinador;
        coordinadorSelect.appendChild(option);
      });
    }
  });

  document.getElementById("director").addEventListener("change", function () {
	  const director = this.value;
	  const nivel = document.getElementById("nivel").value;
	  const subdirectorSelect = document.getElementById("subdirector");
	  
    subdirectorSelect.innerHTML = '<option value="" selected disabled>Selecciona un subdirector de área...</option>';
	
    if (nivel && director && opciones[nivel].subdirector[director]) {
		opciones[nivel].subdirector[director].forEach(subdirector => {
			const option = document.createElement("option");
			option.value = subdirector;
			option.textContent = subdirector;
			subdirectorSelect.appendChild(option);
		});
    }
});
}
//***************************************TERMINA FUNCIÓN QUE CAMBIA LOS SELECTS DINAMICO AL EDITAR UN USUARIO ********************************************************

//****************FUNCION QUE HABILITA EL BOTON PARA ABRIR EL MÓDAL DE ALTA PRESUNTO CUANDO HAY TEXTO INGRESADO EN EL CAMPO DE NÚMERO DE ACCIÓN************************
function activarModalAltaPresunto() {
	document.getElementById('campo1').addEventListener('input', function() {
		const inputText = document.getElementById('campo1').value;
		const submitButton = document.getElementById('altapresunto');
		submitButton.disabled = inputText.trim() === '';
		var input = document.getElementById('campo1');
		completarCamposAltraPRA(input.value);//esta funcion le manda a llamar a completarCamposAltraPRA: la cuaúl despliega los campos 
	});
}
//********TERMINA FUNCION QUE HABILITA EL BOTON PARA ABRIR EL MÓDAL DE ALTA PRESUNTO CUANDO HAY TEXTO INGRESADO EN EL CAMPO DE NÚMERO DE ACCIÓN************************

//***********FUNCIÓN PARA BUSCAR LOS DATOS DEL NÚMERO DE ACCION AL BUSCAR POR CLAVE Y DESPLIEGA LA: CP, NO. DE AUDITORIA, NO. DE EPRA, Y LA ENTIDAD ********************

function completarCamposAltraPRA(){

	$(document).ready(function() {
		$('#campo1').autocomplete({
			source: 'busquedaDatos.php',
			select: function(event, ui) {
				$('#campo2').val(ui.item.campo2);
				$('#campo3').val(ui.item.campo3);
				$('#campo4').val(ui.item.campo4);
				$('#campo5').val(ui.item.campo5);
			}
		});
	});
}
//*************************************** TERMINA FUNCIÓN PARA COMPLETAR LOS CAMPOS AL DAR DE ALTA EL EPRA*************************************************************

//***************************************FUNCIÓN PARA SACAR EL NÚMERO DE MODALES DEPENDIENDO LOS PRESUNTOS QUE SELECCIONA EL USUARIO **********************************
// function modals() {
// 	document.getElementById('nopresuntos').addEventListener('change', function() {
// 		var numPresuntos = this.value;
// 		var modalContainer = document.getElementById('modalContainer');
// 		modalContainer.innerHTML = ''; // Limpiar el contenedor de modales
	
// 		for (var i = 0; i < numPresuntos; i++) {
// 			var modalClone = document.getElementById('formModal').cloneNode(true);
// 			modalClone.id = 'formModal' + i;
// 			modalContainer.appendChild(modalClone);
// 			var modal = new bootstrap.Modal(modalClone);
// 			modal.show();
// 		}
// 	});
// 	}
//*************************************** TERMINA FUNCIÓN PARA SACAR EL NÚMERO DE MODALES DEPENDIENDO LOS PRESUNTOS QUE SELECCIONA EL USUARIO**************************

//*************************FUNCIÓN PARA AUTOCOMPLETAR LOS CHECKBOXES AL SELECCIONAR EL TIPO FALTA ADMINISTRATIVA DEL PRESUNTO EN LA ALTA DEL PRA***********************
function updateCheckboxes(option) {
	// Contenedor de los checkboxes
	var checkboxesContainer = document.getElementById("checkboxesContainer");
	checkboxesContainer.innerHTML = ""; // Limpiar los checkboxes existentes

	// Realizar una solicitud AJAX para obtener los datos
	var xhr = new XMLHttpRequest();
	xhr.open("GET", "../presuntos/Alta_Presuntos/faltas_checkboxes.php?option=" + option, true);
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			var data = JSON.parse(xhr.responseText);
			var row;

			for (var i = 0; i < data.length; i++) {
				if (i % 3 === 0) {
					row = document.createElement("div");
					row.className = "row mb-2";
					checkboxesContainer.appendChild(row);
				}

				var col = document.createElement("div");
				col.className = "col";

				var checkboxDiv = document.createElement("div");
				checkboxDiv.className = "form-check";

				var checkbox = document.createElement("input");
				checkbox.type = "checkbox";
				checkbox.className = "form-check-input";
				checkbox.name = "checks[]";
				checkbox.value = data[i];
				checkboxDiv.appendChild(checkbox);

				var label = document.createElement("label");
				label.className = "form-check-label";
				label.innerHTML = data[i];
				checkboxDiv.appendChild(label);

				col.appendChild(checkboxDiv);
				row.appendChild(col);
			}
		}
	};
	xhr.send();
}
//********************TERMINA FUNCIÓN PARA AUTOCOMPLETAR LOS CHECKBOXES AL SELECCIONAR EL TIPO FALTA ADMINISTRATIVA DEL PRESUNTO EN LA ALTA DEL PRA********************

//****************************************FUNCION QUE PASA LA CLAVE DE ACCIÓN AL MODAL DE DAR ALTA LOS PRESUNTOS*******************************************************/
function showModal() {
	var text = document.getElementById('textInput').value;
	document.getElementById('modalText').innerText = text;
	$('#textModal').modal('show');
}
//*********************************************TERMINA LA FUNCION QUE PASA LA CLAVE DE ACCIÓN AL MODAL DE DAR ALTA LOS PRESUNTOS**************************************/

//*******************************************************************NUEVA FUNCIÓN A PROBAR **************************************************************************/




 

