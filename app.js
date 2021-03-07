///////////////////////////////////////////                                      //////////////////////////
//////////////////////////////////////////                 Акустична гітара             /////////////////////////
////////////////////////////////////////////                                        ////////////////////////
jQuery(document).ready(function()
	        {
	        	$("body").on('click', '.activer', function()
	        	{	
					var filttype = $(this).attr('values');
				 	filttype = JSON.stringify(filttype);
					$.ajax({
						url:"funct.php",
						data:{filttype_2:filttype},
						type:"POST",
						success: function(data){

							$('.git').html(data).hide().fadeIn(600);
						},
						error: function(){
							alert("error");
						}
					}
				);
				});
            });
          ////////////////////////////////////
            jQuery(document).ready(function()
	        {
	        	$("body").on('click', '.activer_2', function()
	        	{	
					var filttype = $(this).attr('values');
				 	filttype = JSON.stringify(filttype);
					$.ajax({
						url:"funct.php",
						data:{filttypes_2:filttype},
						type:"POST",
						success: function(data){

							$('.git').html(data).hide().fadeIn(600);
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
	        	$("body").on('change', '.activer_2_1', function()
	        	{	
					var filttype = $(this).val();
					
				 	filttype = JSON.stringify(filttype);
					$.ajax({
						url:"funct.php",
						data:{filttypes_2_1:filttype},
						type:"POST",
						success: function(data){

							$('.git').html(data).hide().fadeIn(600);
						},
						error: function(){
							alert("error");
						}
					}
				);
                });
			});
           ///////////////////////////////////////////                                      //////////////////////////
//////////////////////////////////////////                 Класична гітара              /////////////////////////
////////////////////////////////////////////                                        ////////////////////////
            jQuery(document).ready(function()
	        {
	        	$("body").on('click', '.activer_3', function()
	        	{	
					var filttype = $(this).attr('values');
				 	filttype = JSON.stringify(filttype);
					$.ajax({
						url:"funct.php",
						data:{filttype_1:filttype},
						type:"POST",
						success: function(data){

							$('.git_1').html(data).hide().fadeIn(600);
						},
						error: function(){
							alert("error");
						}
					}
				);
				});
            });
            ///////////////
            jQuery(document).ready(function()
	        {
	        	$("body").on('click', '.activer_4', function()
	        	{	
					var filttype = $(this).attr('values');
				 	filttype = JSON.stringify(filttype);
					$.ajax({
						url:"funct.php",
						data:{filttypes_1:filttype},
						type:"POST",
						success: function(data){

							$('.git_1').html(data).hide().fadeIn(600);
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
     $("body").on('click', '.activer_5', function()
     {	
         var filttype = $(this).attr('values');
          filttype = JSON.stringify(filttype);
         $.ajax({
             url:"funct.php",
             data:{filttype_3:filttype},
             type:"POST",
             success: function(data){

                 $('.git_3').html(data).hide().fadeIn(600);
             },
             error: function(){
                 alert("error");
             }
         }
     );
     });
 });
        ///////////////
 jQuery(document).ready(function()
 {
     $("body").on('click', '.activer_6', function()
     {	
         var filttype = $(this).attr('values');
          filttype = JSON.stringify(filttype);
         $.ajax({
             url:"funct.php",
             data:{filttypes_3:filttype},
             type:"POST",
             success: function(data){

                 $('.git_3').html(data).hide().fadeIn(600);
             },
             error: function(){
                 alert("error");
             }
         }
     );
     });
 });
////////////////
jQuery(document).ready(function()
	        {
	        	$("body").on('change', '.activer_3_1', function()
	        	{	
					var filttype = $(this).val();
					
				 	filttype = JSON.stringify(filttype);
					$.ajax({
						url:"funct.php",
						data:{filttypes_3_1:filttype},
						type:"POST",
						success: function(data){

							$('.git_3').html(data).hide().fadeIn(600);
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
	        	$("body").on('click', '.activer_7', function()
	        	{	
					var filttype = $(this).attr('values');
				 	filttype = JSON.stringify(filttype);
					$.ajax({
						url:"funct.php",
						data:{filttype_4:filttype},
						type:"POST",
						success: function(data){

							$('.git4').html(data).hide().fadeIn(600);
						},
						error: function(){
							alert("error");
						}
					}
				);
				});
            });
            ///////////////
            jQuery(document).ready(function()
	        {
	        	$("body").on('click', '.activer_8', function()
	        	{	
					var filttype = $(this).attr('values');
				 	filttype = JSON.stringify(filttype);
					$.ajax({
						url:"funct.php",
						data:{filttypes_4:filttype},
						type:"POST",
						success: function(data){

							$('.git4').html(data).hide().fadeIn(600);
						},
						error: function(){
							alert("error");
						}
					}
				);
				});
            });

///////////////////
			jQuery(document).ready(function()
	        {
	        	$("body").on('change', '.activer_4_1', function()
	        	{	
					var filttype = $(this).val();
				 	filttype = JSON.stringify(filttype);
					$.ajax({
						url:"funct.php",
						data:{filttypes_4_1:filttype},
						type:"POST",
						success: function(data){

							$('.git4').html(data).hide().fadeIn(600);
						},
						error: function(){
							alert("error");
						}
					}
				);
                });
			});

											//////////////////////////////
										///////////////////////////////
								///////////////	SoRT NAME ////////////////////
									//////////////////////////////////////
		
			   	$(document).on('change','.sortirvka', function()
	        	{
	        		
					var option = $(this).val();
					
					// $('.product-grid').isotope( option );
					option = JSON.stringify(option);
						$.ajax({
						url:"funct.php",
						data:{sort:option},
						type:"POST",
						success: function(data){
							$('.git').html(data).hide().fadeIn(600);
							},
						error: function(){
							alert("error");
						}
						  }
				);
				});
   ///////////////////////////////////////////////////////////////////////////////
   $(document).on('change','.sortirvka_1', function()
	        	{
	        		
					var option = $(this).val();
					
					// $('.product-grid').isotope( option );
					option = JSON.stringify(option);
						$.ajax({
						url:"funct.php",
						data:{sort_1:option},
						type:"POST",
						success: function(data){
							$('.git_3').html(data).hide().fadeIn(600);
							},
						error: function(){
							alert("error");
						}
						  }
				);
				});

				///////////////////////////////////////////////////////////////////////////////
   $(document).on('change','.sortirvka_2', function()
   {
	   
	   var option = $(this).val();
	   
	   // $('.product-grid').isotope( option );
	   option = JSON.stringify(option);
		   $.ajax({
		   url:"funct.php",
		   data:{sort_2:option},
		   type:"POST",
		   success: function(data){
			   $('.git_1').html(data).hide().fadeIn(600);
			   },
		   error: function(){
			   alert("error");
		   }
			 }
   );
   });

   				///////////////////////////////////////////////////////////////////////////////
				   $(document).on('change','.sortirvka_3', function()
				   {
					   
					   var option = $(this).val();
					   
					   // $('.product-grid').isotope( option );
					   option = JSON.stringify(option);
						   $.ajax({
						   url:"funct.php",
						   data:{sort_3:option},
						   type:"POST",
						   success: function(data){
							   $('.git4').html(data).hide().fadeIn(600);
							   },
						   error: function(){
							   alert("error");
						   }
							 }
				   );
				   });
			/////////////////////
			////////////////////
		///	SoRT NAME
		///////