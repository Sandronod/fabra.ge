$(function(){
    var id;
    var itemUrl;
    $(".data-table .del").click(function(){
        id = $(this).data("element-id");
        deleteUrl = $(this).data("delete-url");
        itemId = $(this).data("item-id");
        deleteItemType = $(this).data("item-type");
    });
    $("#delete-item .confirm").click(function(){
        $.ajax({
            url: deleteUrl,
            type: "POST",
            data: {id : id, deleteItemType: deleteItemType, itemId : itemId, "_token" : $("meta[name='csrf-token']").attr("content")},
            success: function(data, textStatus, jqXHR){
                $(".data-table .del[data-element-id = " + id + "]").closest("tr").remove();
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert(errorThrown);
            }
        });
    });
});