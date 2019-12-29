@extends('layouts.app')
@section('title', '联系客服')
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
                    <div style="text-align: center;">联系客服</div>
                </div>
                <div class="weui-cell__ft">&nbsp;</div>
            </div>
        </div><!-- 返回上一级 -->
        <div class="weui-msg">
            <div class="weui-msg__text-area">
                <p>
                    <img src="../images/kfwx.png" alt="">
                </p>
                <p>联系电话:<a href="tel:18750509155">18750509155</a></p>
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
