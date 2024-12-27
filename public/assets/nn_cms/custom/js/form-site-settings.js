$(function(){

    $("body").on("click", ".form_ajax button[type=submit]", function (e) {

        e.preventDefault();

        var updateSuccessText = $(this).data("update-success-text");

        var form = $("#form_site_setting");

        var data = form.serializeArray();

        var url = form.attr("action");

        var type = form.attr("method");

        $.ajax({

            url: url,

            type: type,

            data: data,

            beforeSend: function (data) {

            },

            success: function (data) {

                if (data == 1) {
                    Command: toastr["success"](updateSuccessText);
                } else {
                    Command: toastr["error"](data);
                }

            },

            error: function (data) {

            },

            complete: function (data) {

            },

        });

    });

});