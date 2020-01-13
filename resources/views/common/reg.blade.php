<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <link rel="stylesheet" href="/style/css/weui.css"/>
    <link rel="stylesheet" href="/style/css/weuix.css"/>
    <link rel="stylesheet" href="/style/css/style.css">
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
            $(document).on("click","#btn",function(){
                var user = $("#user").val();
                if(user==""){
                    $.toptip("用户名不能为空");
                    return false;
                }else{
                    $.toptip("提交成功",'success');
                }
            })
            //解决表单控件不能回弹 只有微信ios有这个问题
            $("input,select,textarea").blur(function(){
                setTimeout(() => {
                    const scrollHeight = document.documentElement.scrollTop || document.body.scrollTop || 0;
                    window.scrollTo(0, Math.max(scrollHeight - 1, 0));
                }, 100);
            })

        });

        var countdown=60;

        function settime(obj) {

            var code = $(obj);
            if (countdown == 0) {
                code.removeAttr('disabled');
                code.text("获取验证码");
                countdown =60;
                return;
            } else {
                code.text("重新发送(" + countdown + ")");
                code.attr('disabled',true);
                countdown--;
            }
            setTimeout(function() {
                settime(obj) }, 1000);

        }

        function getcode(){
            $("#code").attr("src","../php/code.php?random="+Math.random());

            // 验证手机号
            function isPhoneNo(username) {
                var data = {
                    'username':username,
                    '_token':'<?php echo e(csrf_token()); ?>',
                };
                $.ajax({
                    url:"<?php echo e(route('register.sendcode')); ?>",
                    data:data,
                    type:'POST',
                    cache:false,
                    dataType:'json',
                    success:function(data) {
                        alert(data.message);
                    },
                    error : function() {
                        console.log('errpr')
                    }
                });
            }
        };

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
<body ontouchstart>
<div class="page-hd">
    <h1 class="page-hd-title">
        会员注册
    </h1>
    <p class="page-hd-desc"></p>
</div>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label">用户名</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="username" placeholder="请输入手机号" type="tel">
            </div>
        </div>
        <div class="weui-cell weui-cell_vcode">
            <div class="weui-cell__hd">
                <label class="weui-label">验证码</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="code" placeholder="验证码" type="number">
            </div>
            <div class="weui-cell__ft">
                <button  class="weui-vcode-btn" onclick="settime(this)">获取验证码</button>
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label">密码</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="password" placeholder="请输入密码" type="password">
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label">确认密码</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="password-confim" placeholder="请输入确认密码" type="password">
            </div>
        </div>
    </div>
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label">真实姓名</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="name" placeholder="身份证姓名一致，填写后不可编辑更改" type="text">
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label">微信号</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="wechats" placeholder="请输入微信号" type="text">
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">QQ</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" pattern="[0-12]*" name="qq" placeholder="请输入qq号" type="number" >
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label">开户银行</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="bank_name" placeholder="开户银行：例如 建设银行" type="text">
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label">开户支行</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="bank_branch" placeholder="开户银行：例如 世纪大道支行" type="text">
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">卡号</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" pattern="[0-18]*" name="bank_no" placeholder="请输入卡号" type="number">
            </div>
            <div class="weui-cell__ft">
                <i class="weui-icon-warn"></i>
            </div>
        </div>
    </div>
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <textarea class="weui-textarea" name="bank_addr" placeholder="所在地址信息" rows="3" onkeyup="textarea(this);"></textarea>
                <div class="weui-textarea-counter"><span>0</span>/<i>30</i></div>
            </div>
            <i class="weui-icon-clear" onclick="cleararea(this)"></i>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label">介绍人</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="jieshao" placeholder="请输入介绍人的手机号" type="tel">
            </div>
        </div>
    </div>
    <div class="weui-cells weui-cells_form" style="padding: 10px 15px;">
        <div class="weui-uploader">
            <div class="weui-uploader__hd">
                <p class="weui-uploader__title">身份证上传</p>
                <div class="weui-uploader__info">0/1</div>
            </div>
            <div class="weui-uploader__bd">
                <ul class="weui-uploader__files">
                </ul>
                <div class="weui-uploader__input-box">
                    <input class="weui-uploader__input" accept="image/*" multiple="" type="file" onchange="uploadimg_card(this)">
                    <input type="hidden" name="id_card_img" id="id_card_img">
                </div>
            </div>
        </div>
    </div>
    <div class="weui-cells weui-cells_form" style="padding: 10px 15px;">
        <div class="weui-uploader">
            <div class="weui-uploader__hd">
                <p class="weui-uploader__title">银行卡上传</p>
                <div class="weui-uploader__info">0/1</div>
            </div>
            <div class="weui-uploader__bd">
                <ul class="weui-uploader__files">
                </ul>
                <div class="weui-uploader__input-box">
                    <input class="weui-uploader__input" accept="image/*" multiple="" type="file" onchange="uploadimg_bank(this)">
                    <input type="hidden" name="bank_img" id="bank_img">
                </div>
            </div>
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
        <a class="weui-btn weui-btn_primary" href="javascript:" id="btn">立即注册</a>
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
</script>
</body>
</html>
