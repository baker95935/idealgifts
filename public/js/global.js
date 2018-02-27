$(function(){
   var url = window.location.href;
   if(url.indexOf("?p=home&c=index") != -1){
       $('a[href="?p=home&c=index&a=index"]').text(str).css("cssText","color:rgb(204, 0, 0) !important");
   }else if(url.indexOf("?p=home&c=category") != -1){
        $('a[href="?p=home&c=category&a=index"]').text(str).css("cssText","color:rgb(204, 0, 0) !important");
        //category菜单选中样式
        var id_str = url.match(/id=\d+/)+"";
        if(id_str != "null"){
            var arr = id_str.split("=");
            var id = arr[1];
            $("#category"+id).parent().addClass("current");
        }
   }else if(url.indexOf("?p=home&c=promotion") != -1){
        $('a[href="?p=home&c=promotion&a=index"]').text(str).css("cssText","color:rgb(204, 0, 0) !important");
   }else if(url.indexOf("?p=home&c=technic") != -1){
        $('a[href="?p=home&c=technic&a=index"]').text(str).css("cssText","color:rgb(204, 0, 0) !important");
   }else if(url.indexOf("?p=home&c=contact") != -1){
        
        var str = url.match(/p=home&c=contact&a=index/)+"";
         if(str != "null"){
           $('a[href="?p=home&c=contact&a=index&no"]').parent().addClass("current");
           $('a[href="?p=home&c=contact&a=index"]').css("cssText","color:rgb(204, 0, 0) !important");
        }
        
        str = url.match(/p=home&c=contact&a=link/)+"";
       
        if(str != "null"){
           $('a[href="?p=home&c=contact&a=link&no"]').parent().addClass("current");
           $('a[href="?p=home&c=contact&a=link"]').css("cssText","color:rgb(204, 0, 0) !important");
        }
        
        str = url.match(/p=home&c=contact&a=index&no/)+"";
         if(str != "null"){
           $('a[href="?p=home&c=contact&a=index&no"]').parent().addClass("current");
        }
        str = url.match(/p=home&c=contact&a=link&no/)+"";
          if(str != "null"){
           $('a[href="?p=home&c=contact&a=link&no"]').parent().addClass("current");
        }
   }
   
   var banners = new Array();
   var i=0;
   $(".carousel-inner img").each(function(){
       banners[i] = $(this).attr("src");
       i++;
   });
   i=0;
   var l = banners.length;
   var img = new Image();
   function SImage(index){
      if(i < l){        
          img.src = banners[i];
          img.onload = function(){SImage(i++)};
      }
   }
   SImage(0);
});


