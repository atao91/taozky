@extends('layouts.app')
@section('title', '任务做单详情')

@section('content')
<!-- 网站内容主体开始 -->
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
</style>
<link rel="stylesheet" href="https://res.wx.qq.com/open/libs/weui/0.3.0/weui.css" />
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
                <div class="weui-cell__bd weui-media-box__desc">{{ $data->works->work_no }}</div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>任务状态</p></div>
                <div class="weui-cell__bd weui-media-box__desc">{{ work_status()[$data->works->status] }}</div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>接单淘宝</p></div>
                <div class="weui-cell__bd weui-media-box__desc">{{ $data->ali->ali_name }}</div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>接单时间</p></div>
                <div class="weui-cell__bd weui-media-box__desc">{{ $data->created_at }}</div>
            </div>
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>赚佣金</p></div>
                <div class="weui-cell__bd weui-media-box__desc">{{ $data->works->orders->reward_price }}</div>
            </div>
        </div>
    </div>
    <div class="weui-panel weui-panel_access">
        <div class="weui-panel__hd">请按照以下要求找到商品</div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>商品入口</p></div>
            <div class="weui-cell__bd weui-media-box__desc">{{ order_in()[$data->works->orders->order_in] }}</div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>内容</p></div>
            <div class="weui-cell__bd weui-media-box__desc">{{ $data->works->orders->in_key }}</div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>排序方式</p></div>
            <div class="weui-cell__bd weui-media-box__desc">{{ sort_type()[$data->works->orders->sort_type] }}</div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>付款人数</p></div>
            <div class="weui-cell__bd weui-media-box__desc">{{ $data->works->orders->take_num }}</div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>页面显示价格</p></div>
            <div class="weui-cell__bd weui-media-box__desc"><i class="fa fa-rmb"></i> {{ $data->works->orders->actual_price }}</div>
        </div>
    </div>
    <div class="weui-panel weui-panel_access">
        <div class="weui-panel__hd">任务要求(必须严格按照要求操作)</div>
        @if($data->works->orders->goods_sku)
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>尺码规格</p></div>
            <div class="weui-cell__bd weui-media-box__desc">{{ $data->works->orders->goods_sku }}</div>
        </div>
        @endif
        @if($data->works->orders->is_coupon)
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>是否使用优惠券</p></div>
                <div class="weui-cell__bd weui-media-box__desc">{{ is_coupon()[$data->works->orders->is_coupon] }}</div>
            </div>
        @endif
        @if($data->works->orders->is_coupon)
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>是否需要假聊</p></div>
                <div class="weui-cell__bd weui-media-box__desc">{{ is_chat()[$data->works->orders->is_chat] }}</div>
            </div>
        @endif
    </div>

    <div class="weui-panel weui-panel_access">
        <div class="weui-panel__hd">操作任务</div>
        {{--    核对商品    --}}
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd"><p>商品核对</p></div>
            <div class="weui-cell__bd"> <input class="weui-input" id="check_url" type="text" name="check_url" value="{!! $data->check_url !!}" required="1"></div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd"></div>
            <div class="weui-cell__bd"> <input type="submit" class="weui-btn  check_goods" value="核对商品"></div>
        </div>

        {{--    货比三家1    --}}
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>货比三家1</p></div>
            <div class="weui-cell__bd weui-media-box__desc">
                <ul class="weui_uploader_files uploader_pv_img_one" id="uploaderFiles ">
                    @if($data->pv_img_one)
                        <li class="weui_uploader_file" style="background-image:url('{!! $data->pv_img_one !!}')"></li>
                    @endif
                </ul>
                <div class="weui_uploader_input_wrp">
                    <input class="weui_uploader_input pv_img_one" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" >
                </div>
            </div>
        </div>
{{--        货比三家2--}}
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>货比三家2</p></div>
            <div class="weui-cell__bd weui-media-box__desc">
                <ul class="weui_uploader_files uploader_pv_img_two" id="uploaderFiles ">
                    @if($data->pv_img_two)
                        <li class="weui_uploader_file" style="background-image:url('{!! $data->pv_img_two !!}')"></li>
                    @endif
                </ul>
                <div class="weui_uploader_input_wrp">
                    <input class="weui_uploader_input pv_img_two" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" >
                </div>
            </div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>货比三家3</p></div>
            <div class="weui-cell__bd weui-media-box__desc">
                <ul class="weui_uploader_files uploader_pv_img_three" id="uploaderFiles ">
                    @if($data->pv_img_three)
                        <li class="weui_uploader_file" style="background-image:url('{!! $data->pv_img_three !!}')"></li>
                    @endif
                </ul>
                <div class="weui_uploader_input_wrp">
                    <input class="weui_uploader_input pv_img_three" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" >
                </div>
            </div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>副宝贝详情</p></div>
            <div class="weui-cell__bd weui-media-box__desc">
                <ul class="weui_uploader_files uploader_goods_img" id="uploaderFiles ">
                    @if($data->goods_img)
                        <li class="weui_uploader_file" style="background-image:url('{!! $data->goods_img !!}')"></li>
                    @endif
                </ul>
                <div class="weui_uploader_input_wrp">
                    <input class="weui_uploader_input goods_img" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" >
                </div>
            </div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>购物车截图</p></div>
            <div class="weui-cell__bd weui-media-box__desc">
                <ul class="weui_uploader_files uploader_shop_img" id="uploaderFiles ">
                    @if($data->shop_img)
                        <li class="weui_uploader_file" style="background-image:url('{!! $data->shop_img !!}')"></li>
                    @endif
                </ul>
                <div class="weui_uploader_input_wrp">
                    <input class="weui_uploader_input shop_img" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" >
                </div>
            </div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>付款截图</p></div>
            <div class="weui-cell__bd weui-media-box__desc">
                <ul class="weui_uploader_files uploader_pay_img" id="uploaderFiles ">
                    @if($data->pay_img)
                        <li class="weui_uploader_file" style="background-image:url('{!! $data->pay_img !!}')"></li>
                    @endif
                </ul>
                <div class="weui_uploader_input_wrp">
                    <input class="weui_uploader_input pay_img" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" >
                </div>
            </div>
        </div>

        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd"><p>实付金额</p></div>
            <div class="weui-cell__bd"> <input class="weui-input" id="pay_price" onchange="pay_price(this)" type="text" name="pay_price" value="{!! $data->pay_price !!}" required="1"></div>
        </div>
         <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>好评截图</p></div>
            <div class="weui-cell__bd weui-media-box__desc">
                <ul class="weui_uploader_files uploader_talk_img" id="uploaderFiles ">
                    @if($data->talk_img)
                        <li class="weui_uploader_file" style="background-image:url('{!! $data->talk_img !!}')"></li>
                    @endif
                </ul>
                <div class="weui_uploader_input_wrp">
                    <input class="weui_uploader_input talk_img" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" >
                </div>
            </div>
        </div>
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__hd weui-media-box__title"><p>快递签收截图</p></div>
            <div class="weui-cell__bd weui-media-box__desc">
                <ul class="weui_uploader_files uploader_carriage_img" id="uploaderFiles ">
                    @if($data->carriage_img)
                        <li class="weui_uploader_file" style="background-image:url('{!! $data->carriage_img !!}')"></li>
                    @endif
                </ul>
                <div class="weui_uploader_input_wrp">
                    <input class="weui_uploader_input carriage_img" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" >
                </div>
            </div>
        </div>

        @if($data->refund_img)
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd weui-media-box__title"><p>返款截图</p></div>
                <div class="weui-cell__bd weui-media-box__desc">
                    <ul class="weui_uploader_files uploader_carriage_img" >
                        @if($data->carriage_img)
                            <li class="weui_uploader_file" style="background-image:url('{!! env('APP_URL_SH').$data->refund_img !!}')"></li>
                        @endif
                    </ul>

                </div>
            </div>

        @endif
    </div>

    @if($data->status == 2)
    <div class="user-exit" >
{{--   token     --}}
        <input type="hidden" name="__token"     class="token" value="{!! csrf_token() !!}">
        <input type="hidden" name="d"           class="did" value="{{ $data->id }}">
        <input type="hidden" name="work_id"           class="work_id" value="{{ $data->work_id }}">
{{--        核对商品--}}
        <input type="hidden" name="check_url"   class="val_check_url"   value="{!! $data->check_url !!}">
{{--        实付金额--}}
        <input type="hidden" name="pay_price"   class="val_pay_price"   value="{!! $data->pay_price !!}">
{{--        货比三家1--}}
        <input type="hidden" name="pv_img_one"  class="val_pv_img_one"  value="{!!   $data->pv_img_one !!}">
{{--        货比三家2--}}
        <input type="hidden" name="pv_img_two"  class="val_pv_img_two"  value="{!! $data->pv_img_two !!}">
{{--        货比三家3--}}
        <input type="hidden" name="pv_img_three" class="val_pv_img_three" value="{!! $data->pv_img_three !!}">
{{--        副宝贝详情--}}
        <input type="hidden" name="goods_img"   class="val_goods_img"   value="{!! $data->goods_img !!}">
{{--        购物车截图--}}
        <input type="hidden" name="shop_img"    class="val_shop_img"    value="{!! $data->shop_img !!}">
{{--        付款截图--}}
        <input type="hidden" name="pay_img"     class="val_pay_img"     value="{!! $data->pay_img !!}">
{{--        好评截图--}}
        <input type="hidden" name="talk_img"    class="val_talk_img"    value="{!! $data->talk_img !!}">
{{--        快递签收截图--}}
        <input type="hidden" name="carriage_img" class="val_carriage_img" value="{!! $data->carriage_img !!}">

        <div style="margin-bottom: 10px">
        <div class="col-5" style="width: 48.5%;display: inline-block;margin-right: 1%"><input type="submit"  class="weui-btn weui-btn_primary" onclick="saveWork(2)" value="保存"></div>
        <div class="col-5" style="width: 48.5%;display: inline-block;"><input type="submit" style="background: #2ea8e5" class="weui-btn weui-btn_default" onclick="saveWork(1)"  value="提交审核"></div>
        </div>
    </div>
    <div class="weui-panel weui-panel_access" style="margin-bottom:80px">
        <div class="weui-cell weui-cell_access" href="javascript:;">
            <input type="submit"  class="weui-btn weui-btn_warn"  onclick="saveWork(5)"  value="取消任务">
        </div>
    </div>
    @endif
