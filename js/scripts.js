jQuery(function() {
	jQuery('#ws_send_form').click(function(){
		jQuery('.ws-message-response').slideUp();

		var name = jQuery('#ws_contact_name').val();
		var email = jQuery('#ws_contact_email').val();
		var comment = jQuery('#ws_contact_comment').val();
        
        var hasError_name = true;
        if (name.length < 3) {
			jQuery('#ws_contact_name').addClass('ws-warning-input');
			hasError_name = true;
		}
		else {
			jQuery('#ws_contact_name').removeClass('ws-warning-input');
			hasError_name = false;
		}
        
        var hasError_email = true;
        if (!ws_validateEmail(email) || email.length < 3) {
			jQuery('#ws_contact_email').addClass('ws-warning-input');
			hasError_email = true;
		}
		else {
			jQuery('#ws_contact_email').removeClass('ws-warning-input');
			hasError_email = false;
		}
        
        var hasError_comment = true;
		if (comment.length < 3) {
			jQuery('#ws_contact_comment').addClass('ws-warning-textarea');
			hasError_comment = true;
		}
		else {
			jQuery('#ws_contact_comment').removeClass('ws-warning-textarea');
			hasError_comment = false;
		}

		if (hasError_name == false && hasError_email == false && hasError_comment == false)
		{
			jQuery.post('/wp-admin/admin-ajax.php',
				{
					action: 'contacthomepage', 
					ws_contact_name: name, 
					ws_contact_email: email, 
					ws_contact_comment: comment,
					ws_ajax_send_form: 1, 
					ws_chack: 'fg' + 'yu'
				},
				function(data){
					if(data == 'OK'){
						jQuery('input, textarea').val('');
						jQuery('#ws_contact_success').slideDown();
					} else {
						jQuery('#ws_contact_error').slideDown();
					}
				}
			)
		}
		else
		{
			jQuery('#ws_contact_error').slideDown();
		}
		return false;

	});
});

function ws_validateEmail($email) {
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	if ( !emailReg.test($email) ) {
			return false;
	} else {
			return true;
	}
}