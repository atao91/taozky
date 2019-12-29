@extends('layouts.app')
@section('title', '个人设置')
@section('content')
    <style>
        #choose{display: none;}
        #upload{display: block;margin: 10px;height: 60px;text-align: center;line-height: 60px;border: 1px solid;border-radius: 5px;cursor: pointer;}
        .touch{background-color: #ddd;}
        .img-list{margin: 10px 5px;}
        .img-list li{position: relative;display: inline-block;width: 100px;height: 100px;margin: 5px 5px 20px 5px;border: 1px solid rgb(100,149,198);background: #fff no-repeat center;background-size: cover;}
        .progress{position: absolute;width: 100%;height: 20px;line-height: 20px;bottom: 0;left: 0;background-color:rgba(100,149,198,.5);}
        .progress span{display: block;width: 0;height: 100%;background-color:rgb(100,149,198);text-align: center;color: #FFF;font-size: 13px;}
        .size{position: absolute;width: 100%;height: 15px;line-height: 15px;bottom: -18px;text-align: center;font-size: 13px;color: #666;}
        .tips{display: block;text-align:center;font-size: 13px;margin: 10px;color: #999;}
        .pic-list{margin: 10px;line-height: 18px;font-size: 13px;}
        .pic-list a{display: block;margin: 10px 0;}
        .pic-list a img{vertical-align: middle;max-width: 30px;max-height: 30px;margin: -4px 0 0 10px;}

        .weui-cell__bd{
            text-align: right;
        }
        .weui_uploader_files{
            display: inline-block !important;
        }
        .weui_uploader_input_wrp{
            float: right !important;
            display: inline-block !important;
        }
        p{
            text-align: left;
        }
    </style>
    <link rel="stylesheet" href="https://res.wx.qq.com/open/libs/weui/0.3.0/weui.css" />
<!-- 网站内容主体开始 -->
<div class="mission">
    <!-- 返回上一级 -->
    <div class="nav-left">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <a href="javascript:history.back();" class="return" id="back" title="上一页">
                    <i class="fa fa-angle-left"></i>
                </a>
                <div style="text-align: center;">修改密码</div>
            </div>
            <div class="weui-cell__ft">&nbsp;</div>
        </div>
    </div><!-- 返回上一级 -->
    <form action="{{ route('pwdStore') }}"  class="form-horizontal" role="form" id="form_submit" method="post" accept-charset="UTF-8" class="form-horizontal"  enctype="multipart/form-data" >
        @csrf
        <div class="weui-cells" style="padding-bottom: 5px;">
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__bd"><p>原密码</p></div>
                <div class="weui-cell__bd"><input class="weui-input" id="oldpwd" type="password" name="oldpwd"></div>
                <div class="weui-cell__ft"></div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__bd"><p>新密码</p></div>
                <div class="weui-cell__bd"><input class="weui-input" id="newcheckpwd" type="password" name="newcheckpwd"></div>
                <div class="weui-cell__ft"></div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__bd"><p>确认密码</p></div>
                <div class="weui-cell__bd"><input class="weui-input" id="checkpwd" type="password" name="checkpwd"></div>
                <div class="weui-cell__ft"></div>
            </div>
            <div class="user-exit" style="margin-bottom:80px">
                <input type="submit"  class="weui-btn weui-btn_warn" value="保存">
            </div>
        </div>
    </form>
</div>

@stop


@section('footerJs')
    <script>
        $('#form_submit').submit(function () {
            var oldpwd = $('#oldpwd').val();
            var newcheckpwd = $('#newcheckpwd').val();
            var checkpwd = $('#checkpwd').val();

            if(newcheckpwd != checkpwd){
                alert('两次密码不一致');
                $('#newcheckpwd').val('');
                $('#checkpwd').val('');
                return false;
            }

            if(oldpwd && newcheckpwd){
                var data = {
                    'oldpwd':oldpwd,
                    'newcheckpwd':newcheckpwd,
                    '_token':'{{ csrf_token() }}',
                };
                $.ajax({
                    url:"{{ route('pwdStore') }}",
                    data:data,
                    type:'POST',
                    cache:false,
                    dataType:'json',
                    success:function(data) {
                        if(data.status == 100){
                            $.toast(data.message);
                            setTimeout(function () {
                                window.location.href='{{ route('center') }}'
                            }, 2000);
                        }
                    },
                    error : function() {
                        console.log('errpr')
                    }
                });
            }else{
                alert('请完善资料后,再提交');
                return false;
            }
            return false;
        })
    </script>
@stop
