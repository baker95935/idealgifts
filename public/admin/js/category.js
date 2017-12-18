$(function () {
    $('.delete').click(function () {
         var id = $(this).attr('data_id');
        layer.confirm('是否删除所选的分类', {
            btn: ['是', '否']
        }, function () {
           $.post("?p=admin&c=category&a=delete",{"category_id":id},function(data){
               if(data == "ok"){
                   layer.msg("删除成功",{icon: 6, time: 2000});
                   window.location.reload();
               }else{
                   layer.msg("删除失败",{icon: 5, time: 2000});
               }
           });
        }, function () {            
        });
    });
    $('.is-show').click(function(){
        var parent = $(this).parents('tr');
        var id = parent.find('.delete').attr('data_id');
        var src = $(this).attr('src');
        var msg = "";
        var is_show = 0;
        var _this = $(this);
        if(src.indexOf('yes') == -1){
           msg = "显示所选分类及其子分类";
           is_show = 1;
       }
       else{
           msg = "不显示所选分类及其子分类"; 
           is_show = 0;
       }
           
        layer.confirm(msg, {
            btn: ['是', '否']
        }, function () {
           $.post("?p=admin&c=category&a=is_show",{"category_id":id,"is_show":is_show},function(data){
               if(data == "ok"){
                   layer.msg("操作成功",{icon: 6, time: 2000});
                   if(is_show){
                       _this.attr("src","public/images/yes.gif");
                   }else{
                       _this.attr("src","public/images/no.gif");
                   }
               }else{
                   layer.msg("操作失败",{icon: 5, time: 2000});
               }
           });
        }, function () {            
        });
    });
})

