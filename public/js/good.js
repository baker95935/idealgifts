$(function () {
    go_back = function(){
        window.history.go(-1);
        return false;
    }
    var url = window.location.href;
    
    var cat_str = url.match(/cat_id=\d+/);
 
    if(cat_str) {
        var arr = String(cat_str).split("=");
        var category_id = arr[1];
        $("#category"+category_id).parent().addClass("current");
    }
    
    $.preloadImages = function () {
        for (var i = 0; i < arguments.length; i++) {
            var img = new Image();
            img.src = arguments[i]
        }
    }
    
    $("#thumb ul li img").each(function(){
        var src = $(this).attr("src");
        $.preloadImages(src.replace("50x50","350x350"));
    });
    $("#thumb ul li img").click(function(){
        var src = $(this).attr("src");
        src = src.replace("50x50","350x350");
      $("#preview").attr("src",src);  
    });
  //  $.preloadImages("image1.jpg", "image2.jpg");
  
  $("#search td").click(function(){
      var id = $(this).parent().attr("good_id");
      window.location.href="?p=home&c=good&a=index&id="+id;
  });
})


