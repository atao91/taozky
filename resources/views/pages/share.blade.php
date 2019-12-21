@extends('layouts.app')
@section('title', '推广赚钱')

@section('content')
    <!-- 网站内容主体开始 -->
    <div class="mission" onLoad="init()">
        <!-- 返回上一级 -->
        <div class="nav-left">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <a href="javascript:history.back();" class="return" id="back" title="上一页">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <div style="text-align: center;">推广赚钱</div>
                </div>
                <div class="weui-cell__ft">&nbsp;</div>
            </div>
        </div><!-- 返回上一级 -->
        <div class="weui-msg">
            <div class="weui-msg__text-area">
                <p class="weui-msg__desc" style="text-align: left">
                    介绍并邀请你的小伙伴来平台注册赚钱，只要你的小伙伴成功完成垫付单，你就可以享受小伙伴做单佣金成功奖励1元，动动小手，生活费就有。
                    推广有效期为一年，超过时间后无分成。
                </p>
                <p>
                    目前您已经推广了<span style="color: red">{{ Auth::user()->people_num }}</span>位有效会员
                </p>
            </div>
            <div class="weui-msg__opr-area">
                <span id="target">{{ env('APP_URL').'/register?t='.Auth::user()->user_no }}</span>
                <p class="weui-btn-area">
                    <button href="javascript:;" class="weui-btn weui-btn_primary btn" data-clipboard-action="copy" data-clipboard-target="#target" id="copy_btn" >复制链接</button>
                </p>

            </div>
        </div>
    </div>
@stop
@section('footerJs')
<script src="../js/ZeroClipboard.js"></script>
<script >
    $(document).ready(function(){
        var clipboard = new Clipboard('#copy_btn');
        clipboard.on('success', function(e) {

            console.log(e)

            alert("复制成功",1500);
            e.clearSelection();
            console.log(e.clearSelection);
        });
    });
</script>
@stop
