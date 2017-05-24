<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>左眼博客～～登陆</title>
    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="{{asset('/assets')}}/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="{{asset('/assets')}}/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="{{asset('/assets')}}/css/font-awesome.min.css" rel="stylesheet"/>
    <!--Beyond styles-->
    <link href="{{asset('/assets')}}/css/beyond.min.css" rel="stylesheet"/>
    <!--补充css-->
    <link href="{{asset('Admin')}}/css/login.css" rel="stylesheet" />
</head>
<!--Head Ends-->
<!--Body-->
<body>
<!---------提示信息模态框------------------>
<!--Success Modal Templates-->
<div id="modal-success" class="modal modal-message modal-success fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="glyphicon glyphicon-check"></i>
            </div>
            <div class="modal-title">Success</div>

            <div class="modal-body">You have done great!</div>
            <div class="modal-footer">
            </div>
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<!--End Success Modal Templates-->
<!--Info Modal Templates-->
<div id="modal-info" class="modal modal-message modal-info fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-envelope"></i>
            </div>
            <div class="modal-title">Alert</div>

            <div class="modal-body">You'vd got mail!</div>
            <div class="modal-footer">
            </div>
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<!--End Info Modal Templates-->
<!--Danger Modal Templates-->
<div id="modal-danger" class="modal modal-message modal-danger fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="glyphicon glyphicon-fire"></i>
            </div>
            <div class="modal-title">Alert</div>

            <div class="modal-body">You'vd done bad!</div>
            <div class="modal-footer">
            </div>
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<!--End Danger Modal Templates-->
<!--Danger Modal Templates-->
<div id="modal-warning" class="modal modal-message modal-warning fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-warning"></i>
            </div>
            <div class="modal-title">Warning</div>

            <div class="modal-body">Is something wrong?</div>
            <div class="modal-footer">
            </div>
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<!---------------end------------------------->
<hr>
<div class="navbar">
    <div class="navbar-header pull-left">
        <a href="#" class="navbar-brand">
            <small>
                <img src="{{asset('Admin')}}/image/2.jpg" alt=""/>
            </small>
        </a>
    </div>
</div>
<hr>
<div class="login-container animated fadeInDown">
    <div class="loginbox bg-im" >
        <div class="loginbox-title" style="padding-top:30px;" >个人网站</div>
        <form class="border_radius" id="focus" method="post">
            <div class="loginbox-social">
                <div class="social-title" style="margin-top:20px;">Connect with Your Social Accounts</div>
            </div>
            <div class="loginbox-or">
                <div class="or-line"></div>
                <div class="or">登录</div>
            </div>

            <div class="loginbox-textbox">
                <input type="text" class="form-control" id="account" placeholder="account" />
            </div>
            <div class="loginbox-textbox">
                <input type="password" maxlength="16" class="form-control" id="password" placeholder="Password" />
            </div>
            {{--<div class="loginbox-textbox">--}}
                {{--<input type="text"  class="form-control" id="code" placeholder="请输入验证码" />--}}
            {{--</div>--}}
            {{--<div class="loginbox-textbox">--}}
                {{--<img src="{{url("Admin/captcha")}}" onclick="this.src='{{url("Admin/captcha")}}'+'?'+Math.random()"--}}
                     {{--text="点击更换" class="yazhengma" />--}}
                {{--<a href="javascript:void(0);" onclick="$('.yazhengma').click();">看不清，换一张？</a>--}}
            {{--</div>--}}
            <div class="loginbox-submit">
                <input type="button" class="btn btn-primary btn-block" id="login_click"value="Login">
                <input type="hidden" id="_url" value="{{url("Admin/validator")}}" />
                <input type="hidden" id="target_url" value={{url("Admin/my_articles")}}>
                {!! csrf_field() !!}
            </div>
        </form>
        {{--<div class="loginbox-forgot">--}}
            {{--<a href="{:U('find_password')}">忘记密码？</a>--}}
        {{--</div>--}}
        {{--<div class="loginbox-forgot s-font">--}}
            {{--<a href="{:U('register')}">注册</a>--}}
        {{--</div>--}}
    </div>
</div>
<script src="{{asset('/assets')}}/js/skins.min.js"></script>
<!--Basic Scripts-->
<script src="{{asset('/assets')}}/js/jquery-2.0.3.min.js"></script>
<script src="{{asset('/assets')}}/js/bootstrap.min.js"></script>

<!--Beyond Scripts-->
<script src="{{asset('/assets')}}/js/beyond.min.js"></script>
<script src="{{asset('/Admin')}}/js/base.js"></script>
<!--Google Analytics::Demo Only-->
<script>
    $('#login_click').on('click', function() {
        $(this).attr("disabled",true);
        var account = $('#account').val();
        var password = $('#password').val();
        //var code = $('#code').val();
        var url = $('#_url').val();
        var _token = $("input[name='_token']") .val();
        if (account==''||password=='') {
            alert_info(2,"警告","用户名或密码不能为空");
//        }else if(code==''){
//            alert_info(2,"警告",'请输入验证码');
        }else{
            $.post(
                    url,
                    {
                        account:account,
                        password:password,
                        //code:code,
                        _token:_token
                    },
                    function(msg){
                        msg = eval("("+msg+")")
                        if(msg['msg_code'] == 0){
                            alert_info(0,"成功",msg['msg']);
                            var url= $("#target_url").val();
                            setTimeout(function(){window.location=url;},2000);
                        }else{
                            $('#login_click').attr("disabled",false);
                            alert_info(1,"失败",msg['msg']);
                            $(".yazhengma").click();
                        }
                    }
            );
        }
    });

</script>
</body>
<!--Body Ends-->
</html>
