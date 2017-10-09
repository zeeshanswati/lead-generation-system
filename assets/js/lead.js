$( document ).ready(function() {
	$( "input[name=first_name], input[name=last_name], input[name=phone], input[name=email], input[name=address], input[name=home_square_footage]" ).keyup(function() {
		captureData();
	});
	$( "#leadForm" ).on('submit', function() {
		event.preventDefault();
		captureData(function(response){
			if (response == true) {
				$('.form-inner').html("Thank you. We will contact you shortly.");
			}
		});
	});

	var currentRequest = null;
	function captureData(callBack = function(){})
	{
		currentRequest = jQuery.ajax({
		    type: 'POST',
		    data:  $('#leadForm').serialize(),
		    url: 'submit.php',
		    beforeSend : function()    {           
		        if(currentRequest != null) {
		            currentRequest.abort();
		        }
		    },
		    success: function(data) {
		        // Success
		        callBack(data);
		    },
		    error:function(e){
		      // Error
		    }
		});
	}
});