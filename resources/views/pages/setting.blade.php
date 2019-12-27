@extends('layouts.app')
@section('title', '个人设置')

@section('content')
    <style>
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
    <form action="{{ route('centerStore') }}"  class="form-horizontal" role="form" id="form_submit" method="post" accept-charset="UTF-8" class="form-horizontal"  enctype="multipart/form-data" >
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
            <div class="weui-cell__bd"><p>手机号码</p></div>
            <div class="weui-cell__bd"><input class="weui-input" id="phone" type="text" name="phone" value="{{ Auth::user()->phone }}" required="1"></div>
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
            <div class="weui-cell__hd weui-media-box__title"><p>身份证正面</p></div>
            <div class="weui-cell__bd weui-media-box__desc">
                @if(Auth::user()->id_card_z)
                <ul class="weui_uploader_files uploader_id_card_z" id="uploaderFiles ">
                    <li class="id_card_z weui_uploader_file" style="background-image:url('{!! env('APP_URL').Auth::user()->id_card_z !!}')"></li>
                    <input type="hidden" name="id_card_z_img" id="id_card_z_img" value="{!! Auth::user()->id_card_z !!}">
                </ul>
                @else
                <div class="weui_uploader_input_wrp">
                    <input class="weui_uploader_input id_card_z" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" >
                </div>
                @endif
            </div>
        </div>

        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>身份证反面</p></div>
            <div class="weui-cell__bd weui-media-box__desc">
                @if(Auth::user()->id_card_z)
                    <ul class="weui_uploader_files uploader_id_card_f" id="uploaderFiles ">
                        <li class="id_card_f weui_uploader_file" style="background-image:url('{!! env('APP_URL').Auth::user()->id_card_f !!}')"></li>
                        <input type="hidden" name="id_card_f_img" id="id_card_f_img" value="{!! Auth::user()->id_card_f !!}">
                    </ul>
                @else
                    <div class="weui_uploader_input_wrp">
                    <input class="weui_uploader_input id_card_f" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" >
                </div>
                @endif
            </div>
        </div>
        {{--        <div class="weui-cell weui-cell_access" href="javascript:;">--}}
{{--            <div class="weui-cell__bd"><p>修改密码</p></div>--}}
{{--            <div class="weui-cell__bd"><input class="weui-input" id="password" type="password" name="password"></div>--}}
{{--            <div class="weui-cell__ft"></div>--}}
{{--        </div>--}}
        <div class="user-exit" style="margin-bottom:80px">
            <input type="hidden" name="id_card_z" class="val_id_card_z" id="val_id_card_z" value="" required="1">
            <input type="hidden" name="id_card_f" class="val_id_card_f" id="val_id_card_f" value="" required="1">

            <input type="submit"  class="weui-btn weui-btn_warn" value="保存">
        </div>

    </div>
    </form>
</div>

@stop


@section('footerJs')
    <script src="../js/city-picker.js"></script>
    <script src="../js/upload.js"></script>
    <script>
        $("#bank_addr").cityPicker({
            title: "开户地区",
            onChange: function (picker, values, displayValues) {
                console.log(values, displayValues);
            }
        });

        $("#bank_addr").cityPicker({
            title: "收货地址",
            onChange: function (picker, values, displayValues) {
                console.log(values, displayValues);
            }
        });
        $(function () {
            // 允许上传的图片类型
            allowTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
            // 1024KB，也就是 1MB
            maxSize = 1024 * 1024;
            // 图片最大宽度
            maxWidth = 300;
            // 最大上传图片数量
            maxCount = 1;
            $('.id_card_z').on('change', function (event) {
                var files = event.target.files;
                update_img(files,'uploader_id_card_z','val_id_card_z');
            });

            $('.id_card_f').on('change', function (event) {
                var files = event.target.files;
                update_img(files,'uploader_id_card_f','val_id_card_f');
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
            var user_level = $('#user_level').val();
            var card_id = $('#card_id').val();
            var bank_open = $('#bank_open').val();
            var phone = $('#phone').val();
            var bank_no = $('#bank_no').val();
            var bank_addr = $('#bank_addr').val();
            var bank_branch = $('#bank_branch').val();
            var id_card_z = $('#val_id_card_z').val();
            var id_card_f = $('#val_id_card_f').val();
            var id_card_z_img = $('#id_card_z_img').val();
            var id_card_f_img = $('#id_card_f_img').val();
            var id_card_img_zm = id_card_z?id_card_z:id_card_z_img;
            var id_card_img_fm = id_card_f?id_card_f:id_card_f_img;


            if(user_level && card_id && bank_open && phone && bank_no && bank_addr && bank_branch && id_card_img_zm && id_card_img_fm){
                var data = {
                    'user_level':user_level,
                    'card_id':card_id,
                    'bank_open':bank_open,
                    'phone':phone,
                    'bank_no':bank_no,
                    'bank_addr':bank_addr,
                    'bank_branch':bank_branch,
                    'id_card_z':id_card_img_zm,
                    'id_card_f':id_card_img_fm,
                    '_token':'{{ csrf_token() }}',
                };
                $.ajax({
                    url:"{{ route('centerStore') }}",
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
@stop
