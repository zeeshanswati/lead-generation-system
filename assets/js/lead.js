$( document ).ready(function() {
	$( "input[name=first_name], input[name=last_name], input[name=phone], input[name=email], input[name=address], input[name=home_square_footage]" ).keyup(function() {
		captureData();
	});
	var currentRequest = null;
	function captureData()
	{
		console.log("YES");
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
		    },
		    error:function(e){
		      // Error
		    }
		});
	}
});