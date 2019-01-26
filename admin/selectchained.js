(function($) { 
    $.fn.remoteChained = function(parent_selector, url, options) {  
        return this.each(function() {          
            var self   = this;
            var backup = $(self).clone(); 
            $(parent_selector).each(function() {
                $(this).bind("change", function() {
					var id = $(this).attr("id");
					if(id=='il'){
						$("#ilce").attr("disabled", true);
					} 
                    var data = {};
                    $(parent_selector).each(function() {
                        var id = $(this).attr("id");
                        var value = $(":selected", this).val();
                        data[id] = value;
                    }); 
                    $.getJSON(url, data, function(json) { 
						if(id=='il'){
							$("#ilce").attr("disabled", false);
						} 
                        $("option", self).remove(); 
                        for (var key in json) {
                            if (!json.hasOwnProperty(key)) {
                                continue;
                            } 
                            if ("selected" == key) {
                                continue;
                            }
                            var option = $("<option />").val(key).append(json[key]);
                            $(self).append(option);    
                        } 
                        $(self).children().each(function() {
                            if ($(this).val() == json["selected"]) {
                                $(this).attr("selected", "selected");
                            }
                        }); 
                        $(self).trigger("change"); 
                    });
                }); 
                $(this).trigger("change");            
            });
        });
    }; 
    $.fn.remoteChainedTo = $.fn.remoteChained; 
})(jQuery); 