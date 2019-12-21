<!-- tabbar -->
<div style="margin-bottom: 65px;"></div>
<div class="weui-tabbar" style="position: fixed;z-index: 999;">
    <a href="{{ route('root') }}" class="weui-tabbar__item  @if(in_array(request()->path(),['/','root','goods']) ) on @endif">
        <div class="weui-tabbar__icon">
            <i class="fa fa-home"></i>
        </div>
        <p class="weui-tabbar__label">首页</p>
    </a>
    <a href="{!! route('work') !!}" class="weui-tabbar__item @if(in_array(request()->path(),['work','goods_detail']) ) on @endif ">
        <div class="weui-tabbar__icon">
            <i class="fa fa-pencil-square-o"></i>
        </div>
        <p class="weui-tabbar__label">订单</p>
    </a>
{{--    <a href="#tab3" class="weui-tabbar__item">--}}
{{--        <span class="weui-badge" style="position: absolute;top: -.4em;right: 1em;">8</span>--}}
{{--        <div class="weui-tabbar__icon">--}}
{{--            <i class="fa fa-comment-o"></i>--}}
{{--        </div>--}}
{{--        <p class="weui-tabbar__label">消息</p>--}}
{{--    </a>--}}
    <a href="{{ route('center') }}" class="weui-tabbar__item @if(in_array(request()->path(),['index','setting','refund','refund_list','bill','bindTb','bindList','share']) ) on @endif ">
        <div class="weui-tabbar__icon">
            <i class="fa fa-user-circle-o"></i>
        </div>
        <p class="weui-tabbar__label">个人中心</p>
    </a>
</div><!-- tabbar -->



