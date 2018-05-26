$(document).ready(function(){
$("#modalIngresoProducto").hide();
console.log("nombre de pruaba al inicio:");
console.log($("#prueba").val());
	
		$.ajax({
					type:'POST',
					data:{key:'first'},
					url:"../../controller/UsuarioController.php",
					success:function(data){

						console.log(data);
						if (data==true) {

							swal({
										title:"Bienvenido a METROFOOD!",
										text: "IMPORTANTE:\n\nLo primero que tienes que Hacer\n es editar tu perfil.",
										timer: 8000,
										type: 'warning',
										closeOnConfirm: false,
										closeOnCancel: false,

									});

							setTimeout(function(){
									 window.location.href = "../../view/Restaurante/perfilRestaurante.php";
								},6000);

						}
					}
				});
		$("#agregarProducto").on("click", function(){
			$("#modalIngresoProducto").show({backdrop: "static", keyboard: false});
				$("#nombre").val("");
				$("#descripcion").val("");
				$("#precio").val("");
				$("#cerrarAgregar").show();
				$("#upload_image").show();
				

				
		});

			
	//-------------------------Agregar combo

			$("#agregarCombo").on("click", function(){

				
				
				var dataProducto = JSON.stringify($('#infoProducto :input').serializeArray());
			
				$.ajax({
					type:'POST',
					dataType: 'json',
					data: {dataProducto,dataProducto,key:'agregar'},
					url:"../../controller/ProductoController.php",
					success : function(data){

					//info informacionn
					//error informacion
					//warning peligro

					if (data==true) {
						swal({
							title:"Combo Ingresado con Exito",
							timer: 1500,
							type: 'success',
							closeOnConfirm: true,
								closeOnCancel: true,

						});
						setTimeout(function(){
							location.reload();
						},1000);
					}else if (data==false) {
						swal({
							title:"Ocurrio un error al Guardar el Combo",
							timer: 1500,
							type: 'error',
							closeOnConfirm: true,
								closeOnCancel: true,

						});
						setTimeout(function(){
							location.reload();
						},1000);

					}
				}
				});
				$("#modalIngresoProducto").hide();
				
			});

			//cerrar modal agregar combo boton cancelar
			$("#cerrarAgregar").on("click", function(){

					$("#modalIngresoProducto").hide();				

			});

			//Croppie
			$image_crop = $('#image_demo').croppie({
			    enableExif: true,
			    viewport: {
			      width:200,
			      height:200,
			      type:'square' //circle
			    },
			    boundary:{
			      width:300,
			      height:300
			    }
			  });
	//----------------------ESTE ES EL ENCARRGADO DE SELECCIONAR LAS IMAGENES E INGRESARLAS-------------
			  $('#upload_image').on('change', function(){
			    var reader = new FileReader();
			    reader.onload = function (event) {
			      $image_crop.croppie('bind', {
			        url: event.target.result
			      }).then(function(){
			        console.log('jQuery bind complete');

			      });
			    }
			    reader.readAsDataURL(this.files[0]);
			    $('#uploadimageModal').modal('show');


			  });

    //----------------------------ESTO ES PARA QUE NO GUARDE OTRA IMAGEN SI YA HAY Y esto SE HACE EN boton GUARDAR --------------------
			  $('.crop_image').click(function(event){

				console.log("verificando lo que tiene PRUEBA:");
				console.log($("#prueba").val());
				

			  	if (($("#prueba").val()=="")) {

			  		
			  		var test;

			  			

						$image_crop.croppie('result', {

							      type: 'canvas',
							      size: 'viewport'
							    }).then(function(response){

							    	//ajax de asignado de nombre
							    	$.ajax({
			  				
											type:'POST',
											data:{key:'hora'},
											url:"../../controller/ProductoController.php",
											success:function(data){
												
												$("#prueba").val(data);
												console.log("no Habia en prueba pero se le coloca nombre:");
												console.log($("#prueba").val());
													
													nose=$("#prueba").val();

											     
											     //ajax de guardado de imagen

											    			 $.ajax({
															        url:"../../imagenes/img/upload.php",
															        type: "POST",
															        data:{nose,"image": response},
															        success:function(data)
															        {
															        	console.log("se ingreso con el nombre:")
															        	console.log(test);

															          $('#uploadimageModal').modal('hide');
															         //('#uploaded_image').html(data);

															         //$("#modalIngresoProducto").hide();
															         
															         //$('#upload_image').hide();
															         //$("#cerrarAgregar").hide();
															        }
															      });
											}
										});

							    	
							    			
									    	

							    	

							    	
							    })
			  		}else{

			  			$image_crop.croppie('result', {
						      type: 'canvas',
						      size: 'viewport'
						    }).then(function(response){
						    	var nose = $("#prueba").val();
						    	console.log(nose);
						      $.ajax({
						        url:"../../imagenes/img/upload.php",
						        type: "POST",
						        data:{nose,"image": response},
						        success:function(data)
						        {
						          $('#uploadimageModal').modal('hide');
						         //('#uploaded_image').html(data);

						         //$("#modalIngresoProducto").hide();
						         
						         //$('#upload_image').hide();
						         //$("#cerrarAgregar").hide();
						        }
						      });
						    })
						  			
			  			console.log($("#prueba").val());
			  			console.log("YA HABIA");

			  		}
	//----------------------------------------------------------------------------------------------------fin if
				/*$("#cerrar").on("click", function(){
				$("#modalIngresoProducto").hide();

				});*/
			    
			  });

	//------------------------------------------------------------------------------------------------FIN CROPIE

			  


});