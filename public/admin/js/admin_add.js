 $(document).ready(function () {
                //粒子背景特效
                $('body').particleground({
                    dotColor: '#5cbdaa',
                    lineColor: '#5cbdaa'
                });
                //验证码
                createCode();
                //测试提交，对接程序删除即可
                $('.submit_btn').click(function () {
                    var admin_name = $('#admin_name').val();
                    var admin_pwd = $('#admin_pwd').val();
                    var J_codetext = $('#J_codetext').val();
 
                    if(admin_name == ''){
                        layer.msg('请输入用户名',{icon: 5,time: 2000});
                        return;
                    }
                    
                    if(admin_pwd == ''){
                        layer.msg('请输入密码',{icon: 5,time: 2000});
                        return;
                    }
                    
                    if(J_codetext == ''){
                        layer.msg('请输入验证码',{icon: 5,time: 2000});
                        return;
                    }
                    
                    if(validate()){
                        $.post('?p=admin&c=Login&a=login',{ admin_name: userName, admin_pwd: pwd },function(data){
                        if(data == 'ok'){
                            layer.msg('登陆成功',{icon: 6,time: 2000},function(){
                                window.location.href='?p=admin&c=Index&a=index';
                            });
                        }else{
                            layer.alert(data, {icon: 5}); 
                        }
                    });
                    }
              
                });
            });

