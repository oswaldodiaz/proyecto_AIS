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

function validar_string(string){
	if(!presencia(string))	return false;
	if(!(/[a-z,A-Z]+$/.test(string.value)))	return false;
    return true
}

function id_especial(max){
	var form = document.getElementById('formulario_verificar');
	form.cedula.value = max;
	form.action = "php/taquillero.php";
	form.submit();
}


function validarCedula(){
	var form = document.getElementById('formulario_verificar');
	if(validar_entero(form.cedula)){
		form.action = "php/taquillero.php";
		form.submit();
	}
	else	alert("Numero de Cédula inválido.");
	
}

function validar_fecha(fecha){
    var Fecha= new String(fecha.value);
    var Dia= new String(Fecha.substring(Fecha.lastIndexOf("-")+1,Fecha.length));
    var Mes= new String(Fecha.substring(Fecha.indexOf("-")+1,Fecha.lastIndexOf("-")));
    var Ano= new String(Fecha.substring(0,Fecha.indexOf("-")));
	if(Dia == "00" && Mes == "00" && Ano == "0000")	return false;
	return true;
}
/***********************
Funciones de formularios
***********************/
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

/**********************
Funciones de Taquillero
**********************/
function modificar_campos(){
	var form = document.getElementById('formulario_cedula_nueva');
	if(validar_entero(form.cedula)){
		form.action = "taquillero.php";
		form.submit();
	}   
}

function ValidarFormularioPaciente(form){
	if(validar_entero(form.numero_historia) && validar_string(form.nombre_completo) && validar_string(form.primer_apellido) && validar_string(form.segundo_apellido) && validar_string(form.nombre_padre) && validar_string(form.nombre_madre) && validar_entero(form.telefono) && validar_fecha(form.fecha_nacimiento) && validar_string(form.lugar_nacimiento) && validar_string(form.provincia) && validar_string(form.distrito) && validar_string(form.corregimiento) && validar_string(form.direccion) && validar_string(form.nombre_urgencias) && validar_string(form.parentesco_urgencias) && validar_entero(form.telefono_urgencias))	return true;
	return false
}

function GuardarCambiosPaciente(){
	var form = document.getElementById('formulario_registro_paciente');
	
	if(!validar_entero(form.numero_historia)){			alert("Inserte un numero de historia válido");	return false;}
	if(!validar_string(form.nombre_completo)){			alert("Inserte un nombre válido");	return false;}
	if(!validar_string(form.primer_apellido)){			alert("Inserte un primer apellido válido");	return false;}
	if(!validar_string(form.segundo_apellido)){			alert("Inserte un segundo apellido válido");	return false;}
	if(!validar_string(form.nombre_padre)){				alert("Inserte un nombre de padre válido");	return false;}
	if(!validar_string(form.nombre_madre)){				alert("Inserte un nombre de madre válido");	return false;}
	if(!validar_entero(form.telefono)){					alert("Inserte un telefono válido");	return false;}
	if(!validar_fecha(form.fecha_nacimiento)){			alert("Inserte una fecha de nacimiento válida");	return false;}
	if(!validar_string(form.lugar_nacimiento)){			alert("Inserte un lugar de nacimiento válido");	return false;}
	if(!validar_string(form.provincia)){				alert("Inserte una provincia válida");	return false;}
	if(!validar_string(form.distrito)){					alert("Inserte un distrito válido");	return false;}
	if(!validar_string(form.corregimiento)){			alert("Inserte un corregimiento válido");	return false;}
	if(!validar_string(form.direccion)){				alert("Inserte una direccion válida");	return false;}
	if(!validar_string(form.nombre_urgencias)){			alert("Inserte un nombre de urgencias válido");	return false;}
	if(!validar_string(form.parentesco_urgencias)){		alert("Inserte un parentesco válido");	return false;}
	if(!validar_entero(form.telefono_urgencias)){		alert("Inserte un telefono de urgencias válido");	return false;}
	
	var parametros = "id="+form.id.value+"&numero_historia="+form.numero_historia.value+"&nombre_completo="+form.nombre_completo.value+"&primer_apellido="+form.primer_apellido.value+"&segundo_apellido="+form.segundo_apellido.value+"&nombre_padre="+form.nombre_padre.value+	"&nombre_madre="+form.nombre_madre.value+"&sexo="+form.sexo.options[form.sexo.selectedIndex].value+"&telefono="+form.telefono.value+"&lugar_nacimiento="+form.lugar_nacimiento.value+"&fecha_nacimiento="+form.fecha_nacimiento.value+	"&seguro_social="+form.seguro_social.options[form.seguro_social.selectedIndex].value+"&provincia="+form.provincia.value+"&distrito="+form.distrito.value+"&corregimiento="+form.corregimiento.value+"&direccion="+form.direccion.value+	"&nombre_urgencias="+form.nombre_urgencias.value+"&parentesco_urgencias="+form.parentesco_urgencias.value+"&telefono_urgencias="+form.telefono_urgencias.value;
	divResultado = document.getElementById('resultadoGuardarCambiosPaciente');
	datos = "registro.php";
	envio_ajax(datos,divResultado,parametros);
	
}

