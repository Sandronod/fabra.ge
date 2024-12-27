$(function(){
    var id;
    // Edit
    $(".edit").click(function(){
        id = $(this).closest(".ui-state-default").data("id");
        $.ajax({
            url : "image/edit",
            type: "POST",
            data : {id : id, "_token" : $('meta[name="csrf-token"]').attr('content')},
            success: function(data, textStatus, jqXHR){
                console.log(data);
                var image = JSON.parse(data);
                
                for(var i = 0; i < image.length; i++){

                    $("#edit-image input#fc-id_" + image[i].lang).val(image[i].id);
                    $("#edit-image input#fc-image_item_id_" + image[i].lang).val(image[i].image_id);
                    $("#edit-image input#fc-name_" + image[i].lang).val(image[i].name);
                    $("#edit-image textarea#fc-description_" + image[i].lang).val(image[i].description);
                    $("#edit-image img#showImg_" + image[i].lang).attr("src", image[i].imgurl);
                    $("#edit-image input#imgurl_" + image[i].lang).val(image[i].imgurl);

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
            url : "image/destroy",
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