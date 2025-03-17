//---------------------------------------------------------------------------
var $$ = jQuery.noConflict();
//------------------------------ FUNCION LOGIN -------------------------------
function login()
{
	$$.ajax
	({
		beforeSend: function(objeto)
		{
		 $$('#r').html('<img src="images/load_bar_black.gif">');
		 //alert('hola');
		},
		complete: function(objeto, exito)
		{
			//alert("Me acabo de completar")
			//if(exito=="success"){ alert("Y con éxito");	}
		},
		type: "POST",
		url: "procesosAjax/ajax_login.php",
		data: "user="+$$('#user').val()+"&pass="+$$('#pass').val(),
		error: function(objeto, quepaso, otroobj)
		{
			//alert("Estas viendo esto por que fallé");
			//alert("Pasó lo siguiente: "+quepaso);
		},
		success: function(datos)
		{ 
			//$$('#r2').html(datos); 
			if(datos == 'ok') $$(location).attr('href','index.php');
			else $$('#r').html("<p style='color:white'> <img src='images/excla_red.png '><b> El usuario no existe...!!!</b></p>"); 
		}
	});
}
//--------------------------------------------------------------------------------------
//CONTROL DE SESSION EN JQUERY
var timeSesion;

function inicio() { 
  timeSesion = setTimeout(function() { 
    $$(document).ready(function(e) {
    $$.ajax({
		url:'procesosAjax/sys_controlaSesion.php',
		type:'POST',
		data:{accion : 1},
		success: function(data){			
			if(data == 1)
			{
				alert("Sesion Caducada");
			        document.location.href='index.html';			   
			}			
		}	
		
	});
});
	},18000);//fin timeout
}//fin inicio

function reset() {
  clearTimeout(timeSesion);//limpia el timeout para resetear el tiempo desde cero 
  timeSesion = setTimeout(function() { 
    $$(document).ready(function(e) {
    $$.ajax({
		url:'procesosAjax/sys_controlaSesion.php',
		type:'POST',
		data:{accion : 1},
		success: function(data){			
			if(data == 1)
			{
			   alert("Sesion Caducada");
			   document.location.href='index.html';			   
			}			
		}	
		
	});
});
	},1800000);//fin timeout
}//fin reset
