/**************
Funciones AJAX
**************/
function Ajax(){
		var xmlhttp=false;
        try	{   xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
                try {   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (E) {    xmlhttp = false;
                }
        }
        if (!xmlhttp && typeof XMLHttpRequest!='undefined') {    xmlhttp = new XMLHttpRequest();   }
        return xmlhttp;
}

function envio_ajax(datos,divResultado,parametros){
	ajax=Ajax();
	ajax.open("POST", datos,true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(parametros);
}

/**********************
Funciones de validacion
**********************/
function presencia(valor){
	if (valor.value.length == 0)	return false;
	return true;
}

function Autenticar(){
	var form = document.getElementById('formularioIngreso');
	if(presencia(form.id) && presencia(form.clave)){
		var parametros = "id="+form.id.value+"&clave="+form.clave.value;
		divResultado = document.getElementById('resultado');
		datos = "php/verificar.php"
		envio_ajax(datos,divResultado,parametros)
	}
	else	alert("Id y/o clave incorrectos.");
}

function GuardarCambiosUsuario(){
	var form = document.getElementById('formularioRegistroUsuario');
	if(presencia(form.id) && presencia(form.clave) && presencia(form.nombre_completo)){
		var parametros = "id="+form.id.value+"&clave="+form.clave.value+"&nombre="+form.nombre_completo.value+"&sexo="+form.sexo.options[form.sexo.selectedIndex].value+"&telefono="+form.telefono.value+"&direccion="+form.direccion.value+"&servicio="+form.servicio.options[form.servicio.selectedIndex].value+"&tipo_profesional="+form.tipo_profesional.value+"&codigo_profesional="+form.codigo_profesional.value+"&rol="+form.rol.options[form.rol.selectedIndex].value+"&codigo_medico="+form.codigo_medico.value;
		divResultado = document.getElementById('resultado');
		datos = "registro.php"
		envio_ajax(datos,divResultado,parametros)
	}
	else	alert("Id y/o clave incorrectos.");
}

