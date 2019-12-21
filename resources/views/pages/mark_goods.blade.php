@extends('layouts.app')
@section('title', '任务详情')

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
            </div>
            <div class="weui-cell__ft">&nbsp;</div>
        </div>
    </div><!-- 返回上一级 -->
    <div class="weui-panel weui-panel_access">
        <div class="weui-panel__hd">图文组合列表</div>
        <div class="weui-panel__bd">
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>任务编号</p></div>
                <div class="weui-cell__bd weui-media-box__desc"></div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>任务状态</p></div>
                <div class="weui-cell__bd weui-media-box__desc"></div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>接单淘宝nick</p></div>
                <div class="weui-cell__bd weui-media-box__desc"></div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>接单时间</p></div>
                <div class="weui-cell__bd weui-media-box__desc"></div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>赚佣金</p></div>
                <div class="weui-cell__bd weui-media-box__desc"></div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>商品入口</p></div>
                <div class="weui-cell__bd weui-media-box__desc"></div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>内容</p></div>
                <div class="weui-cell__bd weui-media-box__desc"></div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>排序方式</p></div>
                <div class="weui-cell__bd weui-media-box__desc"></div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>付款人数</p></div>
                <div class="weui-cell__bd weui-media-box__desc"></div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>页面显示价格</p></div>
                <div class="weui-cell__bd weui-media-box__desc"></div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>规格</p></div>
                <div class="weui-cell__bd weui-media-box__desc"></div>
            </div>
        </div>
    </div>

    <form action="{{ route('CheckGoods') }}"  class="form-horizontal" role="form"  method="post" accept-charset="UTF-8" class="form-horizontal"  enctype="multipart/form-data" >
    @csrf
    </form>
</div>

@stop

