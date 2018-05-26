

$(document).ready(function(){

	$(".comboView").hide();



	$(document).on("click",".botonLeer",function(){
		$(".comboView").hide();


		var  img = $(this).attr("name");
		var res1 ='#';
		

		var res5 = res1.concat(img);

		console.log(img);
		console.log(res5);

		$(res5).show();


		$(".close").on("click",function(){

		$(".comboView").hide();

	});
		

	});

});