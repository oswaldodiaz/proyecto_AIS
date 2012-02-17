function objectAjax(){
	
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

function comprobarDatos()
{
	 var param1 = document.getElementById('name').value;
	 var param5 = document.getElementById('email').value;
	 var param6 = document.getElementById('residencias').value;
	 var param7 = document.getElementById('ciudad').value;
	
	
	 var name = /^[A-Z]([A-Z]|[a-z])+$/; 
	 
	 var correoe =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{3})+$/;

		 if ((correoe.test(param5))){
			if ((name.test(param7))){
				divResultado = document.getElementById('resultado');
				ajax=objectAjax();
				ajax.open("GET", "php/insertar.php?correo="+param5+"&name="+param1+"&pais="+param6+"&ciudad="+param7,true);
				ajax.onreadystatechange=function() {
					if (ajax.readyState==4) {
						divResultado.innerHTML = ajax.responseText
					}
				}
				ajax.send();
		
			//window.location = "index.php";
			//return true;
			}else{
				alert ("Nombre de ciudad solo debe contener letras");
				return false;
			}		
		}else{
			alert ("Formato de correo incorrecto");
			return false;
		}
};

function comprobar()
{
	 var param1 = document.getElementById('correo').value;
	 var correoe =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{3})+$/; 

	 if ((correoe.test(param1)))
	{
		divResultado = document.getElementById('resultado');
		ajax=objectAjax();
		ajax.open("GET", "php/verificar.php?correo="+param1,true);
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				divResultado.innerHTML = ajax.responseText
			}
		}
		ajax.send();
		
		//window.location = "index.php";
		//return true;
	}else{
		alert ("Formato de correo incorrecto");
		return false;
	}
};

function news()
{  
					
	divResultado = document.getElementById('tabs-1');
	ajax=objectAjax();
	ajax.open("GET", "noticias.php",true);
	ajax.onreadystatechange=function() {
	if (ajax.readyState==4) {
	divResultado.innerHTML = ajax.responseText
	}
	}
	ajax.send();
	
	//window.location = "index.php";
	//return true;
}
