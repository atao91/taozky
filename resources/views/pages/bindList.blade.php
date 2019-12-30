@extends('layouts.app')
@section('title', '绑定账号列表')

@section('content')
    <!-- 网站内容主体开始 -->
    <div class="mission">

        <!-- 返回上一级 -->
        <div class="nav-left">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <a href="javascript:history.back();" class="return" id="back" title="上一页">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <div style="text-align: center;">已绑定账户列表</div>
                </div>
                <div class="weui-cell__ft">&nbsp;</div>
            </div>
        </div><!-- 返回上一级 -->

        <!-- 我的订单 -->
        @foreach($data as $k => $v)
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="//cdn.tbzlc.com/binary/taobao.png" alt="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title"> {!! $v->ali_name  !!}</h4>
                        <p class="weui-media-box__desc"><img src="//cdn.tbzlc.com/binary//level/level_{!! $v->ali_level !!}.gif"></p>
                        @if($v->status == 1)
                            <p class="weui-media-box__desc">{!! $v->consignee !!} &nbsp;&nbsp; {!! $v->phone !!}</p>
                            <p class="weui-media-box__desc">{!! $v->sh_addr !!}{!! $v->address !!}</p>
                        @elseif($v->status == 2)
                            <p class="weui-media-box__desc">待审核</p>
                        @else
                            <p class="weui-media-box__desc"><span style="color: #2ea8e5;">审核不通过原因:{!! $v->app_remark !!}</span> </p>
                        @endif
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="clearfix"><!-- 清除浮动 --></div>

@stop
