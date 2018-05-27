

$(document).ready(function(){

	$("#comboView").hide();


//***************************************************Capturar id para abrir informacion en el modal COMBO**********************************

	$(document).on("click",".botonLeer",function(){

		var  img = $(this).attr("name");

		$.ajax({
			type:'POST',
			data: {img,img key:''}
		});


		var  img = $(this).attr("name");
		var res1 ='#';
		

		var res2 = res1.concat(img);

		

		$(res2).show();


		$(".close").on("click",function(){

		$(".comboView").hide();

	});
		

	});
//******************************************************Fin de captura de id para el modal COMBO**************************************

//****************************************************BOTON AGREGAR AL CARRITO******************************************************
		$(document).on("click",".prueba", function(){

				var  img2 = $(this).attr("name");
				var res3 ='#';

				console.log(img2);

				var res4 = res3.concat(img2);

			


			$(res4).on("click", function(){
			
			var formDatos = JSON.stringify($('#formDatos :input').serializeArray());


				$.ajax({

						type:'POST',
						dataType: 'json',
						data: {formDatos,formDatos,key:'Acarrito'},
						url:"../../controller/ProductoController.php",
						success : function(data){

							//info informacionn
							//error informacion
							//warning peligro

							if (data) {
								swal({
									title:"Exito!",
									text: "El combo se ha agregado al carrito",
									timer: 1800,
									type: 'error',
									closeOnConfirm: true,
									closeOnCancel: true,

								});

								$("#usuario").val("");
								$("#usuario").focus();
							}else{
								swal({
									title:"UPS...!",
									text: "parese que el nombre de usuario ya ha sido utilizado",
									timer: 1800,
									type: 'error',
									closeOnConfirm: true,
									closeOnCancel: true,

								});
							}
						}
					});


		});

		});
		
		


//****************************************************FIN BOTON AGREGAR AL CARRITO******************************************************


	//*********************************************FIN DEL DOCUMENT READY***************************************************************

});