$(function(){

	// open filemanager for insert image
	// var route_prefix = "http://localhost:8000/filemanager";
	//$('#lfm').filemanager('image', {prefix: route_prefix});
    $(".filemanager-btn").filemanager("image");

    // delete filemanager image

    $(".remove-filemanager-photo").click(function(){

    	var photo = $(this).closest(".photo");

    	var showImg = photo.find(".img");

    	var defaultPhotoSrc = showImg.data("default-photo-src");

    	var imgurl = photo.find("input[name=imgurl]");

    	showImg.attr("src", defaultPhotoSrc);

    	imgurl.val("");

    });

});