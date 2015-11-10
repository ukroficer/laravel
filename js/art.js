$(document).ready(function(){
	 function counter(){
      var time = $('#timer').attr('data-time');
      time = time * 1000;
	   var interval =	setInterval(function(){
	 		if(time===0 || time<0){
        $('#timer').html('0');
        $('.big-forma').remove();
	 			alert('Time over');	
	 			clearInterval(interval);//stop setInterval
	 		}
      else{
        time = time - 100;
        $('#timer').html(time/1000);
      }
     //document.cookie = 'time_last='+time;//set this time in cookie
	 	},100)
	 }
	 counter();
   $('#remove-coocie').on('click',function(){
      var nul = 36*1000;
     document.cookie = 'time_last='+nul;//set this time in cookie

   });
  //init datepicker
      $( '#typedate').datepicker({dateFormat:'yy-mm-dd'});
      //ajax first form
      $(document).on('click','.button-succes button',function(e){
      	e.preventDefault();
      	var array = $(this).closest('form').serialize();
        var url_set = $(this).closest('form').attr('action');
        var this_content = $(this).closest('.big-forma');
        console.log(url_set);
      	$.ajax({         
    			url: url_set,
              	type: "POST",
              	dataType: "json",
              	data: array,
              	success: function(data) {
                  $('p.error').remove();
                  if (data.success == false) {
                    $.each(data.fields, function(index, val) {
                     $('input[name="'+index+'"]').after(val);
                    });
                  }
                  else{
                      $(this_content).remove();
                      $('.r-colum').after(data.message);
                      $( '#typedate').datepicker({dateFormat:'yy-mm-dd'});
                      
                  }
              }    
		});
      });
})