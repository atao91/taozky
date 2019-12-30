@extends('layouts.app')
@section('title', '个人中心')

@section('content')
    <!-- 网站内容主体开始 -->
    <div class="mission">
        <div class="myhearder">
            <!-- 设置 -->
            <div class="user-install">
                <a href="{{ route('setting') }}">
                    <i class="fa fa-cog"></i>
                </a>
            </div>
            <!-- 信息 -->
            <div class="person">
                <div class="weui-panel__bd">
                    <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb img-circle" src="./images/user-p.jpg" alt="头像">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">{{ Auth::user()->name }}</h4>
                            <p class="weui-media-box__desc"></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- 我的订单 -->
{{--        <div class="weui-cells">--}}
{{--            <a class="weui-cell weui-cell_access"  href="./user-order.html">--}}
{{--                <div class="weui-cell__bd">--}}
{{--                    <i class="fa fa-pencil-square-o"></i>我的订单--}}
{{--                </div>--}}
{{--                <div class="weui-cell__ft">--}}
{{--                    全部订单--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}

{{--        <div class="weui-flex">--}}
{{--            <div class="weui-flex__item">--}}
{{--                <div class="placeholder">--}}
{{--                    <a href="javascript:;" class="user-lists">--}}
{{--                        <div class="ol">--}}
{{--                            <i class="fa fa-credit-card"></i>--}}
{{--                        </div>--}}
{{--                        <p>待付款</p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="weui-flex__item">--}}
{{--                <div class="placeholder">--}}
{{--                    <a href="javascript:;" class="user-lists">--}}
{{--                        <div class="ol">--}}
{{--                            <i class="fa fa-credit-card"></i>--}}
{{--                        </div>--}}
{{--                        <p>待付款</p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="weui-flex__item">--}}
{{--                <div class="placeholder">--}}
{{--                    <a href="javascript:;" class="user-lists">--}}
{{--                        <div class="ol">--}}
{{--                            <i class="fa fa-credit-card"></i>--}}
{{--                        </div>--}}
{{--                        <p>待付款</p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="weui-flex__item">--}}
{{--                <div class="placeholder">--}}
{{--                    <a href="javascript:;" class="user-lists">--}}
{{--                        <div class="ol">--}}
{{--                            <i class="fa fa-credit-card"></i>--}}
{{--                        </div>--}}
{{--                        <p>待付款</p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="weui-flex__item">--}}
{{--                <div class="placeholder">--}}
{{--                    <a href="javascript:;" class="user-lists">--}}
{{--                        <div class="ol">--}}
{{--                            <i class="fa fa-credit-card"></i>--}}
{{--                        </div>--}}
{{--                        <p>待付款</p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- 我的订单 -->
        <!-- 列表 -->
        <div class="user-list-sm">
            <div class="weui-cells">
                <a class="weui-cell weui-cell_access" href="{{ route('refund') }}">
                    <div class="weui-cell__bd">
                        <i class="fa fa-money"></i>我的钱包
                    </div>
                    <div class="weui-cell__ft">
                    </div>
                </a>
                <a class="weui-cell weui-cell_access" href="{{ route('refund_list') }}">
                    <div class="weui-cell__bd">
                        <i class="fa fa-money"></i>提现列表
                    </div>
                    <div class="weui-cell__ft">
                    </div>
                </a>
                <a class="weui-cell weui-cell_access"  href="{{ route('bill') }}">
                    <div class="weui-cell__hd">
                        <i class="fa fa-rmb"></i>
                    </div>
                    <div class="weui-cell__bd">
                        <p>账单</p>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                @if(!isset($userali))
                <a class="weui-cell weui-cell_access"  href="{{ route('bind') }}">
                    <div class="weui-cell__hd">
                        <i class="fa fa-shopping-bag"></i>
                    </div>
                    <div class="weui-cell__bd">
                        <p>绑定新账号</p>
                    </div>
                </a>
                @endif
                <a class="weui-cell weui-cell_access"  href="{{ route('bindList') }}">
                    <div class="weui-cell__hd">
                        <i class="fa fa-laptop"></i>
                    </div>
                    <div class="weui-cell__bd">
                        <p>已绑定账号</p>
                    </div>
                </a>
                <a class="weui-cell weui-cell_access" href="{{ route('share') }}">
                    <div class="weui-cell__hd">
                        <i class="fa fa-share"></i>
                    </div>
                    <div class="weui-cell__bd">
                        <p>推广赚钱</p>
                    </div>
                </a>
                <a class="weui-cell weui-cell_access" href="{{ route('contacts') }}">
                    <div class="weui-cell__hd">
                        <i class="fa fa-share"></i>
                    </div>
                    <div class="weui-cell__bd">
                        <p>联系客服</p>
                    </div>
                </a>
{{--                <a class="weui-cell weui-cell_access" href="{{ route('changePwd') }}">--}}
{{--                    <div class="weui-cell__hd">--}}
{{--                        <i class="fa fa-share"></i>--}}
{{--                    </div>--}}
{{--                    <div class="weui-cell__bd">--}}
{{--                        <p>修改密码</p>--}}
{{--                    </div>--}}
{{--                </a>--}}
            </div>
            <!-- 安全退出 -->
            <div class="user-exit" style="margin-bottom: 80px">
                <a href="javascript:;" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="weui-btn weui-btn_warn">安全退出</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        <!-- 列表 -->
    </div>

@stop
