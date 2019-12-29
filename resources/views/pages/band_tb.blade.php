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
                <div style="text-align: center;">设置</div>
            </div>
            <div class="weui-cell__ft">&nbsp;</div>
        </div>
    </div><!-- 返回上一级 -->
    <form  class="form-horizontal" role="form" id="form_submit" method="post" accept-charset="UTF-8" class="form-horizontal"  enctype="multipart/form-data" >
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
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>收货地址</p></div>
            <div class="weui-cell__bd"><input class="weui-input" id="sh_addr" type="text" name="sh_addr"  required="1"></div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>淘宝等级截图</p></div>
            <div class="weui-cell__bd weui-media-box__desc">
                <ul class="weui_uploader_files uploader_level_img" id="uploaderFiles ">
                    @if(isset($data) && $data->level_img)
                    <li class="weui_uploader_file" style="background-image:url({{ $data->level_img }})"></li>
                    @endif
                </ul>
                @if(empty($data->huab_auth))
                    <div class="weui_uploader_input_wrp">
                        <input class="weui_uploader_input level_img" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" >
                    </div>
                @endif
            </div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>实名认证截图</p></div>
            <div class="weui-cell__bd weui-media-box__desc">
                <ul class="weui_uploader_files uploader_ali_auth_img" id="uploaderFiles ">
                    @if(isset($data) && $data->ali_auth)
                        <li class="weui_uploader_file" style="background-image:url({{ $data->ali_auth }})"></li>
                    @endif
                </ul>
                @if(empty($data->ali_auth))
                <div class="weui_uploader_input_wrp">
                    <input class="weui_uploader_input ali_auth_img" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" >
                </div>
                @endif
            </div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>花呗截图</p></div>
            <div class="weui-cell__bd weui-media-box__desc">
                <ul class="weui_uploader_files uploader_huab_auth_img" id="uploaderFiles ">
                    @if(isset($data) && $data->huab_auth)
                        <li class="weui_uploader_file" style="background-image:url({{ $data->huab_auth }})"></li>
                    @endif
                </ul>
                @if(empty($data->huab_auth))
                    <div class="weui_uploader_input_wrp">
                        <input class="weui_uploader_input huab_auth_img" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" >
                    </div>
                @endif
            </div>
        </div>
        <div class="user-exit" style="margin-bottom:80px">
            @if(isset($data))
                <input type="hidden" name="level_img" class="id_level_img" id="id_level_img" value="{{ $data->level_img }}" required="1">
                <input type="hidden" name="ali_auth" class="id_ali_auth" id="id_ali_auth" value="{{ $data->ali_auth }}" required="1">
                <input type="hidden" name="huab_auth" class="id_huab_auth" id="id_huab_auth" value="{{ $data->huab_auth }}" required="1">
            @else
                <input type="hidden" name="level_img" class="val_level_img" id="val_level_img" value="" required="1">
                <input type="hidden" name="ali_auth" class="val_ali_auth" id="val_ali_auth" value="" required="1">
                <input type="hidden" name="huab_auth" class="val_huab_auth" id="val_huab_auth" value="" required="1">
            @endif
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
    <script src="../js/upload.js"></script>
    <script>
        $(function () {
            // 允许上传的图片类型
            allowTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
            // 1024KB，也就是 1MB
            maxSize = 1024 * 1024;
            // 图片最大宽度
            maxWidth = 600;
            // 最大上传图片数量
            maxCount = 1;
            $('.level_img').on('change', function (event) {
                var files = event.target.files;
                update_img(files,'uploader_level_img','val_level_img');
            });
            $('.ali_auth_img').on('change', function (event) {
                var files = event.target.files;
                update_img(files,'uploader_ali_auth_img','val_ali_auth');
            });
            $('.huab_auth_img').on('change', function (event) {
                var files = event.target.files;
                update_img(files,'uploader_huab_auth_img','val_huab_auth');
            });
        });
        function update_img(files,$obj,$val){
            // 如果没有选中文件，直接返回
            if (files.length === 0) {
                return;
            }
            for (var i = 0, len = files.length; i < len; i++) {
                var file = files[i];
                var reader = new FileReader();
                // 如果类型不在允许的类型范围内
                if (allowTypes.indexOf(file.type) === -1) {
                    $.toast('该类型不允许上传','errer');
                    continue;
                }
                if (file.size > maxSize) {
                    $.weui.alert({text: '图片太大，不允许上传'});
                    $.toast('图片太大，不允许上传','errer');
                    continue;
                }
                if ($('.'+$obj).length > maxCount) {
                    $.toast('最多只能上传' + maxCount + '张图片','errer');
                    return;
                }
                reader.onload = function (e) {
                    var img = new Image();
                    img.onload = function () {
                        // 不要超出最大宽度
                        var w = Math.min(maxWidth, img.width);
                        // 高度按比例计算
                        var h = img.height * (w / img.width);
                        var canvas = document.createElement('canvas');
                        var ctx = canvas.getContext('2d');
                        // 设置 canvas 的宽度和高度
                        canvas.width = w;
                        canvas.height = h;
                        ctx.drawImage(img, 0, 0, w, h);
                        var base64 = canvas.toDataURL('image/png');

                        // 插入到预览区
                        var $preview = $('<li class="weui_uploader_file weui_uploader_status" style="background-image:url(' + base64 + ')"><div class="weui_uploader_status_content">0%</div></li>');
                        $('.'+$obj).html($preview);
                        var num = $('.'+$obj).length;

                        // 然后假装在上传，可以post base64格式，也可以构造blob对象上传，也可以用微信JSSDK上传
                        var progress = 0;
                        function uploading() {
                            $preview.find('.weui_uploader_status_content').text(++progress + '%');
                            if (progress < 100) {
                                setTimeout(uploading, 30);
                            }
                            else {
                                // 如果是失败，塞一个失败图标
                                //$preview.find('.weui_uploader_status_content').html('<i class="weui_icon_warn"></i>');
                                $preview.removeClass('weui_uploader_status').find('.weui_uploader_status_content').remove();
                            }
                        }
                        setTimeout(uploading, 30);
                    };
                    img.src = e.target.result;
                    $("."+$val).val(img.src)

                };
                reader.readAsDataURL(file);
            }
        }
        $('#form_submit').submit(function () {
            var ali_name = $('#ali_name').val();
            var ali_level = $('#ali_level').val();
            var sex = $('#sex').val();
            var consignee = $('#consignee').val();
            var phone = $('#phone').val();
            var bank_addr = $('#bank_addr').val();
            var address = $('#address').val();
            var sh_addr = $('#sh_addr').val();

            var id_level_img    = $('#id_level_img').val();
            var id_ali_auth     = $('#id_ali_auth').val();
            var id_huab_auth    = $('#id_huab_auth').val();
            var val_level_img   = $('#val_level_img').val();
            var val_ali_auth    = $('#val_ali_auth').val();
            var val_huab_auth   = $('#val_huab_auth').val();

            var level_img   = val_level_img?val_level_img:id_level_img;
            var ali_auth    = val_ali_auth?val_ali_auth:id_ali_auth;
            var huab_auth   = val_huab_auth?val_huab_auth:id_huab_auth;



            if(ali_name && ali_level && sex && consignee && phone && bank_addr && address && sh_addr && level_img && ali_auth && huab_auth){
                var data = {
                    'ali_name':ali_name,
                    'ali_level':ali_level,
                    'sex':sex,
                    'consignee':consignee,
                    'phone':phone,
                    'bank_addr':bank_addr,
                    'address':address,
                    'sh_addr':sh_addr,
                    'level_img':level_img,
                    'ali_auth':ali_auth,
                    'huab_auth':huab_auth,
                    '_token':'{{ csrf_token() }}',
                };

                $.ajax({
                    url:"{{ route('bindStore') }}",
                    data:data,
                    type:'POST',
                    cache:false,
                    dataType:'json',
                    success:function(data) {
                        if(data.status == 100){
                            $.toast(data.message);
                            setTimeout(function () {
                                window.location.href='{{ route('center') }}'
                            }, 2000);
                        }
                    },
                    error : function() {
                        console.log('errpr')
                    }
                });
            }else{
                alert('请完善资料后,再提交');
                return false;
            }
            return false;
        })
    </script>
    <script>
        $("#bank_addr").cityPicker({
            title: "收货地址",
            onChange: function (picker, values, displayValues) {
                console.log(values, displayValues);
            }
        });
    </script>
@stop
