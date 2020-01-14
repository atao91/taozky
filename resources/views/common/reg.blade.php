<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>会员注册</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <link rel="stylesheet" href="/style/css/weui.css"/>
    <link rel="stylesheet" href="/style/css/weuix.css"/>
    <link rel="stylesheet" href="/style/css/style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .wj-mm{
            text-align: right;
            line-height: 33px;
            padding-right: 10px;
            padding-top: 3px;
            font-size: 14px;
        }
        .wj-mm a{
            color:#ffbd30;
        }
    </style>
    <script src="/style/js/zepto.min.js"></script>
    <script src="/style/js/zepto.weui.js"></script>
    <script src="/style/js/lrz.min.js"></script>
    <script>
        $(function(){
            // $(document).on("click","#btn",function(){
            //     var user = $("#user").val();
            //     if(user==""){
            //         $.toptip("用户名不能为空");
            //         return false;
            //     }else{
            //         $.toptip("提交成功",'success');
            //     }
            // })
            //解决表单控件不能回弹 只有微信ios有这个问题
            $("input,select,textarea").blur(function(){
                setTimeout(() => {
                    const scrollHeight = document.documentElement.scrollTop || document.body.scrollTop || 0;
                    window.scrollTo(0, Math.max(scrollHeight - 1, 0));
                }, 100);
            })
        });

        function textarea(input) {
            var content = $(input);
            var max =  content.next().find('i') .text();
            var value = content.val();
            if (value.length>0) {

                value = value.replace(/\n|\r/gi,"");
                var len = value.length;
                content.next().find('span').text(len) ;
                if(len>max){
                    content.next().addClass('f-red');
                }else{
                    content.next().removeClass('f-red');
                }
            }
        }
        function cleartxt(obj){
            $(obj).prev().find('.weui-input').val("");
            return false;
        }

        function cleararea(obj){
            $(obj).prev().find('.weui-textarea').val("").next().find("span").text(0);
            return false;
        }

    </script>
</head>
<body>
<div class="page-hd">
    <h1 class="page-hd-title">
        会员注册
    </h1>
    <p class="page-hd-desc">
    </p>
