$(function(){

    // select menuitem type for example:(text page, collection, custom link)
    $("select[name=type]").change(function(){

    	var menuitemForm = $(".menuitem-form");
    	menuitemForm.find(".form-group").removeClass("has-error");
    	var selPT = $(this);
    	checkselPT(selPT);

        // change other select[name=type] control if it exists (For example: in multiple language edit it exits)
        var selPTSelectedIndex = $(this)[0].selectedIndex;

        $("select[name=type]").each(function(){ 
            $(this).find("option:eq(" + selPTSelectedIndex + ")").prop("selected", true);
        });

    });

    // select collection
    $("select[name=collection_id]").change(function(){

        // change other select[name=collection_id] control if it exists (For example: in multiple language edit it exits)
        var selCISelectedIndex = $(this)[0].selectedIndex;

        $("select[name=collection_id]").each(function(){
            $(this).find("option:eq(" + selCISelectedIndex + ")").prop("selected", true);
        });

    });

    function checkselPT(selPT = $("select[name=type]")){
        if(selPT.val() == "text"){

            // collection hide START
            $("select[name=collection_id]").addClass("hide");
            $("select[name=collection_id]").each(function(){
                $(this).find("option:eq(0)").prop("selected", true);
            });
            // collection hide END

            // show controls which are supported for type = text
            $(".show-for-tc").removeClass("hide");

            // hide controls which are NOT supported for type = text
            $(".show-for-link").addClass("hide");

        }else if(selPT.val() == "collection"){

            // collection show START
            $("select[name=collection_id]").removeClass("hide");
            $("select[name=collection_id]").closest(".form-group").find(".control-label .required").removeClass("disabled");
            // collection show END

            // show controls which are supported for type = collection
            $(".show-for-tc").removeClass("hide");

            // hide controls which are NOT supported for type = collection
            $(".show-for-link").addClass("hide");

        }else if(selPT.val() == "link"){

            // collection hide START
            $("select[name=collection_id]").addClass("hide");
            $("select[name=collection_id]").each(function(){
                $(this).find("option:eq(0)").prop("selected", true);
            });
            // collection hide END

            // show controls which are supported for type = link
            $(".show-for-link").removeClass("hide");

            // hide controls which are NOT supported for type = link
            $(".show-for-tc").addClass("hide");

        }
    }

    checkselPT();

});