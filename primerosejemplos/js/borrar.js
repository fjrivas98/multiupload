
(function escucha(){
    var tabla = document.getElementById("tablaProducto");
    tabla.addEventListener('click', clickTabla);
    function clickTabla(event) {
        var target = event.target;
        if(target.tagName === 'A' && target.getAttribute('class') === 'borrar') {
            if(!confirm("De verdad?")) {
                event.preventDefault();
            }
        } else if(target.tagName === 'A' && target.getAttribute('class') === 'editar') {
            event.preventDefault();
            var dataId = target.getAttribute('data-id');
            var id = document.getElementById('id');
            id.value = dataId;
            var fEditar = document.getElementById('fEditar');
            fEditar.submit();
        }
    }
})();

// (function (){
//     var tabla = document.getElementById("tablaProducto");
//     tabla.addEventListener('click', clickTabla);
//     function clickTabla(event) {
//         var target = event.target;
//         if(target.tagName === 'A' && target.getAttribute('class') === 'borrar') {
//             if(!confirm("De verdad?")) {
//                 event.preventDefault();
//             }
//         } else if(target.tagName === 'A' && target.getAttribute('class') === 'editar') {
            
//         }
//     }
	
// 		var primero = document.getElementById("input");
// 		primero.addEventListener("click",cogerInput);
// 		function cogerInput(){
		
// 		var segundo = document.getElementsByName("ids[]");
// 		    for (var i = 0; i<segundo.length; i++){
// 		        	if(primero.checked == true){
// 	                        segundo[i].checked = true;
// 	                }else{
// 	                    	segundo[i].checked = false;
// 	                }
// 		    }
	

// }


			
			
	
	
// })();