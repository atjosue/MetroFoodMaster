$(document).ready(function(){
	/*****************************subtotales********************/
	var cantIni;
	cantIni=1;
	$("#cont2").val("");

	console.log(cantIni);
	$(document).on("change",".cantidad", function(){

			var idCant=$(this).attr("id");
			var idCombo=$(this).attr("name");
			var x = document.getElementById(idCant).value;
			var sub = document.getElementById(idCant).value;
			var tot = document.getElementById(idCant).value;
			console.log(x);

			$.ajax({

				type:'POST',
				dataType: 'json',
				data: {x,x,idCombo,idCombo, key:'cantidad'},
				url:"../../controller/carritoController.php",
				success : function(data){
					if (data) {
							$.ajax({
								type:'POST',
								dataType: 'json',
								data: {idCombo,idCombo, key:'subtotal'},
								url:"../../controller/carritoController.php",
								success : function(dato){
									if (dato) {
										$.ajax({
											type:'POST',
											dataType: 'json',
											data: {key:'total'},
											url:"../../controller/carritoController.php",
											success : function(dato){
												if (dato) {
													
												}
											}
										});	
									}
								}
							});						
					}
				}
			});



	});
	/*******************************FIN *************************/

});