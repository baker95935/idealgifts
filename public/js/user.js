$(document).ready(function () {
	
	$('.add').unbind('click').click(function () {  
});  
	$('.min').unbind('click').click(function () {  
});  
	
$(".add").click(function(){ 
	var t=$(this).parent().find('input[class*=text_box]'); 
	t.val(parseInt(t.val())+1);
	
	var j = new jsonUtil();
	var cart = j.form_to_object('cartlist_form');
	cart.goodcount=t.val();
	cart.cart_id=$(this).parent().find('input[name=cart_id]').val(); 
	$.post('?p=home&c=user&a=mincart', cart, function (data) {
		 
	});
	
 
	}) 
$(".min").click(function(){ 
	var t=$(this).parent().find('input[class*=text_box]'); 
	t.val(parseInt(t.val())-1) 
	if(parseInt(t.val())<1){ 
	t.val(1); 
	} 
	var j = new jsonUtil();
	var cart = j.form_to_object('cartlist_form');
	cart.goodcount=t.val();
	cart.cart_id=$(this).parent().find('input[name=cart_id]').val(); 
	$.post('?p=home&c=user&a=mincart', cart, function (data) {
		 
	});
 
}) 
	
 
	
	
                
                  $('#login_user').click(function () {
                      var t = new jsonUtil();
				        var user = t.form_to_object('login_user_form');

				        if (user.username == '') {
				            layer.msg('please input username', {icon: 5, time: 2000});
				            return;
				        }
				        if (user.password == '') {
				            layer.msg('please input password', {icon: 5, time: 2000});
				            return;
				        }
				        
				       
			 

				        $.post('?p=home&c=user&a=check', user, function (data) {
				            if (data == 'ok') {
				                layer.msg('operation success!，location...', {icon: 6, time: 2000}, function () {
				                    window.location.href = '?p=home&c=user&a=index';
				                });
				            }
				        });
              
                });
                
                    
                  $('#modify_user').click(function () {
                      var t = new jsonUtil();
				        var user = t.form_to_object('modify_user_form');

				        if (user.password_old == '') {
				            layer.msg('please input old password', {icon: 5, time: 2000});
				            return;
				        }
				        if (user.password == '') {
				            layer.msg('please input password', {icon: 5, time: 2000});
				            return;
				        }
				        
				        if (user.password_re == '') {
				            layer.msg('please input password', {icon: 5, time: 2000});
				            return;
				        }
				        
				       	if (user.password.length < 6) {
				            layer.msg('password less 6', {icon: 5, time: 2000});
				            return;
				        }
				        
 
				        if (user.password_re != user.password) {
				            layer.msg('two password is not ok!', {icon: 5, time: 2000});
				            return;
				        }
			 

				        $.post('?p=home&c=user&a=modify', user, function (data) {
				            if (data == 'ok') {
				                layer.msg('operation success!，location...', {icon: 6, time: 2000}, function () {
				                    window.location.href = '?p=home&c=user&a=index';
				                });
				            }
				        });
              
                });
                
                  
                $('#modify_email').click(function () {
                      var t = new jsonUtil();
				        var user = t.form_to_object('modify_user_email');

				        if (user.email == '') {
				            layer.msg('please input your new email', {icon: 5, time: 2000});
				            return;
				        }
				        
				        if (user.email == user.email_old) {
				            layer.msg('two mail is the same!', {icon: 5, time: 2000});
				            return;
				        }
				        

				        $.post('?p=home&c=user&a=modifyemail', user, function (data) {
				            if (data == 'ok') {
				                layer.msg('operation success!，location...', {icon: 6, time: 2000}, function () {
				                    window.location.href = '?p=home&c=user&a=index';
				                });
				            }
				        });
              
                });

	$('#save_address').unbind('click').click(function () {  
	});  
                $('#save_address').click(function () {
                      var t = new jsonUtil();
				        var user = t.form_to_object('add_address_form');

				        if (user.name == '') {
				            layer.msg('please input your new name', {icon: 5, time: 2000});
				            return;
				        }

				        if (user.phone == '') {
				            layer.msg('please input your new phone', {icon: 5, time: 2000});
				            return;
				        }

				        if (user.address == '') {
				            layer.msg('please input your new address', {icon: 5, time: 2000});
				            return;
				        }
				        
 

				        $.post('?p=home&c=user&a=insertaddress', user, function (data) {
				            if (data == 'ok') {
				                layer.msg('operation success!，location...', {icon: 6, time: 2000}, function () {
				                    window.location.href = '?p=home&c=user&a=addresslist';
				                });
				            }
				        });
              
                });

              $('#edit_address').click(function () {
                      var t = new jsonUtil();
				        var user = t.form_to_object('edit_address_form');

				        if (user.name == '') {
				            layer.msg('please input your new name', {icon: 5, time: 2000});
				            return;
				        }

				        if (user.phone == '') {
				            layer.msg('please input your new phone', {icon: 5, time: 2000});
				            return;
				        }

				        if (user.address == '') {
				            layer.msg('please input your new address', {icon: 5, time: 2000});
				            return;
				        }
				        
				        $.post('?p=home&c=user&a=insertaddress', user, function (data) {
				            if (data == 'ok') {
				                layer.msg('operation success!，location...', {icon: 6, time: 2000}, function () {
				                    window.location.href = '?p=home&c=user&a=addresslist';
				                });
				            }
				        });
              
                });
                
        $('.delete').click(function () {
	         var id = $(this).attr('data_id');
	        layer.confirm('is not delete', {
	            btn: ['yes', 'no']
	        }, function () {
	           $.post("?p=home&c=user&a=addressdel",{"id":id},function(data){
	               if(data == "ok"){
	                   layer.msg("delete success!",{icon: 6, time: 2000});
	                   window.location.reload();
	               }else{
	                   layer.msg("delete failed!",{icon: 5, time: 2000});
	               }
	           });
	        }, function () {            
	        });
    	});
    	
    	 $('.deleteCart').click(function () {
	         var id = $(this).attr('data_id');
	        layer.confirm('Are you sure?', {
	            btn: ['yes', 'no']
	        }, function () {
	           $.post("?p=home&c=user&a=cartdel",{"id":id},function(data){
	               if(data == "ok"){
	                   layer.msg("delete success!",{icon: 6, time: 2000});
	                   window.location.reload();
	               }else{
	                   layer.msg("delete failed!",{icon: 5, time: 2000});
	               }
	           });
	        }, function () {            
	        });
    	});
    	
    	 $('.deleteOrder').click(function () {
	         var id = $(this).attr('data_id');
	        layer.confirm('Are you sure?', {
	            btn: ['yes', 'no']
	        }, function () {
	           $.post("?p=home&c=user&a=orderdel",{"id":id},function(data){
	               if(data == "ok"){
	                   layer.msg("delete success!",{icon: 6, time: 2000});
	                   window.location.reload();
	               }else{
	                   layer.msg("delete failed!",{icon: 5, time: 2000});
	               }
	           });
	        }, function () {            
	        });
    	});
    	
    	$('.completeOrder').click(function () {
	         var id = $(this).attr('data_id');
	        layer.confirm('Are you sure?', {
	            btn: ['yes', 'no']
	        }, function () {
	           $.post("?p=home&c=user&a=ordercomplete",{"id":id},function(data){
	               if(data == "ok"){
	                   layer.msg("delete success!",{icon: 6, time: 2000});
	                   window.location.reload();
	               }else{
	                   layer.msg("delete failed!",{icon: 5, time: 2000});
	               }
	           });
	        }, function () {            
	        });
    	});
    	
    	 $('#add_user_order').click(function () {
	     	var t = new jsonUtil();
	        var order = t.form_to_object('add_user_order_form');
 
 			layer.confirm('Are you sure?', {
	            btn: ['yes', 'no']
	        }, function () {
		       $.post('?p=home&c=user&a=addorder', order, function (data) {
		            if (data == 'ok') {
		                layer.msg('operation success!，location...', {icon: 6, time: 2000}, function () {
		                    window.location.href = '?p=home&c=user&a=orderlist';
		                });
		            }else if(data == 'address'){
		            	layer.msg('please add address!', {icon: 5, time: 2000}, function () {
		                    window.location.href = '?p=home&c=user&a=addresslist';
		                });
		            } else{
		                layer.msg(" failed! retry again!",{icon: 5, time: 2000});
		           }
		        });
	        }, function () {            
	        });
	        
	       
        });
});
