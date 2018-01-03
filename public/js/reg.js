 $(document).ready(function () {
                //验证码
                createCode();
                //测试提交，对接程序删除即可
                $('#save_user').click(function () {
                      var t = new jsonUtil();
				        var user = t.form_to_object('add_user_form');

				        if (user.username == '') {
				            layer.msg('please input username', {icon: 5, time: 2000});
				            return;
				        }
				        if (user.password == '') {
				            layer.msg('please input password', {icon: 5, time: 2000});
				            return;
				        }
				        
				        if (user.password.length < 6) {
				            layer.msg('password less 6', {icon: 5, time: 2000});
				            return;
				        }
				        
				        if (user.password_re == '') {
				            layer.msg('please input password_re', {icon: 5, time: 2000});
				            return;
				        }
				        if (user.password_re != user.password) {
				            layer.msg('two password is not ok!', {icon: 5, time: 2000});
				            return;
				        }
						
						if (user.qcode=='') {
				            layer.msg('please input code', {icon: 5, time: 2000});
				            return;
				        }
						if (user.email=='') {
				            layer.msg('please input email', {icon: 5, time: 2000});
				            return;
				        }
			 

				        $.post('/?p=home&c=user&a=insert', user, function (data) {
				            if (data == 'ok') {
				                layer.msg('操作成功，正在跳转...', {icon: 6, time: 2000}, function () {
				                    window.location.href = '/?p=home&c=user&a=index';
				                });
				            } else {
				            	layer.msg(data, {icon: 5, time: 2000});
				            	return;
				            }
				        });
              
                });
                
               
                
});

