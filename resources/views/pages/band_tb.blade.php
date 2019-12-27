@extends('layouts.app')
@section('title', '绑定新账号')

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
    </style>
<!-- 网站内容主体开始 -->
<div class="mission">
    <!-- 返回上一级 -->
    <div class="nav-left">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <a href="javascript:history.back();" class="return" id="back" title="上一页">
                    <i class="fa fa-angle-left"></i>
                </a>
                <div style="text-align: center;">设置</div>
            </div>
            <div class="weui-cell__ft">&nbsp;</div>
        </div>
    </div><!-- 返回上一级 -->
    <form action="{{ route('bindStore') }}"  class="form-horizontal" role="form"  method="post" accept-charset="UTF-8" class="form-horizontal"  enctype="multipart/form-data" >
    @csrf
    <div class="weui-cells" style="padding-bottom: 5px;">
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd"><p>淘宝会员名</p></div>
            <div class="weui-cell__bd"><input class="weui-input" id="ali_name" type="text" name="ali_name"  required="1"></div>
        </div>

        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>淘宝账号等级</p></div>
            <div class="weui-cell__bd"><input class="weui-input" id="ali_level" type="text" name="ali_level" onchange="levelCliek(this)" required="1"></div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>性别</p></div>
            <div class="weui-cell__bd">
                <select  class="weui-input" id="sex" name="sex"  required="1">
                    @foreach(sex_type() as $k => $v)
                    <option value="{!! $k !!}">{!! $v !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="weui-cell__ft"></div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>收货人姓名</p></div>
            <div class="weui-cell__bd"><input class="weui-input" id="consignee" type="text" name="consignee"  required="1"></div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>收货人电话</p></div>
            <div class="weui-cell__bd"><input class="weui-input" id="phone" type="text" name="phone"  required="1"></div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>收货地址</p></div>
            <div class="weui-cell__bd"><input class="weui-input" id="bank_addr" type="text" name="bank_addr" required="1"></div>
            <div class="weui-cell__ft"></div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>街道地址</p></div>
            <div class="weui-cell__bd"><input class="weui-input" id="address" type="text" name="address"  required="1"></div>
        </div>
        <div class="weui-cells weui-cells_form">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <div class="weui-uploader">
                        <div class="weui-uploader__hd">
                            <p class="weui-uploader__title">淘宝等级截图上传</p>
                        </div>
                        <div class="weui-uploader__bd">
                            <label for="uploadImg"><div class="btn btn-default btn-dark">上传图片</div></label>
                            <img id="imgShow" src="@if(isset($data)) {!! env('APP_URL').$data->goods_img !!} @endif" alt="" style="max-width:150px;max-height: 150px ">
                            <input id="uploadImg" type="file" name="files" accept="image/*" style="display: none;" />
                            @if(isset($data))
                                <input type="hidden" name="refund_img" value="{!! $data->refund_img !!}">
                            @endif
{{--                            <input id="fileImage" class="fileImage" type="file"  name="level_img" accept="image/*" capture="camera" size="30" required="1">--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="weui-cells weui-cells_form">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <div class="weui-uploader">
                        <div class="weui-uploader__hd">
                            <p class="weui-uploader__title">支付宝实名认证上传</p>
                        </div>
                        <div class="weui-uploader__bd">
                            <input id="fileImage" class="fileImage" type="file"  name="ali_auth" accept="image/*" capture="camera" size="30" required="1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-exit" style="margin-bottom:80px">
            <input type="submit"  class="weui-btn weui-btn_warn" value="保存">
        </div>
    </div>
    </form>

    <script>
        function levelCliek(e) {
            if($(e).val() > 50){
                alert('等级输入错误')
                $(e).val('')
                return false
            }
        }
    </script>
</div>


@stop


@section('footerJs')

    <script src="../js/city-picker.js"></script>
    <script src="/js/upload.js"></script>
    <script>
        $("#bank_addr").cityPicker({
            title: "收货地址",
            onChange: function (picker, values, displayValues) {
                console.log(values, displayValues);
            }
        });
        uploadImg({
            maxNum: 680, //压缩后照片 最大宽度/高度
            rate: 0.8, //清晰度比率 0-1 越小照片大小越小但越不清晰 默认0.8
            callback: function (baseUrl) { // 回调函数返回压缩成功后的
                $("#imgShow").attr("src", baseUrl);
            }
        })
    </script>
@stop
