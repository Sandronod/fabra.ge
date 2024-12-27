// default

$("#sortable").sortable();

$("#sortable").sortable("disable");

$("#sortable").disableSelection();



//custom

$(".sort-switch-box").on('switchChange.bootstrapSwitch', function(event, state){

    if(state){

        $("#sortable").sortable("enable");

    } else {

        $("#sortable").sortable("disable");

    }

});



// check all

$(".check-all").change(function(){

    $(".ui-sortable").toggleClass("check-all-active");

    $(".delete-all").toggleClass("active");

});



// delete all

$(".confirm-delete-all").click(function(){

    $.ajax({

        url: "slider/deleteall",

        type: "POST",

        data: {"_token" : $('meta[name="csrf-token"]').attr('content')},

        success: function(data, textStatus, jqXHR){

            $(".ui-state-default").remove();

        },

        error: function (jqXHR, textStatus, errorThrown){

            alert(errorThrown);

        }

    });

    $(".check-all").prop('checked', false);

    $(".check-all").closest(".checker").find(".checked").removeClass("checked");

    $(".ui-sortable").removeClass("check-all-active");

    $(".delete-all").removeClass("active");

});



// save positions

var slider_p;



$("#sortable").sortable({

    stop: function(e, ui){

        slider_p = [];



        $.map($(this).find(".ui-state-default"), function(el){



                slider_p.push({

                    'id' : $(el).data("id"),

                    'position' : $(el).index()

                });



            },



            $(".save-changes").addClass("active")

        );

    }

});



$(".save-changes").click(function(e){

    e.preventDefault();



    var updateSuccessText = $(this).data("update-success-text");

    var updateErrorText = $(this).data("update-error-text");



    slider_p = JSON.stringify(slider_p);

    $.ajax({

        url: "slider/updateposition",

        type: "POST",

        data: {slider_p : slider_p, "_token" : $('meta[name="csrf-token"]').attr('content')},

        success: function(data, textStatus, jqXHR){

            Command: toastr["success"](updateSuccessText);

        },

        error: function (jqXHR, textStatus, errorThrown){

            Command: toastr["error"](updateErrorText);

        }

    });

    $(this).removeClass("active");

});