$(function(){

    var commonFormControl = $(".common-form-control");

    // select category
    commonFormControl.keyup(function(){

        // change relative .common-form-control control value
        var selectedName = $(this).attr("name");
        var selectedValue = $(this).val();

        $(".common-form-control[name="+selectedName+"]").each(function(){
            $(this).val(selectedValue);
        });

    });

});