function GuardarCambiosCita(){
	if(!ValidarFormularioPaciente(document.getElementById('formulario_registro_paciente'))){	alert("Complete los datos del paciente primero"); return false;}
	var form = document.getElementById('formulario_registro_cita');
	var parametros = "id="+form.id.value+"&atencion_por="+form.atencion_por.options[form.atencion_por.selectedIndex].value+"&servicios="+form.servicios.options[form.servicios.selectedIndex].value+"&tipo_paciente="+form.tipo_paciente.options[form.tipo_paciente.selectedIndex].value+"&frecuentacion_institucion="+form.frecuentacion_institucion.options[form.frecuentacion_institucion.selectedIndex].value+"&frecuentacion_servicio="+form.frecuentacion_servicio.options[form.frecuentacion_servicio.selectedIndex].value+"&tipo_atencion="+form.tipo_atencion.options[form.tipo_atencion.selectedIndex].value+"&area_referencia="+form.area_referencia.options[form.area_referencia.selectedIndex].value;
	divResultado = document.getElementById('resultadoCita');
	datos = "registro_cita.php";
	envio_ajax(datos,divResultado,parametros);
}

/******************
Funciones de Medico
******************/
function GuardarCambiosInforme(){
	var form = document.getElementById('formulario_informe');
	var parametros = "id="+form.cita.value+"&informe="+form.informe_medico.value;
	divResultado = document.getElementById('informe');
	datos = "guardar_informe.php";
	envio_ajax(datos,divResultado,parametros);
}

function GuardarModificacionCita(){
	var form = document.getElementById('formulario_modificar_cita');
	var parametros = "cita="+form.id.value+"&paciente="+form.paciente.value+"&medico_id="+form.medico.options[form.medico.selectedIndex].value+"&tipo_paciente="+form.tipo_paciente.options[form.tipo_paciente.selectedIndex].value+"&frecuentacion_inst="+form.frecuentacion_institucion.options[form.frecuentacion_institucion.selectedIndex].value+"&frecuentacion_serv="+form.frecuentacion_servicio.options[form.frecuentacion_servicio.selectedIndex].value+"&tipo_atencion="+form.tipo_atencion.options[form.tipo_atencion.selectedIndex].value+"&atencion_por="+form.atencion_por.options[form.atencion_por.selectedIndex].value+"&area_referencia="+form.area_referencia.options[form.area_referencia.selectedIndex].value+"&fecha="+form.fecha.value+"&turno="+form.turno.options[form.turno.selectedIndex].value;
	divResultado = document.getElementById('ModificarCita');
	datos = "guardar_modificacion.php";
	envio_ajax(datos,divResultado,parametros);
}
