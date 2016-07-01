var osms_connect_test = function() {
    var data = {
	action: "osms_connect_test",
	username: jQuery("#osms-username").val(),
	password: jQuery("#osms-password").val(),
	tenantId: jQuery("#osms-tenant-id").val(),
	authUrl: jQuery("#osms-auth-url").val(),
	region: jQuery("#osms-region").val()
    };

    jQuery.ajax({
        type: 'POST',
        url: ajaxurl,
        data: data,
        success: function (response) {
	    var res = jQuery.parseJSON(response);

            jQuery("html,body").animate({scrollTop: 0}, 1000);
            jQuery("#osms-flash P").empty().append(res["message"]);
	    if(res["is_error"]) {
		jQuery("#osms-flash").addClass("error");
	    } else {
		jQuery("#osms-flash").removeClass("error");
	    }

	    jQuery('#osms-flash').show();
        }
        //dataType: 'html'
    });
    jQuery("#selupload_spinner").unbind("ajaxSend");
};

var osms_resync = function() {
    if( ! confirm("This can take a significant amount of time if you have a large amount of files. Are you sure? ")) {
	return;
    }
};

jQuery(function() {
    jQuery("#osms-flash").hide();
});