</div>
<form method="POST" action="{{ route('register') }}">
{{--<form method="POST" action="{{ route('register.regs') }}">--}}
    @csrf
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell @error('username') weui-cell_warn @enderror">
            <div class="weui-cell__hd">
                <label class="weui-label">用户名</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="username" id="username"  placeholder="请输入手机号" value="{{ old('username') }}" required type="tel">
            </div>
            @error('username')
            <div class="weui-cell__ft">
                <i class="weui-icon-warn"></i>
            </div>
            @enderror
        </div>
        @error('username')
        <div class="weui-cells__tips" style="color: red" role="alert">{{ $message }}</div>
        @enderror
        <div class="weui-cell weui-cell_vcode">
            <div class="weui-cell__hd">
                <label class="weui-label">验证码</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="code" placeholder="验证码" type="number" required>
            </div>
            @error('code')
            <div class="weui-cell__ft">
                <i class="weui-icon-warn"></i>
            </div>
            @enderror
            <div class="weui-cell__ft">
                <a class="weui-vcode-btn" onclick="settime(this)">获取验证码</a>
            </div>
        </div>
        @error('code')
        <div class="weui-cells__tips" style="color: red" role="alert">{{ $message }}</div>
        @enderror
        <div class="weui-cell @error('password') weui-cell_warn @enderror">
            <div class="weui-cell__hd">
                <label class="weui-label">密码</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="password" placeholder="请输入密码" type="password" required>
            </div>
            @error('password')
            <div class="weui-cell__ft">
                <i class="weui-icon-warn"></i>
            </div>
            @enderror
        </div>
        @error('password')
        <div class="weui-cells__tips" style="color: red" role="alert">{{ $message }}</div>
        @enderror
        <div class="weui-cell @error('password-confim') weui-cell_warn @enderror">
            <div class="weui-cell__hd">
                <label class="weui-label">确认密码</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="password_confirmation" placeholder="请输入确认密码" type="password" required autocomplete="new-password">
            </div>
            @error('password-confim')
            <div class="weui-cell__ft">
                <i class="weui-icon-warn"></i>
            </div>
            @enderror
        </div>
    </div>
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell @error('name') weui-cell_warn @enderror">
            <div class="weui-cell__hd">
                <label class="weui-label">真实姓名</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="name" placeholder="身份证姓名一致，填写后不可编辑更改" type="text" value="{{ old('name') }}" required>
            </div>
            @error('name')
            <div class="weui-cell__ft">
                <i class="weui-icon-warn"></i>
            </div>
            @enderror
        </div>
        @error('name')
        <div class="weui-cells__tips" style="color: red" role="alert">{{ $message }}</div>
        @enderror
        <div class="weui-cell @error('wechats') weui-cell_warn @enderror">
            <div class="weui-cell__hd">
                <label class="weui-label">微信号</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="wechats" placeholder="请输入微信号" type="text" value="{{ old('wechats') }}" required >
            </div>
            @error('wechats')
            <div class="weui-cell__ft">
                <i class="weui-icon-warn"></i>
            </div>
            @enderror
        </div>
        @error('wechats')
        <div class="weui-cells__tips" style="color: red" role="alert">{{ $message }}</div>
        @enderror

        <div class="weui-cell @error('qq') weui-cell_warn @enderror">
            <div class="weui-cell__hd"><label class="weui-label">QQ</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" pattern="[0-15]*" name="qq" placeholder="请输入qq号" type="number" value="{{ old('qq') }}" required >
            </div>
            @error('qq')
            <div class="weui-cell__ft">
                <i class="weui-icon-warn"></i>
            </div>
            @enderror
        </div>
        @error('qq')
        <div class="weui-cells__tips" style="color: red" role="alert">{{ $message }}</div>
        @enderror

        <div class="weui-cell @error('bank_name') weui-cell_warn @enderror">
            <div class="weui-cell__hd">
                <label class="weui-label">开户银行</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="bank_name" placeholder="开户银行：例如 建设银行" type="text" value="{{ old('bank_name') }}" required >
            </div>
            @error('bank_name')
            <div class="weui-cell__ft">
                <i class="weui-icon-warn"></i>
            </div>
            @enderror
        </div>
        @error('bank_name')
        <div class="weui-cells__tips" style="color: red" role="alert">{{ $message }}</div>
        @enderror
        <div class="weui-cell @error('bank_branch') weui-cell_warn @enderror">
            <div class="weui-cell__hd">
                <label class="weui-label">开户支行</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="bank_branch" placeholder="开户银行：例如 世纪大道支行" type="text" value="{{ old('bank_branch') }}" required >
            </div>
            @error('bank_branch')
            <div class="weui-cell__ft">
                <i class="weui-icon-warn"></i>
            </div>
            @enderror
        </div>
        @error('bank_branch')
        <div class="weui-cells__tips" style="color: red" role="alert">{{ $message }}</div>
        @enderror
        <div class="weui-cell @error('bank_no') weui-cell_warn @enderror">
            <div class="weui-cell__hd"><label class="weui-label">卡号</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" pattern="[0-18]*" name="bank_no" placeholder="请输入卡号" type="number" value="{{ old('bank_no') }}" required >
            </div>
            @error('bank_no')
            <div class="weui-cell__ft">
                <i class="weui-icon-warn"></i>
            </div>
            @enderror
        </div>
        @error('bank_no')
        <div class="weui-cells__tips" style="color: red" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell @error('bank_addr') weui-cell_warn @enderror">
            <div class="weui-cell__bd">
                <textarea class="weui-textarea" name="bank_addr" placeholder="所在地址信息" rows="3" onkeyup="textarea(this);" required>{{ old('bank_addr') }}</textarea>
                <div class="weui-textarea-counter"><span>0</span>/<i>30</i></div>
            </div>
            <i class="weui-icon-clear" onclick="cleararea(this)"></i>
            @error('bank_addr')
            <div class="weui-cell__ft">
                <i class="weui-icon-warn"></i>
            </div>
            @enderror
        </div>
        @error('bank_name')
        <div class="weui-cells__tips" style="color: red" role="alert">{{ $message }}</div>
        @enderror
        <div class="weui-cell @error('jieshao') weui-cell_warn @enderror">
            <div class="weui-cell__hd">
                <label class="weui-label">介绍人</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="jieshao" placeholder="请输入介绍人的手机号" type="tel" value="{{ old('jieshao') }}" required >
            </div>
            @error('jieshao')
            <div class="weui-cell__ft">
                <i class="weui-icon-warn"></i>
            </div>
            @enderror
        </div>

    </div>
    <div class="weui-cells weui-cells_form  @error('id_card_img') weui-cell_warn @enderror" style="padding: 10px 15px;">
        <div class="weui-uploader">
            <div class="weui-uploader__hd">
                <p class="weui-uploader__title">身份证上传</p>
{{--                <div class="weui-uploader__info">0/1</div>--}}
            </div>
            <div class="weui-uploader__bd">
                <ul class="weui-uploader__files">
                </ul>
                <div class="weui-uploader__input-box">
                    <input class="weui-uploader__input" accept="image/*" multiple="" type="file" onchange="uploadimg_card(this)">
                    <input type="hidden" name="id_card_img" id="id_card_img" >
                </div>
                @error('id_card_img')
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
                @enderror
            </div>
            @error('id_card_img')
            <div class="weui-cells__tips" style="color: red" role="alert">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="weui-cells weui-cells_form   @error('bank_img') weui-cell_warn @enderror"  style="padding: 10px 15px;">
        <div class="weui-uploader">
            <div class="weui-uploader__hd">
                <p class="weui-uploader__title">银行卡上传</p>
{{--                <div class="weui-uploader__info">0/1</div>--}}
            </div>
            <div class="weui-uploader__bd">
                <ul class="weui-uploader__files">
                </ul>
                <div class="weui-uploader__input-box">
                    <input class="weui-uploader__input" accept="image/*" multiple="" type="file" onchange="uploadimg_bank(this)">
                    <input type="hidden" name="bank_img" id="bank_img">
                </div>
                @error('bank_img')
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
                @enderror
            </div>
            @error('bank_img')
            <div class="weui-cells__tips" style="color: red" role="alert">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="weui-flex">
        <div class="weui-flex__item">
            <label for="weuiAgree" class="weui-agree">
            </label>
        </div>
        <div class="weui-flex__item wj-mm"><a href="{{ route('login') }}">已经注册，去登录</a></div>
    </div>
    <div class="weui-btn-area">
        <button class="weui-btn weui-btn_primary"  id="btn">{{ __('Register') }}</button>
    </div>
