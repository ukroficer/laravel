$(document).ready(function() {
	$(document).on('click', '.delete_tag', function(event) {
		event.preventDefault();

		if (confirm("Are you realy want delete this?")) {
  			window.location.href = $(this).attr('href');
		} else {
  			alert("You pushed cancel button!");
		};

	});

	$(document).on('click','.success_msg', function () {
		$(this).fadeOut('slow');
	});
	setTimeout(function(){
		$('.success_msg').fadeOut('slow');
	},3000);
});			