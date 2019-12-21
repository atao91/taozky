@extends('layouts.app')
@section('title', '做单列表')

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
                    <div style="text-align: center;">我的订单</div>
                </div>
                <div class="weui-cell__ft">&nbsp;</div>
            </div>
        </div><!-- 返回上一级 -->

        <!-- 我的订单 -->
        <div class="user-order">
            <div class="weui-flex">
                <div class="weui-flex__item">
                    <div class="placeholder">
                        <a href="{!! route('work') !!}" class="user-lists @if(empty(request()->status) && !isset(request()->status)) on @endif"  >
                            <p>全部订单</p>
                        </a>
                    </div>
                </div>
                <div class="weui-flex__item">
                    <div class="placeholder">
                        <a href="{!! route('work') !!}?status=1,2" class="user-lists @if(request()->status == 1) on @endif">
                            <p>待完成</p>
                        </a>
                    </div>
                </div>
                <div class="weui-flex__item">
                    <div class="placeholder">
                        <a href="{!! route('work') !!}?status=0" class="user-lists @if(isset(request()->status) &&  request()->status == '0') on @endif">
                            <p>已完成</p>
                        </a>
                    </div>
                </div>
                <div class="weui-flex__item">
                    <div class="placeholder">
                        <a href="{!! route('work') !!}?status=4" class="user-lists @if(request()->status == 4) on @endif">
                            <p>已撤销</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- 我的订单 -->
        @if($data)
            @foreach($data as $k => $v)
            <div class="weui-panel weui-panel_access">
                <div class="weui-panel__bd">
                    <a href="{{ route('detail').'?d='.$v->id }}" class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb" src="{!! env('APP_URL_SH').$v->works->orders->templates->goods_img !!}" alt="">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">任务编号:{!! $v->works->work_no !!}</h4>
                            <p class="weui-media-box__desc">接单账号:{!! $v->ali->ali_name !!}</p>
                            <p class="weui-media-box__desc">任务佣金:{!! $v->works->orders->reward_price !!}</p>
                        </div>
                        <div class="weui-media-box__info">{!! liuc_status()[$v->status] !!}</div>
                    </a>
                </div>
            </div>
            @endforeach
        @endif
    </div>
    <div class="clearfix"><!-- 清除浮动 --></div>
@stop
