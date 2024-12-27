$(function(){

    var commonFormSelectControl = $(".common-form-select-control");

    // select category
    commonFormSelectControl.change(function(){

        // change relative .common-form-select-control control selected option
        var selectedName = $(this).attr("name");

        if($(this).attr("multiple")) {

            selectedName = $(this).attr("name");
            selectedName = selectedName.replace("[]", "\\[\\]");
            var selectedIndexes = [];

            $(this).find("option").each(function(i, v){

                if (this.selected) selectedIndexes.push(i);

            });

            $(".common-form-select-control[name='"+selectedName+"']").each(function(){

                $(this).find("option:selected").prop("selected", false);

                $(this).find("option").each(function(i, v){

                   if($.inArray(i, selectedIndexes) !== -1) $(this).prop("selected", true);

                });

            });

        } else {

            selectedName = $(this).attr("name");
            var selectedIndex = $(this)[0].selectedIndex;

            $(".common-form-select-control[name="+selectedName+"]").each(function(){

                $(this).find("option:eq(" + selectedIndex + ")").prop("selected", true);

            });

        }

        // refresh if it's bootstrap-selectpicker
        if($(this).hasClass("selectpicker")) {

            $(".common-form-select-control.selectpicker").selectpicker("refresh");

        }

    });

});