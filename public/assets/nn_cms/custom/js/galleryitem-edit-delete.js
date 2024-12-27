$(function(){
    var id;
    // Edit
    $(".edit").click(function(){
        id = $(this).closest(".ui-state-default").data("id");
        $.ajax({
            url: "items/edit",
            type: "POST",
            data: {id : id, "_token" : $('meta[name="csrf-token"]').attr('content')},
            success: function(data, textStatus, jqXHR){
                console.log(data);
                var galleryItem = JSON.parse(data);
                
                for(var i = 0; i < galleryItem.length; i++){

                    $("#edit-gallery-item input#fc-id_" + galleryItem[i].lang).val(galleryItem[i].id);
                    $("#edit-gallery-item input#fc-gallery_item_id_" + galleryItem[i].lang).val(galleryItem[i].gallery_item_id);
                    $("#edit-gallery-item input#fc-name_" + galleryItem[i].lang).val(galleryItem[i].name);
                    $("#edit-gallery-item textarea#fc-description_" + galleryItem[i].lang).val(galleryItem[i].description);
                    $("#edit-gallery-item img#showImg_" + galleryItem[i].lang).attr("src", galleryItem[i].imgurl);
                    $("#edit-gallery-item input#imgurl_" + galleryItem[i].lang).val(galleryItem[i].imgurl);

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
            url: "items/destroy",
            type: "POST",
            data: {id : id, "_token" : $('meta[name="csrf-token"]').attr('content')},
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