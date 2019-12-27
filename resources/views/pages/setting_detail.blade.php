@extends('layouts.app')
@section('title', '个人设置')

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
                <div style="text-align: center;">个人设置</div>
            </div>
            <div class="weui-cell__ft">&nbsp;</div>
        </div>
    </div><!-- 返回上一级 -->
    <form action="{{ route('centerStore') }}"  class="form-horizontal" role="form"  method="post" accept-charset="UTF-8" class="form-horizontal"  enctype="multipart/form-data" >
    @csrf
    <div class="user-panel-border">
        <div class="weui-panel__bd">
            <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                <div class="weui-media-box__hd">
                    <img class="weui-media-box__thumb img-circle" src="./images/user-p.jpg" alt="">
                    <input  type="file" accept="image/*" name="avatar"  onchange="handleFiles(this)" style="display:none">
                </div>
            </a>
        </div>
    </div>
    <div class="weui-cells" style="padding-bottom: 5px;">
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd"><p>账号名称</p></div>
            <div class="weui-cell__bd"><input class="weui-input" id="name" type="text" name="name" value="{{ Auth::user()->name }}" required="1" readonly></div>
            <div class="weui-cell__ft"></div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd"><p>账号ID</p></div>
            <div class="weui-cell__bd"><input class="weui-input" id="user_no" type="text" value="{{ Auth::user()->user_no }}" required="1" readonly></div>
            <div class="weui-cell__ft"></div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd"><p>会员等级</p></div>
            <div class="weui-cell__bd"><input class="weui-input" id="user_level" type="text" name="user_level" value="{{ Auth::user()->user_level }}" required="1"></div>
            <div class="weui-cell__ft"></div>
        </div>

        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd"><p>注册时间</p></div>
            <div class="weui-cell__bd"><input class="weui-input" id="created_at" type="text"  value="{{ date('Y-m-d',strtotime(Auth::user()->created_at) ) }}"  readonly></div>
            <div class="weui-cell__ft"></div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>身份证号</p></div>
            <div class="weui-cell__bd"><input class="weui-input" id="card_id" type="text" name="card_id" value="{{ Auth::user()->card_id }}" required="1"></div>
            <div class="weui-cell__ft"></div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>开户银行</p></div>
            <div class="weui-cell__bd"><input class="weui-input" id="bank_open" type="text" name="bank_open" value="{{ Auth::user()->bank_open }}" required="1"></div>
            <div class="weui-cell__ft"></div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>银行卡号</p></div>
            <div class="weui-cell__bd"><input class="weui-input" id="bank_no" type="text" name="bank_no" value="{{ Auth::user()->bank_no }}" required="1"></div>
            <div class="weui-cell__ft"></div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>开户地区</p></div>
            <div class="weui-cell__bd">
                <input class="weui-input" id="bank_addr" type="text" name="bank_addr" value="{{ Auth::user()->bank_addr }}" required="1">
            </div>
            <div class="weui-cell__ft"></div>
        </div>

        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>开户支行</p></div>
            <div class="weui-cell__bd"><input class="weui-input" id="bank_branch" type="text" name="bank_branch" value="{{ Auth::user()->bank_branch }}" required="1"></div>
            <div class="weui-cell__ft"></div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>QQ号码</p></div>
            <div class="weui-cell__bd"><input class="weui-input" id="qq" type="text" name="qq" value="{{ Auth::user()->qq }}" required="1"></div>
            <div class="weui-cell__ft"></div>
        </div>
{{--        <div class="weui-cell weui-cell_access" href="javascript:;">--}}
{{--            <div class="weui-cell__bd"><p>修改密码</p></div>--}}
{{--            <div class="weui-cell__bd"><input class="weui-input" id="password" type="password" name="password"></div>--}}
{{--            <div class="weui-cell__ft"></div>--}}
{{--        </div>--}}
        <div class="user-exit" style="margin-bottom:80px">
            <input type="submit"  class="weui-btn weui-btn_warn" value="保存">
        </div>

    </div>
    </form>
</div>

@stop


@section('footerJs')
    <script src="../js/city-picker.js"></script>
    <script>
        $("#bank_addr").cityPicker({
            title: "开户地区",
            onChange: function (picker, values, displayValues) {
                console.log(values, displayValues);
            }
        });
    </script>

@stop
