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
                
                
});

