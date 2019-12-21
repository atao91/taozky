@extends('layouts.app')
@section('title', '任务详情')

@section('content')
<!-- 网站内容主体开始 -->
<style>
    .weui-cell__bd{
        text-align: right;
    }
</style>
<div class="mission">
    <!-- 返回上一级 -->
    <div class="nav-left">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <a href="javascript:history.back();" class="return" id="back" title="上一页">
                    <i class="fa fa-angle-left"></i>
                </a>
            </div>
            <div class="weui-cell__ft">&nbsp;</div>
        </div>
    </div><!-- 返回上一级 -->
    <div class="weui-panel weui-panel_access">
        <div class="weui-panel__hd">任务详情</div>
        <div class="weui-panel__bd">
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>任务编号</p></div>
                <div class="weui-cell__bd weui-media-box__desc">{{ $data->work_no }}</div>
            </div>

            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>预计佣金</p></div>
                <div class="weui-cell__bd weui-media-box__desc">{{ $data->orders->reward_price }}</div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>商品入口</p></div>
                <div class="weui-cell__bd weui-media-box__desc">{{ order_in()[$data->orders->order_in] }}</div>
            </div>


            {{--            <div class="weui-cell weui-cell_access" href="javascript:;">--}}
{{--                <div class="weui-cell__hd weui-media-box__title"><p>内容</p></div>--}}
{{--                <div class="weui-cell__bd weui-media-box__desc">{{ $data->orders->actual_price }}</div>--}}
{{--            </div>--}}
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>排序方式</p></div>
                <div class="weui-cell__bd weui-media-box__desc">{{ sort_type()[$data->orders->sort_type] }}</div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>付款人数</p></div>
                <div class="weui-cell__bd weui-media-box__desc">{{ $data->orders->take_num }}</div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>页面显示价格</p></div>
                <div class="weui-cell__bd weui-media-box__desc"><i class="fa fa-rmb"></i> {{ $data->orders->actual_price }}</div>
            </div>
{{--            <div class="weui-cell weui-cell_access" href="javascript:;">--}}
{{--                <div class="weui-cell__hd weui-media-box__title"><p>规格</p></div>--}}
{{--                <div class="weui-cell__bd weui-media-box__desc"></div>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="user-exit" style="margin-bottom:80px">
        <input type="hidden" name="d"  class="d" value="{{ $data->id }}">
        <input type="hidden" name="token" class="token" value="{!! csrf_token() !!}">
        <input type="submit"  class="weui-btn weui-btn_warn" value="接单">
    </div>
</div>

@stop

@section('footerJs')
    <script>
        $('.weui-btn_warn').click(function () {
            var data = new Object();
            data._token =  $('.token').val();
            data.d      =  $('.d').val();
            $.post("{{ route('goods_store') }}", data,function(res){
                if(res.status){
                    $.toast(res.message,1000);
                    setInterval(function () {
                        window.location.href = "{!! route('work') !!}";
                    },1000);
                }else{
                    $.toast(res.message, "forbidden");
                }
            },'json');
        })
    </script>
@stop

