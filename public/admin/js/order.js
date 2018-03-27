$(function () {
    $('.delete').click(function () {
         var id = $(this).attr('data_id');
        layer.confirm('是否删除所选的订单', {
            btn: ['是', '否']
        }, function () {
           $.post("?p=admin&c=order&a=delete",{"order_number":id},function(data){
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


