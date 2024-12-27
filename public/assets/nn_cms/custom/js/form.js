$(function(){

    $("body").on("click", ".form_ajax button[type=submit]", function (e) {

        e.preventDefault();



        var updateSuccessText = $(this).data("update-success-text");

        var updateErrorFillInText = $(this).data("update-error-fill-in-text");

        var lang = $(this).data("lang");

        var form = $("#form_" + lang);

        var data = form.serializeArray();

        var url = form.attr("action");

        var type = form.attr("method");



        // Change if textarea is Ckeditor

        var change = ["body", "services_list", "info_list"];



        for(var i = 0; i < change.length; i++){

            data.map(function(item){

                if(item.name == change[i]) {

                    item.value = CKEDITOR.instances[change[i] + "_editor_" + lang].getData();

                }

            });

        }

        

        $.ajax({

            url: url,

            type: type,

            data: data,

            beforeSend: function (data) {

            },

            success: function (data) {

                console.log(data);

                Command: toastr["success"](updateSuccessText);

            },

            error: function (data) {
				

               Command: toastr["error"](updateErrorFillInText);

            },

            complete: function (data) {

            },

        });

    });

});