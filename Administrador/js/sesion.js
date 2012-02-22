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

function validar_entero(valor){
	if(!presencia(valor))	return false;
	if(!(/[0-9]+$/.test(valor.value)))	return false;
    return true
}

function validarCedula(){
	var form = document.getElementById('formulario_verificar');
	if(validar_entero(form.cedula)){
		form.action = "php/admin.php";
		form.submit();
	}
	else	alert("Numero de Cédula inválido.");
	
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
	if(presencia(form.id) && presencia(form.clave) && presencia(form.nombre_completo) || form.opcion.value == 2){
		var parametros = "id="+form.id.value+"&clave="+form.clave.value+"&nombre_completo="+form.nombre_completo.value+"&sexo="+form.sexo.options[form.sexo.selectedIndex].value+"&telefono="+form.telefono.value+"&direccion="+form.direccion.value+"&servicio_id="+form.servicio_id.options[form.servicio_id.selectedIndex].value+"&tipo_profesional="+form.tipo_profesional.value+"&codigo_profesional="+form.codigo_profesional.value+"&rol="+form.rol.options[form.rol.selectedIndex].value+"&codigo="+form.codigo.value+"&opcion="+form.opcion.value;
		divResultado = document.getElementById('resultado');
		datos = "registro.php"
		envio_ajax(datos,divResultado,parametros)
	}
	else	alert("Campos incompletos.");
}

function modificar_campos(){
	var form = document.getElementById('formulario_cedula_nueva');
	if(validar_entero(form.cedula)){
		form.action = "admin.php";
		form.submit();
	}   
}

function eliminarUsuario(){
	var form = document.getElementById('formularioRegistroUsuario');
	if(presencia(form.id)){
		form.opcion.value = 2;
		form.action = "admin.php";
		form.submit();
	}
}


