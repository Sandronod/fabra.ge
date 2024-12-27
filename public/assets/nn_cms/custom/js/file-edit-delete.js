$(function(){
    var id;
    // Edit
    $(".edit").click(function(){
        id = $(this).closest(".ui-state-default").data("id");
        $.ajax({
            url : "file/edit",
            type: "POST",
            data : {id : id, "_token" : $('meta[name="csrf-token"]').attr('content')},
            success: function(data, textStatus, jqXHR){
                console.log(data);
                var file = JSON.parse(data);
                
                for(var i = 0; i < file.length; i++){

                    $("#edit-file input#fc-id_" + file[i].lang).val(file[i].id);
                    $("#edit-file input#fc-file_item_id_" + file[i].lang).val(file[i].file_id);
                    $("#edit-file input#fc-name_" + file[i].lang).val(file[i].name);
                    $("#edit-file textarea#fc-description_" + file[i].lang).val(file[i].description);
                    $("#edit-file input#fileurl_" + file[i].lang).val(file[i].fileurl);

                }
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert(errorThrown);
            }
        });
    });

    // Delete
    $(".del").click(function(){
        id = $(this).closest(".ui-state-default").data("id");
    });
    $(".confirm").click(function(){
        $.ajax({
            url : "file/destroy",
            type: "POST",
            data : {id : id, "_token" : $('meta[name="csrf-token"]').attr('content')},
            success: function(data, textStatus, jqXHR){
                console.log(data);
                $(".ui-state-default[data-id = " + id +"]").remove();
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert(errorThrown);
            }
        });
    });
});