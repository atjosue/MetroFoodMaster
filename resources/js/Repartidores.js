	$(document).ready(function(){

		 		$("#listadoRepartidores").DataTable({
				    "language": {
				        "sProcessing":    "Procesando...",
				        "sLengthMenu":    "Mostrar _MENU_ registros",
				        "sZeroRecords":   "No se encontraron resultados",
				        "sEmptyTable":    "Ningún dato disponible en esta tabla",
				        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
				        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
				        "sInfoPostFix":   "",
				        "sSearch":        "Buscar:",
				        "sUrl":           "",
				        "sInfoThousands":  ",",
				        "sLoadingRecords": "Cargando...",
				        "oPaginate": {
				            "sFirst":    "Primero",
				            "sLast":    "Último",
				            "sNext":    "Siguiente",
				            "sPrevious": "Anterior"
				        },
				        "oAria": {
				            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
				        }
				    }
				});

				/*----------------------------PROGRAMACION DE AGREGAR USUARIOS TIPO REPARTIDORES*/

	//$("#modalIngresoRepartidor").hide();
	$("#formulario").hide();

	$("#nuevoRepartidor").on("click", function(){
		
		$("#formulario").show();
		$("#nuevoRepartidor").hide();
		//$("#modalIngresoRepartidor").show({backdrop: "static", keyboard: false});
	});

	$("#cancelar").on("click", function(){
		$("#formulario").hide();
		$("#nuevoRepartidor").show();
	});

	//Verificar Usuario
		$("#usuario").on("change",function(){

			var usuario = $("#usuario").val(); 
			
			$.ajax({

				type:'POST',
				dataType: 'json',
				data: {usuario,usuario,key:'finduser'},
				url:"../../controller/UsuarioController.php",
				success : function(data){

					console.log(data);

					if (data['dec']) {
						swal({
							title:"UPS...!",
							text: "parese que el nombre de usuario ya ha sido utilizado",
							timer: 1800,
							type: 'error',
							closeOnConfirm: true,
							closeOnCancel: true,

						});

						$("#usuario").focus();
						$("#usuario").val("");
						
					}
				}
			});


		});

		$("#cancelar").on("click", function(){
			$("#modalIngresoRepartidor").hide();
		});			

//Verificar las contraseñas
			$("#repass").on("change",function(){

					var contra = $("#pass").val();
					var recontra = $("#repass").val();

					if (recontra != contra) {

									swal({
										title:"UPS...!",
										text: "Las contraseñas deben ser iguales",
										timer: 1500,
										type: 'error',
										closeOnConfirm: true,
										closeOnCancel: true,

									});

									$("#pass").focus();
									$("#pass").val("");
									$("#repass").val("");
									
					}
			});

			//Agregar al Restaurante.

			$("#agregarRepartidor").on("click",function(){

				var dataRepartidor = JSON.stringify($('#infoRepartidor :input').serializeArray());
				console.log(dataRepartidor);

				$.ajax({

				type:'POST',
				dataType: 'json',
				data: {dataRepartidor,dataRepartidor,key:"agregarRepartidor",key1:'si'},
				url:"../../controller/usuarioController.php",
				success : function(data){

					if (data==true) {
						swal({
							title:"Restaurante Registrado correctamente",
							timer: 1600,
							type: 'success',
							closeOnConfirm: true,
							closeOnCancel: true,

						});
						
		  				setTimeout(function(){
							location.reload();
						},1000);
					}
					else if (data==false){

						swal({
							title:"UPS...!",
							text: "parece que algo fallo:(",
							timer: 1800,
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
		});




	});