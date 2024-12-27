$(function(){

    var id;

    // Edit

    $(".edit").click(function(){

        id = $(this).closest(".ui-state-default").data("id");

        $.ajax({

            url: "slider/edit",

            type: "POST",

            data: {id : id, "_token" : $('meta[name="csrf-token"]').attr('content')},

            success: function(data, textStatus, jqXHR){

                console.log(data);

                var sliderItem = JSON.parse(data);

               

                for(var i = 0; i < sliderItem.length; i++){



                    $("#edit-slider-item input#fc-id_" + sliderItem[i].lang).val(sliderItem[i].id);

                    $("#edit-slider-item input#fc-name_" + sliderItem[i].lang).val(sliderItem[i].name);

                    $("#edit-slider-item textarea#fc-description_" + sliderItem[i].lang).val(sliderItem[i].description);

                    $("#edit-slider-item img#showImg_" + sliderItem[i].lang).attr("src", sliderItem[i].imgurl);

                    $("#edit-slider-item input#imgurl_" + sliderItem[i].lang).val(sliderItem[i].imgurl);

                    $("#edit-slider-item input#fc-link_1_" + sliderItem[i].lang).val(sliderItem[i].link_1);

                    $("#edit-slider-item input#fc-link_2_" + sliderItem[i].lang).val(sliderItem[i].link_2);

                    $("#edit-slider-item input#fc-link_name_1_" + sliderItem[i].lang).val(sliderItem[i].link_name_1);

                    $("#edit-slider-item input#fc-link_name_2_" + sliderItem[i].lang).val(sliderItem[i].link_name_2);



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

            url : "slider/destroy",

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