</form>
<script>
    var _token = '{{ csrf_token() }}';
    function removeimg(obj){
        $.confirm('您确定要删除吗?', '确认删除?', function() {$(obj).remove();});
        return false;
    }
    function uploadimg_card(obj) {
        lrz(obj.files[0],{width:750,fieldName:"file"}).then(function(data) {
            $.post("{{ route('uploader_img') }}",{imgbase64: data.base64,_token:_token},function(rs){
                $(obj).parent().prev().html('<li onclick="removeimg(this)" class="weui-uploader__file" style="background-image:url('+rs.src+')"><input value="'+rs.src+'"  type="hidden"  name="file" /></li>');
                $('#id_card_img').val(rs.src)
            },'json');

        }).then(function(data) {

        }).catch(function(err) {
            console.log(err);
        });
    }
    function uploadimg_bank(obj) {
        lrz(obj.files[0],{width:750,fieldName:"file"}).then(function(data) {
            $.post("{{ route('uploader_img') }}",{imgbase64: data.base64,_token:_token},function(rs){
                $(obj).parent().prev().html('<li onclick="removeimg(this)" class="weui-uploader__file" style="background-image:url('+rs.src+')"><input value="'+rs.src+'"  type="hidden"  name="file" /></li>');
                $('#bank_img').val(rs.src)
            },'json');

        }).then(function(data) {

        }).catch(function(err) {
            console.log(err);
        });
    }
    // 验证手机号
    function isPhoneNo(username) {
        var data = {
            'username':username,
            '_token':'{{ csrf_token() }}',
        };
        $.ajax({
            url:"{{ route('register.sendcode') }}",
            data:data,
            type:'POST',
            cache:false,
            dataType:'json',
            success:function(data) {
                $.toast(data.message);
            },
            error : function() {
                console.log('errpr')
            }
        });
    }
    var countdown=60;
    function settime(obj) {
        var pattern = /^1[345678]\d{9}$/;
        var username = $('#username').val();
        console.log(username)
        if(pattern.test(username)){
            if(countdown == 60){
                isPhoneNo(username)
            }
            if (countdown == 0) {
                $(obj).removeAttr("disabled");
                $(obj).html("获取验证码");
                countdown = 60;
                return;
            } else {
                $(obj).attr("disabled", true);
                $(obj).html("重新发送(" + countdown + ")");
                countdown--;
            }
            setTimeout(function() {
                    settime(obj) }
                ,1000)
        }else{
            $.toast('请输入正确的手机号码');
            $('#username').val('');
            return false;
        }
    }
</script>
</body>
</html>
