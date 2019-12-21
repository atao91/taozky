@extends('layouts.app')
@section('title', '账单列表')

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
            <div class="weui-form-preview">
                <div class="weui-form-preview__hd">
                    <label class="weui-form-preview__label">账单金额</label>
                    <em class="weui-form-preview__value">¥{!! $v->bill_price !!}</em>
                </div>
                <div class="weui-form-preview__bd">
                    <div class="weui-form-preview__item">
                        <label class="weui-form-preview__label">类型</label>
                        <span class="weui-form-preview__value">{!! bills_type()[$v->type] !!}</span>
                    </div>
                    <div class="weui-form-preview__item">
                        <label class="weui-form-preview__label">明细</label>
                        <span class="weui-form-preview__value">{!! $v->remark !!}</span>
                    </div>
                </div>
            </div>
        @endforeach
        <div  style="margin-bottom: 10%;clear: both;text-align: center">{{ $data->render() }}</div>  <!-- 只需要添加这一行 -->
    </div>
    <div class="clearfix"><!-- 清除浮动 --></div>
@stop
