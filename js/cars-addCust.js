$(document).ready(function(){
	// Function to change form action from:
	// http://www.formget.com/dynamically-change-form-action-based-on-selection-using-jquery/
	$("#business").hide();
	$("#customer_type").change(function() {
		var selected = $(this).children(":selected").text();
		switch (selected) {
		case "Home":
			$("#home").show();
			$("#business").hide();
			break;
		case "Business":
			$("#home").hide();
			$("#business").show();
			break;
		}
	})
})