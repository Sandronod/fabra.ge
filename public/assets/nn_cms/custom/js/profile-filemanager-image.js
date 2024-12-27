$(function(){

	// open filemanager for insert image

    $(".filemanager-btn").filemanager("image");

    // delete filemanager image

    $(".remove-filemanager-photo").click(function(){

    	var showImg = $(".profile-userpic-showimg");

    	var defaultPhotoSrc = showImg.data("default-photo-src");

    	var imgurl = $(".profile-imgurl");

    	showImg.attr("src", defaultPhotoSrc);

    	imgurl.val("");

    });

});