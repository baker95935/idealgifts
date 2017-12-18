$(function () {
    $('.delete').click(function () {
         var id = $(this).attr('data_id');
        layer.confirm('是否删除所选的分类', {
            btn: ['是', '否']
        }, function () {
           $.post("?p=admin&c=good&a=delete",{"good_id":id},function(data){
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
 
})


