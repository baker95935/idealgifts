 $(document).ready(function () {
 
                
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
				        
				       
			 

				        $.post('/?p=home&c=user&a=check', user, function (data) {
				            if (data == 'ok') {
				                layer.msg('操作成功，正在跳转...', {icon: 6, time: 2000}, function () {
				                    window.location.href = '/?p=home&c=user&a=index';
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
			 

				        $.post('/?p=home&c=user&a=modify', user, function (data) {
				            if (data == 'ok') {
				                layer.msg('操作成功，正在跳转...', {icon: 6, time: 2000}, function () {
				                    window.location.href = '/?p=home&c=user&a=index';
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
				        

				        $.post('/?p=home&c=user&a=modifyemail', user, function (data) {
				            if (data == 'ok') {
				                layer.msg('操作成功，正在跳转...', {icon: 6, time: 2000}, function () {
				                    window.location.href = '/?p=home&c=user&a=index';
				                });
				            }
				        });
              
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
				        
 

				        $.post('/?p=home&c=user&a=insertaddress', user, function (data) {
				            if (data == 'ok') {
				                layer.msg('操作成功，正在跳转...', {icon: 6, time: 2000}, function () {
				                    window.location.href = '/?p=home&c=user&a=addresslist';
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
				        
				        $.post('/?p=home&c=user&a=insertaddress', user, function (data) {
				            if (data == 'ok') {
				                layer.msg('操作成功，正在跳转...', {icon: 6, time: 2000}, function () {
				                    window.location.href = '/?p=home&c=user&a=addresslist';
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
});

