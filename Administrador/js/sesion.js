function Ajax(){
	
		var xmlhttp=false;
        try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
                try {
                   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (E) {
                        xmlhttp = false;
                }
        }

        if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
                xmlhttp = new XMLHttpRequest();
        }
        return xmlhttp;
}
function MostrarConsulta(){
	
	   
	 var param1 = document.getElementById('usuario').value;
	 var param2 = document.getElementById('key').value;

				divResultado = document.getElementById('resultado');
				ajax=Ajax();
				ajax.open("GET", "php/verificar.php?id="+param1+"&key="+param2,true);
				ajax.onreadystatechange=function() {
					if (ajax.readyState==4) {
							divResultado.innerHTML = ajax.responseText
					}
				}
				ajax.send(null);
			
       
}

function GuardarCambiosUsuario(){
	
	   
	var param1 = document.getElementById('codigo_usuario').value;
	var param2 = document.getElementById('primer_nombre').value;
	var param3 = document.getElementById('segundo_nombre').value;
	var param4 = document.getElementById('primer_apellido').value;
	var param5 = document.getElementById('segundo_apellido').value;
	var param6 = document.getElementById('sexo').value;
	var param7 = document.getElementById('telefono').value;
	var param8 = document.getElementById('direccion').value;
	var param9 = document.getElementById('servicio').value;
	var param10 = document.getElementById('clave').value;
	var param11 = document.getElementById('tipo_profesional').value;
	var param12 = document.getElementById('codigo_profesional').value;
        var param13 = document.getElementById('rol').value;


				divResultado = document.getElementById('resultadoGuardarCambiosUsuarios');
				ajax=Ajax();
				ajax.open("GET", "registro.php?id="+param1+"&primer_nombre="+param2+"&segundo_nombre="+param3+"&primer_apellido="+param4+"&segundo_apellido="+param5+"&sexo="+param6+"&telefono="+param7+"&direccion="+param8+"&servicio="+param9+"&clave="+param10+"&tipo_profesional="+param11+"&codigo_profesional="+param12+"&rol="+param13,true);
				ajax.onreadystatechange=function() {
					if (ajax.readyState==4) {
							divResultado.innerHTML = ajax.responseText
					}
				}
				ajax.send(null);

       
}

