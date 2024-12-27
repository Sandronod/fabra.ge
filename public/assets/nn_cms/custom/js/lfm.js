var mlang = '';

var type = '';

(function($){


    $.fn.filemanager = function(type = 'image') {

        if (type === 'image' || type === 'images') {

            type = 'Images';

        } else {

            type = 'Files';

        }



        globalType = type;



        let input_id = this.data('input');

        let preview_id = this.data('preview');



        this.on('click', function(e) {

            mlang = ($(this).data('lang') !== '') ? '_' + $(this).data('lang') : '';    

            localStorage.setItem('target_input', input_id);

            localStorage.setItem('target_preview', preview_id);



            var windowWidth = 1200;

            var windowHeight = 600;

            var x = screen.width / 2 - windowWidth / 2;

            var y = screen.height / 2 - windowHeight / 2;

            window.open('/filemanager?type=' + type, 'FileManager', 'width=' + windowWidth + ',height=' + windowHeight + ',left=' + x + ',top=' + y);

            

            return false;

        });



    }



})(jQuery);


var ImgId = "";
function chooseImg(t){
  ImgId = t;
}

function SetUrl(url) {
  //set the value of the desired input to image url
 url = url[0].url;
  idimg = "imgurl";
  idinput = "showImg";

  if(ImgId == "header_logo"){
    idimg = "header_logo";
    idinput = "header_logo_show_img";
  }

  if(ImgId == "footer_logo"){
    idimg = "footer_logo";
    idinput = "footer_logo_show_img";
  }

  if(ImgId == "profile_logo"){
    idimg = "profile_logo";
    idinput = "profile_logo_show_img";
  }
  
  if (globalType == 'Images') {

    let target_input = $('#'+idimg + mlang);

    target_input.val(url);



    //set or change the preview image src

    let target_preview = $('#'+idinput + mlang);

    target_preview.attr('src', url);



  } else {



    //set the value of the desired input to image url

    let target_input = $('#fileurl' + mlang);

    target_input.val(url);



    //set or change the preview image src

    let target_preview = $('#showFile' + mlang);

    target_preview.attr('src', url);



  }

}