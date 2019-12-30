@extends('layouts.app')
@section('title', '个人设置')
@section('content')
    <style>
        #choose{display: none;}
        #upload{display: block;margin: 10px;height: 60px;text-align: center;line-height: 60px;border: 1px solid;border-radius: 5px;cursor: pointer;}
        .touch{background-color: #ddd;}
        .img-list{margin: 10px 5px;}
        .img-list li{position: relative;display: inline-block;width: 100px;height: 100px;margin: 5px 5px 20px 5px;border: 1px solid rgb(100,149,198);background: #fff no-repeat center;background-size: cover;}
        .progress{position: absolute;width: 100%;height: 20px;line-height: 20px;bottom: 0;left: 0;background-color:rgba(100,149,198,.5);}
        .progress span{display: block;width: 0;height: 100%;background-color:rgb(100,149,198);text-align: center;color: #FFF;font-size: 13px;}
        .size{position: absolute;width: 100%;height: 15px;line-height: 15px;bottom: -18px;text-align: center;font-size: 13px;color: #666;}
        .tips{display: block;text-align:center;font-size: 13px;margin: 10px;color: #999;}
        .pic-list{margin: 10px;line-height: 18px;font-size: 13px;}
        .pic-list a{display: block;margin: 10px 0;}
        .pic-list a img{vertical-align: middle;max-width: 30px;max-height: 30px;margin: -4px 0 0 10px;}

        .weui-cell__bd{
            text-align: right;
        }
        .weui_uploader_files{
            display: inline-block !important;
        }
        .weui_uploader_input_wrp{
            float: right !important;
            display: inline-block !important;
        }
        p{
            text-align: left;
        }
    </style>
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
        <form class="form-horizontal" role="form" id="form_submit" method="post" accept-charset="UTF-8" class="form-horizontal"  enctype="multipart/form-data" >
            @csrf
            <div class="user-panel-border">
                <div class="weui-panel__bd">
                    <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb img-circle" src="./images/user-p.jpg" alt="">
                        </div>
                    </a>
                </div>
            </div>
            <div class="weui-cells" style="padding-bottom: 5px;">
                <div class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__hd"><p>账号名称</p></div>
                    <div class="weui-cell__bd">{{ Auth::user()->name }}</div>
                    <div class="weui-cell__ft"></div>
                </div>
                <div class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__hd"><p>账号ID</p></div>
                    <div class="weui-cell__bd">{{ Auth::user()->user_no }}</div>
                    <div class="weui-cell__ft"></div>
                </div>
                <div class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__hd"><p>会员等级</p></div>
                    <div class="weui-cell__bd">{{ Auth::user()->user_level }}</div>
                    <div class="weui-cell__ft"></div>
                </div>

                <div class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__hd"><p>注册时间</p></div>
                    <div class="weui-cell__bd">{{ date('Y-m-d',strtotime(Auth::user()->created_at) ) }}</div>
                    <div class="weui-cell__ft"></div>
                </div>
                <div class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__bd"><p>手机号码</p></div>
                    <div class="weui-cell__bd">{{ Auth::user()->phone }}</div>
                    <div class="weui-cell__ft"></div>
                </div>
                <div class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__bd"><p>身份证号</p></div>
                    <div class="weui-cell__bd">{{ Auth::user()->card_id }}</div>
                    <div class="weui-cell__ft"></div>
                </div>
                <div class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__hd"><p>真实姓名</p></div>
                    <div class="weui-cell__bd">{{ Auth::user()->username }}</div>
                    <div class="weui-cell__ft"></div>
                </div>
                <div class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__bd"><p>开户银行</p></div>
                    <div class="weui-cell__bd">{{ Auth::user()->bank_open }}</div>
                    <div class="weui-cell__ft"></div>
                </div>
                <div class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__bd"><p>银行卡号</p></div>
                    <div class="weui-cell__bd">{{ Auth::user()->bank_no }}</div>
                    <div class="weui-cell__ft"></div>
                </div>
                <div class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__bd"><p>开户地区</p></div>
                    <div class="weui-cell__bd">
                        {{ Auth::user()->bank_addr }}
                    </div>
                    <div class="weui-cell__ft"></div>
                </div>

                <div class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__bd"><p>开户支行</p></div>
                    <div class="weui-cell__bd">{{ Auth::user()->bank_branch }}</div>
                    <div class="weui-cell__ft"></div>
                </div>
                <div class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__hd weui-media-box__title"><p>身份证正面</p></div>
                    <div class="weui-cell__bd weui-media-box__desc">
                        <ul class="weui_uploader_files uploader_idcard_img_z" id="uploaderFiles ">
                            <li class="weui_uploader_file" style="background-image:url({{ Auth::user()->id_card_z }})"></li>
                        </ul>
                    </div>
                </div>
                <div class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__hd weui-media-box__title"><p>身份证反面</p></div>
                    <div class="weui-cell__bd weui-media-box__desc">
                        <ul class="weui_uploader_files uploader_idcard_img_f" id="uploaderFiles ">
                            <li class="weui_uploader_file" style="background-image:url({{ Auth::user()->id_card_f }})"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

