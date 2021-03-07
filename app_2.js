///////////////////////////////////////////                                      //////////////////////////
//////////////////////////////////////////                 Акустична гітара             /////////////////////////
////////////////////////////////////////////                                        ////////////////////////
jQuery(document).ready(function()
	        {
	        	$("body").on('click', '.activer_c1', function()
	        	{	
					var filttype = $(this).attr('values');
				 	filttype = JSON.stringify(filttype);
					$.ajax({
						url:"funct_2.php",
						data:{filt_c1:filttype},
						type:"POST",
						success: function(data){

							$('.git_c1').html(data).hide().fadeIn(600);
						},
						error: function(){
							alert("error");
						}
					}
				);
				});
            });
		  
			
			jQuery(document).ready(function()
	        {
	        	$("body").on('click', '.activer_c2', function()
	        	{	
					var filttype = $(this).attr('values');
				 	filttype = JSON.stringify(filttype);
					$.ajax({
						url:"funct_2.php",
						data:{filt_c2:filttype},
						type:"POST",
						success: function(data){

							$('.git_c1').html(data).hide().fadeIn(600);
						},
						error: function(){
							alert("error");
						}
					}
				);
				});
            });
		  ////////////////////////////////
			jQuery(document).ready(function()
	        {
	        	$("body").on('change', '.activer_c21', function()
	        	{	
					var filttype = $(this).val();
					
				 	filttype = JSON.stringify(filttype);
					$.ajax({
						url:"funct_2.php",
						data:{filt_c21:filttype},
						type:"POST",
						success: function(data){

							$('.git_c1').html(data).hide().fadeIn(600);
						},
						error: function(){
							alert("error");
						}
					}
				);
                });
			});
			
///////////////////////////////////////////                                      //////////////////////////
//////////////////////////////////////////                 Електрогітара            /////////////////////////
////////////////////////////////////////////                                        ////////////////////////
 jQuery(document).ready(function()
 {
     $("body").on('click','.activ_co3',function()
     {	
         var filttype = $(this).attr('values');
          filttype = JSON.stringify(filttype);
         $.ajax({
             url:"funct_2.php",
             data:{filt3:filttype},
             type:"POST",
             success: function(data){

                 $('.git_c2').html(data).hide().fadeIn(600);
             },
             error: function(){
                 alert("error");
             }
         }
     );
     });
 });
 //////////////////////////////////////////jQuery(document).ready(function()
 jQuery(document).ready(function(){
	        	$("body").on('click', '.activer_c4', function()
	        	{	
					var filttype = $(this).attr('values');
				 	filttype = JSON.stringify(filttype);
					$.ajax({
						url:"funct_2.php",
						data:{filt_c4:filttype},
						type:"POST",
						success: function(data){

							$('.git_c2').html(data).hide().fadeIn(600);
						},
						error: function(){
							alert("error");
						}
					}
				);
				});
            });
		  ////////////////////////////////
			jQuery(document).ready(function()
	        {
	        	$("body").on('change', '.act_c2', function()
	        	{	
					var filttype = $(this).val();
					
				 	filttype = JSON.stringify(filttype);
					$.ajax({
						url:"funct_2.php",
						data:{filt_c41:filttype},
						type:"POST",
						success: function(data){

							$('.git_c2').html(data).hide().fadeIn(600);
						},
						error: function(){
							alert("error");
						}
					}
				);
                });
			});
        
///////////////////////////////////////////                                      //////////////////////////
//////////////////////////////////////////                 Бас гітара              /////////////////////////
////////////////////////////////////////////                                        ////////////////////////
jQuery(document).ready(function()
{
	$("body").on('click', '.activer_c5', function()
	{	
		var filttype = $(this).attr('values');
		 filttype = JSON.stringify(filttype);
		$.ajax({
			url:"funct_2.php",
			data:{filt_c5:filttype},
			type:"POST",
			success: function(data){

				$('.git_c3').html(data).hide().fadeIn(600);
			},
			error: function(){
				alert("error");
			}
		}
	);
	});
});


