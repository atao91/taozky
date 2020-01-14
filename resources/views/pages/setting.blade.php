@extends('layouts.app')
@section('title', '个人设置')
@section('content')
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
                <div style="text-align: center;">个人设置</div>
            </div>
            <div class="weui-cell__ft">&nbsp;</div>
        </div>
    </div><!-- 返回上一级 -->

    <div class="personal f15" >
{{--        <div class="weui-cells m0">--}}
{{--            <div class="weui-cell">--}}
{{--                <div class="weui-cell__bd">--}}
{{--                    头像--}}
{{--                </div>--}}
{{--                <div class=""><img class="tx" src="images/temp/3.jpg" alt=""></div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="weui-cells mt5">
            <div class="weui-cell">
                <div class="weui-cell__bd"> 用户名 </div>
                <div class="weui-cell__price">{!! $data->username !!}</div>
            </div>
            <div class="weui-cell ">
                <div class="weui-cell__bd"> 真实姓名 </div>
                <div class="weui-cell__price">{!! $data->name !!}</div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd"> 身份证号 </div>
                <div class="weui-cell__price">{!! $data->card_id !!}</div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd"> 开户银行 </div>
                <div class="weui-cell__price">{!! $data->bank_branch !!}</div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd"> 银行卡号 </div>
                <div class="weui-cell__price">{!! $data->bank_no !!}</div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd"> 开户支行 </div>
                <div class="weui-cell__price">{!! $data->bank_branch !!}</div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd"> 微信号 </div>
                <div class="weui-cell__price">{!! $data->wechats !!}</div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd"> qq </div>
                <div class="weui-cell__price">{!! $data->qq !!}</div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd"> 推荐人 </div>
                <div class="weui-cell__price">{!! $data->referrer !!}</div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd"> 身份证照片 </div>
                <div class="weui-cell__price">{!! isset( $data->id_card_img)?'已上传':'' !!}</div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd"> 银行卡照片 </div>
                <div class="weui-cell__price">{!! isset( $data->bank_img)?'已上传':'' !!}</div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd"> 当前状态 </div>
                <div class="weui-cell__price">{!! check_status()[$data->status] !!}</div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-weui.min.js"></script>
</div>

@stop
