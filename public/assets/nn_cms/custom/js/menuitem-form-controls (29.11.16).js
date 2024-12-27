$(function(){

    // select menuitem type for example:(url(link), category)
    $("select[name=type]").change(function(){

    	var menuitemForm = $(".menuitem-form");
    	menuitemForm.find(".form-group").removeClass("has-error");
    	var selPT = $(this);
    	checkselPT(selPT);

        // change other select[name=category_id] control if it exists (For example: in multiple language edit it exits)
        var selPTSelectedIndex = $(this).closest(".form-group").find("select[name=category_id]")[0].selectedIndex;

        $("select[name=category_id]").each(function(){ 
            $(this).find("option:eq(" + selPTSelectedIndex + ")").prop("selected", true);
        });

    });

    function checkselPT(selPT = $("select[name=type]")){
        if(selPT.val() == "text"){

            //slugify name START
            var slugifiedText = slugify($("input[name=name]").val());
            $("input[name=slug]").val(slugifiedText);
            //slugify name END

            // category hide START
            $("select[name=category_id]").addClass("hide");
            $("select[name=category_id]").each(function(){ 
                $(this).find("option:eq(0)").prop("selected", true);
            });
            // category hide END

            // slug enable START
            $("input[name=slug]").closest(".form-group").removeClass("disabled");
            $("input[name=slug]").removeAttr("readonly");
            // slug enable END

            // link disable START
            $("input[name=link]").closest(".form-group").addClass("disabled");
            $("input[name=link]").attr("readonly", "readonly");
            // link disable START

            // body enable START
            $("textarea[name=body]").closest(".form-group").removeClass("disabled");
            $("textarea[name=body]").removeAttr("disabled");
            // body enable END

            // set photo enable START
            $(".filemanager-btn").closest(".form-group").removeClass("disabled");
            $(".filemanager-btn").removeAttr("disabled");
            // set photo enable END

        }else if(selPT.val() == "category"){

            //slugify name START
            var slugifiedText = slugify($("input[name=name]").val());
            $("input[name=slug]").val(slugifiedText);
            //slugify name END

            // category show START
            $("select[name=category_id]").removeClass("hide");
            $("select[name=category_id]").closest(".form-group").find(".control-label .required").removeClass("disabled");
            // category show END

            // slug enable START
        	$("input[name=slug]").closest(".form-group").removeClass("disabled");
            $("input[name=slug]").removeAttr("readonly");
            // slug enable END

            // link disable START
            $("input[name=link]").closest(".form-group").addClass("disabled");
            $("input[name=link]").attr("readonly", "readonly");
            // link disable END

            // body enable START
            $("textarea[name=body]").closest(".form-group").removeClass("disabled");
            $("textarea[name=body]").removeAttr("disabled");
            // body enable END

            // set photo enable START
            $(".filemanager-btn").closest(".form-group").removeClass("disabled");
            $(".filemanager-btn").removeAttr("disabled");
            // set photo enable END

        }else if(selPT.val() == "link"){

            // category hide START
            $("select[name=category_id]").addClass("hide");
            $("select[name=category_id]").each(function(){ 
                $(this).find("option:eq(0)").prop("selected", true);
            });
            // category hide END

            // link enable START
            $("input[name=link]").closest(".form-group").removeClass("disabled");
            $("input[name=link]").removeAttr("readonly");
            // link enable END

            // slug disable START
            $("input[name=slug]").closest(".form-group").addClass("disabled");
        	$("input[name=slug]").attr("readonly", "readonly");
            // slug disable END

            // body disable START
            $("textarea[name=body]").closest(".form-group").addClass("disabled");
            $("textarea[name=body]").attr("disabled", "disabled");
            // body disable END

            // set photo disable START
            $(".filemanager-btn").closest(".form-group").addClass("disabled");
            $(".filemanager-btn").attr("disabled", "disabled");
            // set photo disable END

        }
    }

    checkselPT();

    // slugify name if menuitem type is category
    $("input[name=name]").keyup(function(){

        if($("select[name=type]").val() !== "link"){
            var slugInput = $("input[name=slug]");
            var slugifiedText = slugify($(this).val());
            slugInput.val(slugifiedText);
        }

    });

    $("input[name=slug]").blur(function(){

        var slugifiedText = slugify($(this).val());
        $(this).val(slugifiedText);

    });

    function slugify(text){

        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');            // Trim - from end of text

    }
});