</div>


@stop



@section('footerJs')
    <script>
        function saveWork(type){
            initData(type);
        }


        function initData(type){
            var data = new Object();
            data._token         = $('.token').val();
            data.d              = $('.did').val();
            data.pv_img_one     = $('.val_pv_img_one').val();
            data.pv_img_two     = $('.val_pv_img_two').val();
            data.pv_img_three   = $('.val_pv_img_three').val();
            data.goods_img      = $('.val_goods_img').val();
            data.shop_img       = $('.val_shop_img').val();
            data.pay_img        = $('.val_pay_img').val();
            data.talk_img       = $('.val_talk_img').val();
            data.carriage_img   = $('.val_carriage_img').val();
            data.check_url   = $('.val_check_url').val();
            data.pay_price   = $('.val_pay_price').val();
            data.status = type;
            $.post("{{ route('up_store') }}", data,function(res){
                if(res.status){
                    $.toast(res.message, function() {
                        window.location.href = res.url;
                    });
                }else{
                    $.toast(res.message, "cancel",function () {
                        window.location.href = res.url;
                    });
                }
            },'json');
        }


        $(function () {
            // 允许上传的图片类型
            allowTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
            // 1024KB，也就是 1MB
            maxSize = 1024 * 1024;
            // 图片最大宽度
            maxWidth = 300;
            // 最大上传图片数量
            maxCount = 1;

            //货比三家1
            $('.pv_img_one').on('change', function (event) {
                var files = event.target.files;
                update_img(files,'uploader_pv_img_one','val_pv_img_one');
            });
            //货比三家2
            $('.pv_img_two').on('change', function (event) {
                var files = event.target.files;
                update_img(files,'uploader_pv_img_two','val_pv_img_two');
            });
            //货比三家3
            $('.pv_img_three').on('change', function (event) {
                var files = event.target.files;
                update_img(files,'uploader_pv_img_three','val_pv_img_three');
            });
            //副宝贝详情
            $('.goods_img').on('change', function (event) {
                var files = event.target.files;
                update_img(files,'uploader_goods_img','val_goods_img');
            });
            //购物车截图
            $('.shop_img').on('change', function (event) {
                var files = event.target.files;
                update_img(files,'uploader_shop_img','val_shop_img');
            });
            //支付截图
            $('.pay_img').on('change', function (event) {
                var files = event.target.files;
                update_img(files,'uploader_pay_img','val_pay_img');
            });
            //好评截图
            $('.talk_img').on('change', function (event) {
                var files = event.target.files;
                update_img(files,'uploader_talk_img','val_talk_img');
            });
            $('.carriage_img').on('change', function (event) {
                var files = event.target.files;
                update_img(files,'uploader_carriage_img','val_carriage_img');
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

        //核对商品
        $('.check_goods').click(function () {
            var good_name = $('#check_url').val();
            if(good_name){
                var data = new Object();
                data._token = $('.token').val();
                data.d = $('.did').val();
                data.work_id = $('.work_id').val();
                data.goods_name = good_name;
                $.post("{{ route('check_goods') }}", data,function(res){
                    if(res.status){
                        $.toast(res.message);
                        $('.val_check_url').val(good_name);
                    }else{
                        $.toast(res.message, "forbidden", function() {
                            $('#check_url').empty();
                            $('.val_check_url').empty();
                        });
                    }
                },'json');
            }else{
                $.toast("请输入需要核对的地址", "forbidden", function() {
                    $('#check_url').empty();
                });
            }
        })

        function pay_price(e){
            var pay_prices = $(e).val();
            $('.val_pay_price').val(pay_prices)
        }
    </script>
@stop
