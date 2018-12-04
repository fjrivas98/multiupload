(function (){
	 var formulario = document.getElementById("formulario");
	 formulario.addEventListener('submit', valFormulario);


	// function comprobarDNI(dni){
        
 //       if (dni.length == 9 && parseInt(dni.substring(0,8))){
 //           return true;
 //       }else{
 //       	dni.nextElementSibling.textContent="error, introduce un dni con formato de 8 numeros y una letra ej:12345678X"
 //           return false;
 //       }
 //   }
	

	
	
	 function validar_email( email ) {
	    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    if(regex.test(email.value)){
	    	email.nextElementSibling.textContent="email correcto";
	    	return true;
	    }else{
	    	email.nextElementSibling.textContent="error, introduce un email con formato: hola@hola.com";
	    	return false;
	    }
      //return regex.test(email) ? true : false;
	}

	
	
	function valContraseña2(contraseña,contraseña2){
		if(contraseña.value===contraseña2.value){
			contraseña2.nextElementSibling.textContent="las contraseñas coinciden";
			return true
		}else{
			contraseña2.nextElementSibling.textContent="error,las contraseñas no coinciden";
		}
	}

	



	

	function valFormulario(e){
		e.preventDefault();
	 	var contraseña = document.getElementById('clave');
	 	var contraseña2 = document.getElementById('clave2');
	 	var sicontraseña2= valContraseña2(contraseña,contraseña2);
	 	
	 	if(sicontraseña2){
	 		formulario.submit()
		}

	}
	




})();	
	