jQuery(document).ready(function()
{
	$("body").on('click', '.activer_c6', function()
	{	
		var filttype = $(this).attr('values');
		 filttype = JSON.stringify(filttype);
		$.ajax({
			url:"funct_2.php",
			data:{filt_c6:filttype},
			type:"POST",
			success: function(data){

				$('.git_c3').html(data).hide().fadeIn(600);
			},
			error: function(){
				alert("error");
			}
		}
	);
	});
});
////////////////////////////////
jQuery(document).ready(function()
{
	$("body").on('change', '.act_c3', function()
	{	
		var filttype = $(this).val();
		
		 filttype = JSON.stringify(filttype);
		$.ajax({
			url:"funct_2.php",
			data:{filt_c61:filttype},
			type:"POST",
			success: function(data){

				$('.git_c3').html(data).hide().fadeIn(600);
			},
			error: function(){
				alert("error");
			}
		}
	);
	});
});
///////////////////////////////
//////////////////////////////
//PEDAL
//////////////////////////////

jQuery(document).ready(function()
{
	$("body").on('click', '.activer_p', function()
	{	
		var filttype = $(this).attr('values');
		 filttype = JSON.stringify(filttype);
		$.ajax({
			url:"funct_2.php",
			data:{filt_p:filttype},
			type:"POST",
			success: function(data){

				$('.git_p').html(data).hide().fadeIn(600);
			},
			error: function(){
				alert("error");
			}
		}
	);
	});
});


jQuery(document).ready(function()
{
	$("body").on('click', '.activer_p1', function()
	{	
		var filttype = $(this).attr('values');
		 filttype = JSON.stringify(filttype);
		$.ajax({
			url:"funct_2.php",
			data:{filt_p1:filttype},
			type:"POST",
			success: function(data){

				$('.git_p').html(data).hide().fadeIn(600);
			},
			error: function(){
				alert("error");
			}
		}
	);
	});
});

/////////////////////////////
///////////////////////////////
////////////SORT//////////////\

$(document).on('change','.sortirvka_4', function()
{
	
	var option = $(this).val();
	
	// $('.product-grid').isotope( option );
	option = JSON.stringify(option);
		$.ajax({
		url:"funct_2.php",
		data:{sort_4:option},
		type:"POST",
		success: function(data){
			$('.git_c1').html(data).hide().fadeIn(600);
			},
		error: function(){
			alert("error");
		}
		  }
);
});
///////////////////////
$(document).on('change','.sortirvka_5', function()
{
	
	var option = $(this).val();
	
	// $('.product-grid').isotope( option );
	option = JSON.stringify(option);
		$.ajax({
		url:"funct_2.php",
		data:{sort_5:option},
		type:"POST",
		success: function(data){
			$('.git_c2').html(data).hide().fadeIn(600);
			},
		error: function(){
			alert("error");
		}
		  }
);
});
/////////////////////
////////////////////////
$(document).on('change','.sortirvka_6', function()
{
	
	var option = $(this).val();
	
	// $('.product-grid').isotope( option );
	option = JSON.stringify(option);
		$.ajax({
		url:"funct_2.php",
		data:{sort_6:option},
		type:"POST",
		success: function(data){
			$('.git_c3').html(data).hide().fadeIn(600);
			},
		error: function(){
			alert("error");
		}
		  }
);
});
////////////////////////////
$(document).on('change','.sortirvka_7', function()
{
	
	var option = $(this).val();
	
	// $('.product-grid').isotope( option );
	option = JSON.stringify(option);
		$.ajax({
		url:"funct_2.php",
		data:{sort_7:option},
		type:"POST",
		success: function(data){
			$('.git_p').html(data).hide().fadeIn(600);
			},
		error: function(){
			alert("error");
		}
		  }
);
});