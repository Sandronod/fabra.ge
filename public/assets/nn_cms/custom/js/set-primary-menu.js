$(function(){
    
	$("input[type=radio][name=primary-menu]").click(function(){
		var id = $(this).data("id");
		$.ajax({
            url: "menu/setprimary",
            type: "POST",
            data: {id : id, "_token" : $("meta[name='csrf-token']").attr("content")},
            success: function(data){
            },
            error: function(){
            }
        });
	});

});