<div class="row">
    <div class="col-md-12"><div class="box box-info">
            <!-- form start -->
            <form action="/admin/orders/orders_store" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container>
                <div class="box-body">
                    <div class="fields-group">
                        <div class="col-md-12">
                            {{-- 垫付任务详情--}}
                            <div class="row">
                                <div style="height: 20px; padding-left:100px;border-bottom: 1px solid #eee; text-align: left;margin-top: 20px;margin-bottom: 20px;">
                                    <span style="font-size: 18px; background-color: #ffffff;padding: 0 10px;"><b>垫付任务详情</b></span>
                                </div>
                                {{--  请选择一个任务模板  --}}
                                <div class="form-group  ">
                                    <label for="templates_id" class="col-sm-2 asterisk control-label">请选择一个任务模板</label>
                                    <div class="col-sm-8">
                                        <select class="form-control templates_id" style="width: 100%;" name="templates_id" required="1" data-value="" >
                                            <option value=""></option>
                                            @foreach($temps as $k => $v)
                                                <option value="{{ $k }}" >{{ $v }}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block">
                                        <i class="fa fa-info-circle"></i>&nbsp;此垫付任务将使用该模板的设置
                                    </span>
                                    </div>
                                </div>
                                {{-- 任务入口 --}}
                                <div class="form-group  ">
                                    <label for="order_in" class="col-sm-2 asterisk control-label">任务入口</label>
                                    <div class="col-sm-8">
                                        @foreach(order_in() as $k => $v)
                                            <span class="icheck">
                                        <label class="radio-inline">
                                            <input type="radio" name="order_in"  value="{{ $k }}" class="minimal order_in" @if($k == '0') checked @endif required="1" />&nbsp;{{ $v }} &nbsp;&nbsp;
                                        </label>
                                    </span>
                                        @endforeach
                                        <span class="help-block">
                                        <i class="fa fa-info-circle"></i>&nbsp;请选择任务入口方式
                                    </span>
                                    </div>
                                </div>
                                {{-- 搜索关键字--}}
                                <div class="form-group  ">
                                    <label for="in_key" class="col-sm-2 asterisk control-label">搜索关键字</label>
                                    <div class="col-sm-8">
                                        <input required="1" type="text" id="in_key" name="in_key" value="" class="form-control in_key" placeholder="输入 搜索关键字" />
                                    </div>
                                </div>
                                {{-- 垫付任务数量--}}
                                <div class="form-group  ">
                                    <label for="prepay_num" class="col-sm-2 asterisk control-label">垫付任务数量</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input required="1" min="0" style="width: 100px" type="text" id="prepay_num" onchange="on_prepay_num(this)" name="prepay_num" value="0" class="form-control prepay_num" placeholder="输入 垫付任务数量" />
                                        </div>
                                    </div>
                                </div>
                                {{-- 流量任务数量--}}
                                <div class="form-group  ">
                                    <label for="flow_num" class="col-sm-2 asterisk control-label">流量任务数量</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input required="1" min="0" style="width: 100px" type="text" id="flow_num" onchange="on_flow_num(this)" name="flow_num" value="0" class="form-control flow_num" placeholder="输入 流量任务数量" />
                                        </div>
                                    </div>
                                </div>
                                {{-- 排序方式--}}
                                <div class="form-group  ">
                                    <label for="sort_type" class="col-sm-2 asterisk control-label">排序方式</label>
                                    <div class="col-sm-8">
                                        @foreach(sort_type() as $k => $v)
                                            <span class="icheck">
                                        <label class="radio-inline">
                                            <input type="radio" name="sort_type" value="{{ $k }}" class="minimal sort_type" @if($k == '0') checked @endif required="1" />&nbsp;{{ $v }}&nbsp;&nbsp;
                                        </label>
                                    </span>
                                        @endforeach
                                        <span class="help-block"><i class="fa fa-info-circle"></i>&nbsp;综合排序宝贝位置不稳定，推荐使用销量排序</span>
                                    </div>
                                </div>
                                {{-- 现有收货人数--}}
                                <div class="form-group  ">
                                    <label for="take_num" class="col-sm-2 asterisk control-label">现有收货人数</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input min="0" required="1" style="width: 100px" type="text" id="take_num" name="take_num" value="" class="form-control take_num" placeholder="输入 现有收货人数" />
                                        </div>
                                        <span class="help-block"><i class="fa fa-info-circle"></i>&nbsp;此处为手机淘宝搜索列表页显示的人数</span>
                                    </div>
                                </div>
                                {{-- 尺码规格--}}
                                <div class="form-group  ">
                                    <label for="goods_sku" class="col-sm-2  control-label">尺码规格</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="goods_sku" name="goods_sku" value="" class="form-control goods_sku" placeholder="输入 尺码规格" />
                                        <span class="help-block"><i class="fa fa-info-circle"></i>&nbsp;商品的SKU，不指定可填写“任意"</span>
                                    </div>
                                </div>
                                {{-- 实际成交价格--}}
                                <div class="form-group  ">
                                    <label for="actual_price" class="col-sm-2 asterisk control-label">实际成交价格</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">￥</span>
                                            <input required="1" style="width: 120px" type="text" id="actual_price" name="actual_price" value="" min="0" onchange="changePrice(this)" class="form-control actual_price" placeholder="输入 实际成交价格" />
                                        </div>
                                        <span class="help-block"><i class="fa fa-info-circle"></i>&nbsp;垫付任务本金</span>
                                    </div>
                                </div>
                                {{-- 每单拍--}}
                                <div class="form-group  ">
                                    <label for="buy_num" class="col-sm-2 asterisk control-label">每单拍</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input required="1" style="width: 100px" type="text" id="buy_num" min="1" onchange="on_buy_num(this)" name="buy_num" value="1" class="form-control buy_num" placeholder="输入 每单拍" />
                                        </div>
                                        <span class="help-block"><i class="fa fa-info-circle"></i>&nbsp;每个订单拍的商品件数</span>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <label for="is_coupon" class="col-sm-2 asterisk control-label">是否使用优惠券</label>
                                    <div class="col-sm-8">
                                        @foreach(is_coupon() as $k => $v)
                                            <span class="icheck">
                                        <label class="radio-inline">
                                            <input type="radio" name="is_coupon"  value="{{ $k }}" class="minimal is_coupon" @if($k == '0') checked @endif required="1" />&nbsp;{{ $v }} &nbsp;&nbsp;
                                        </label>
                                    </span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <label for="is_chat" class="col-sm-2 asterisk control-label">是否需要假聊</label>
                                    <div class="col-sm-8">
                                        @foreach(is_chat() as $k => $v)
                                            <span class="icheck">
                                        <label class="radio-inline">
                                            <input type="radio" name="is_chat"  value="{{ $k }}" class="minimal is_chat" @if($k == '0') checked @endif required="1" />&nbsp;{{ $v }} &nbsp;&nbsp;
                                        </label>
                                    </span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <label for="is_wabei" class="col-sm-2 asterisk control-label">是否需要会员截图操作</label>
                                    <div class="col-sm-8">
                                        @foreach(is_wabei() as $k => $v)
                                            <span class="icheck">
                                        <label class="radio-inline">
                                            <input type="radio" name="is_wabei"  value="{{ $k }}" class="minimal is_wabei" @if($k == '0') checked @endif required="1" />&nbsp;{{ $v }} &nbsp;&nbsp;
                                        </label>
                                    </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{-- 返款模式和千人千面设置   --}}
                            <div class="row">
                                <div style="height: 20px; padding-left:100px;border-bottom: 1px solid #eee; text-align: left;margin-top: 20px;margin-bottom: 20px;">
                                    <span style="font-size: 18px; background-color: #ffffff;padding: 0 10px;"><b>返款模式和千人千面设置</b></span>
                                </div>
                                {{--                            安全服务--}}
                                <div class="form-group  ">
                                    <label for="is_safety" class="col-sm-2 asterisk control-label">安全服务</label>
                                    <div class="col-sm-8">
                                        @foreach(is_safety() as $k => $v)
                                            <span class="icheck">
                                        <label class="radio-inline">
                                            <input type="radio" name="is_safety"  value="{{ $k }}" class="minimal is_safety" @if($k == '0') checked @endif required="1" />&nbsp;{{ $v }} &nbsp;&nbsp;
                                        </label>
                                    </span>
                                        @endforeach
                                        <span class="help-block"><i class="fa fa-info-circle"></i>&nbsp;收取服务费 2 元/单 (活动期间免服务费)</span>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <label for="order_type" class="col-sm-2  control-label">放单模式</label>
                                    <div class="col-sm-8">
                                        @foreach(order_type() as $k => $v)
                                            <span class="icheck">
                                        <label class="radio-inline">
                                            <input type="radio" name="order_type"  value="{{ $k }}" class="minimal order_type" @if($k == '0') checked @endif required="1" />&nbsp;{{ $v }} &nbsp;&nbsp;
                                        </label>
                                    </span>
                                        @endforeach
                                    </div>
                                </div>
                                {{--                            花呗设置--}}
                                <div class="form-group  ">
                                    <label for="is_tokio" class="col-sm-2  control-label">花呗设置</label>
                                    <div class="col-sm-8">
                                        @foreach(is_tokio() as $k => $v)
                                            <span class="icheck">
                                        <label class="radio-inline">
                                            <input type="radio" name="is_tokio"  value="{{ $k }}" class="minimal is_tokio" @if($k == '0') checked @endif required="1" />&nbsp;{{ $v }} &nbsp;&nbsp;
                                        </label>
                                    </span>
                                        @endforeach
                                    </div>
                                </div>
                                {{--                            性别限制--}}
                                <div class="form-group  ">
                                    <label for="sex" class="col-sm-2  control-label">性别限制</label>
                                    <div class="col-sm-8">
                                        @foreach(sex_type() as $k => $v)
                                            <span class="icheck">
                                        <label class="radio-inline">
                                            <input type="radio" name="sex"  value="{{ $k }}" class="minimal sex" @if($k == '0') checked @endif required="1" />&nbsp;{{ $v }} &nbsp;&nbsp;
                                        </label>
                                    </span>
                                        @endforeach
                                    </div>
                                </div>
                                {{-- 年龄限制 --}}
                                <div class="form-group  ">
                                    <label for="age_range" class="col-sm-2  control-label">年龄限制</label>
                                    <div class="col-sm-8">
                                        <select class="form-control age_range" style="width: 100%;" name="age_range" data-value="" >
                                            <option value=""></option>
                                            @foreach(age_range() as $k => $v)
                                                <option value="{{ $k }}" >{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- 等级限制 --}}
                                <div class="form-group  ">
                                    <label for="grade" class="col-sm-2  control-label">等级限制</label>
                                    <div class="col-sm-8">
                                        <select class="form-control grade" style="width: 100%;" name="grade" data-value="" >
                                            <option value=""></option>
                                            @foreach(grade_range() as $k => $v)
                                                <option value="{{ $k }}" >{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- 发布时间和评论 --}}
                            <div class="row">
                                <div style="height: 20px; padding-left:100px;border-bottom: 1px solid #eee; text-align: left;margin-top: 20px;margin-bottom: 20px;">
                                    <span style="font-size: 18px; background-color: #ffffff;padding: 0 10px;"><b>发布时间和评论</b></span>
                                </div>

                                <div class="form-group  ">
                                    <label for="order_start" class="col-sm-2 asterisk control-label">任务时间范围</label>
                                    <div class="col-sm-8">
                                        <div class="row" style="width: 390px">
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" name="order_start" value="" class="form-control order_start" style="width: 160px" required="1" />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" name="order_end" value="" class="form-control order_end" style="width: 160px" required="1" />
                                                </div>
                                            </div>
                                        </div>
                                        <span class="help-block"><i class="fa fa-info-circle"></i>&nbsp;举例：如设置当天时间完成10单，请设置当天开始日期和结束日期。如设置当天开始日期，而结束日期设置了隔天，系统会进行判断在当天设置时间内完成了8单，如有2单未完成，隔天系统会继续放出。</span>
                                    </div>
                                </div>
                                {{-- 垫付任务放单时间间隔 --}}
                                <div class="form-group  ">
                                    <label for="perpay_gap_min" class="col-sm-2  control-label">垫付任务放单时间间隔（分钟）</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input min="0" style="width: 100px" type="text" id="perpay_gap_min" name="perpay_gap_min" value="" class="form-control perpay_gap_min" placeholder="输入 垫付任务放单时间间隔（分钟）" />
                                        </div>
                                        <span class="help-block"><i class="fa fa-info-circle"></i>&nbsp;放任务时两单之间的时间间隔分钟数，留空或填“0”则任务到开始时间后一次性发放</span>
                                    </div>
                                </div>
                                {{-- 流量任务放单时间间隔--}}
                                <div class="form-group  ">
                                    <label for="flow_gap_min" class="col-sm-2  control-label">流量任务放单时间间隔（分钟）</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input min="0" style="width: 100px" type="text" id="flow_gap_min" name="flow_gap_min" value="" class="form-control flow_gap_min" placeholder="输入 流量任务放单时间间隔（分钟）" />
                                        </div>
                                        <span class="help-block"><i class="fa fa-info-circle"></i>&nbsp;放任务时两单之间的时间间隔分钟数，留空或填“0”则任务到开始时间后一次性发放</span>
                                    </div>
                                </div>
                                {{--  评价方式--}}
                                <div class="form-group  ">
                                    <label for="talk_type" class="col-sm-2  control-label">评价方式</label>
                                    <div class="col-sm-8">
                                        @foreach(talk_type() as $k => $v)
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="talk_type"  value="{{ $k }}" class="minimal talk_type" @if($k == '0') checked @endif required="1" />&nbsp;{{ $v }} &nbsp;&nbsp;
                                                </label>
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{-- 费用明细  --}}
                            <div class="row">
                                <div style="height: 20px; padding-left:100px;border-bottom: 1px solid #eee; text-align: left;margin-top: 20px;margin-bottom: 20px;">
                                    <span style="font-size: 18px; background-color: #ffffff;padding: 0 10px;"><b>费用明细</b></span>
                                </div>
                                <div class="form-group  ">
                                    <div class="col-sm-2"></div>
                                    <label for="" class="col-sm-10  control-label" style="text-align: left;font-size: 20px; color:#ff0000">本金和佣金会在任务完成后支付给会员，请务必确认无误</label>
                                </div>
                                <div class="form-group  ">
                                    <div class="col-sm-2"></div>
                                    <label for="" class="col-sm-10  control-label" style="text-align: left;font-size: 20px;">
                                        本金 <span class="actual_price_class" style="font-size: 20px; color:#ff0000">0.00</span> x <span class="prepay_num_class" style="font-size: 20px; color:#ff0000">0</span>单 = <span class="sum_actual_price" style="font-size: 20px; color:#ff0000">0.00</span>元
                                    </label>
                                </div>
                                {{--佣金和服务费--}}
                                <div class="form-group  ">
                                    <div class="col-sm-2"></div>
                                    <label for="" class="col-sm-10  control-label" style="text-align: left;font-size: 20px;">
                                        佣金和服务费 <span class="flow_price_class" style="font-size: 20px; color:#ff0000">0.00</span> x <span class="prepay_num_class" style="font-size: 20px; color:#ff0000">0</span>单 = <span class="sum_flow_price_class" style="font-size: 20px; color:#ff0000">0.00</span>元
                                    </label>
                                </div>
                                {{--流量佣金--}}
                                <div class="form-group  ">
                                    <div class="col-sm-2"></div>
                                    <label for="" class="col-sm-10  control-label" style="text-align: left;font-size: 20px;">
                                        流量佣金 <span class="" style="font-size: 20px; color:#ff0000">1</span>元 x <span class="flow_num_class" style="font-size: 20px; color:#ff0000">0</span>单 = <span class="sum_flow_num_class" style="font-size: 20px; color:#ff0000">0.00</span>元
                                    </label>
                                </div>
                                {{--评价额外--}}
                                <div class="form-group  ">
                                    <div class="col-sm-2"></div>
                                    <label for="" class="col-sm-10  control-label" style="text-align: left;font-size: 20px;">
                                        评价佣金 <span class="talk_type_price" style="font-size: 20px; color:#ff0000">1</span>元
                                    </label>
                                </div>
                                <div class="form-group  ">
                                    <div class="col-sm-2"></div>
                                    <label for="" class="col-sm-10  control-label" style="text-align: left;font-size: 20px;">
                                        共需支付金额 <span class="sum_price_all" style="font-size: 20px; color:#ff0000">0.00</span>元
                                    </label>
                                </div>
                                <input type="hidden" name="reward_price" value="0" class="reward_price"  />
                                <input type="hidden" name="pj_price" value="1" class="pj_price"  />
                                <input type="hidden" name="flow_price" value="0" class="flow_price"  />
                                <input type="hidden" name="total_price" value="" class="total_price"  />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="btn-group pull-left" style="margin-right: 10px">
                            <button type="reset" class="btn btn-warning">重置</button>
                        </div>
                        <div class="btn-group pull-left">
                            <button type="submit" class="btn btn-primary">提交</button>
                        </div>
                    </div>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>

    </div>
</div>

<script data-exec-on-popstate>
    $(function () {
        $(".templates_id").select2({"allowClear":true,"placeholder":{"id":"","text":"\u8bf7\u9009\u62e9\u4e00\u4e2a\u4efb\u52a1\u6a21\u677f"}});
        $('.order_in').iCheck({radioClass:'iradio_minimal-blue'});

        $('.prepay_num:not(.initialized)')
            .addClass('initialized')
            .bootstrapNumber({
                upClass: 'success',
                downClass: 'primary',
                center: true
            });


        $('.flow_num:not(.initialized)')
            .addClass('initialized')
            .bootstrapNumber({
                upClass: 'success',
                downClass: 'primary',
                center: true
            });

        $('.sort_type').iCheck({radioClass:'iradio_minimal-blue'});

        $('.take_num:not(.initialized)')
            .addClass('initialized')
            .bootstrapNumber({
                upClass: 'success',
                downClass: 'primary',
                center: true
            });

        $('.actual_price').inputmask({"alias":"currency","min":0,"radixPoint":".","prefix":"","removeMaskOnSubmit":true});

        $('.buy_num:not(.initialized)')
            .addClass('initialized')
            .bootstrapNumber({
                upClass: 'success',
                downClass: 'primary',
                center: true,
                min:1
            });

        $('.is_coupon').iCheck({radioClass:'iradio_minimal-blue'});
        $('.is_chat').iCheck({radioClass:'iradio_minimal-blue'});
        $('.is_wabei').iCheck({radioClass:'iradio_minimal-blue'});
        $('.is_safety').iCheck({radioClass:'iradio_minimal-blue'});
        $('.order_type').iCheck({radioClass:'iradio_minimal-blue'});
        $('.is_tokio').iCheck({radioClass:'iradio_minimal-blue'});
        $('.sex').iCheck({radioClass:'iradio_minimal-blue'});
        $(".age_range").select2({"allowClear":true,"placeholder":{"id":"","text":"\u5e74\u9f84\u9650\u5236"}});
        $(".grade").select2({"allowClear":true,"placeholder":{"id":"","text":"\u7b49\u7ea7\u9650\u5236"}});
        $('.order_start').datetimepicker({"format":"YYYY-MM-DD HH:mm:ss","locale":"zh-CN"});
        $('.order_end').datetimepicker({"format":"YYYY-MM-DD HH:mm:ss","locale":"zh-CN","useCurrent":false});
        $(".order_start").on("dp.change", function (e) {
            $('.order_end').data("DateTimePicker").minDate(e.date);
        });
        $(".order_end").on("dp.change", function (e) {
            $('.order_start').data("DateTimePicker").maxDate(e.date);
        });

        $('.perpay_gap_min:not(.initialized)')
            .addClass('initialized')
            .bootstrapNumber({
                upClass: 'success',
                downClass: 'primary',
                center: true
            });


        $('.flow_gap_min:not(.initialized)')
            .addClass('initialized')
            .bootstrapNumber({
                upClass: 'success',
                downClass: 'primary',
                center: true
            });

        $('.talk_type').iCheck({radioClass:'iradio_minimal-blue'});
        $('.after-submit').iCheck({checkboxClass:'icheckbox_minimal-blue'}).on('ifChecked', function () {
            $('.after-submit').not(this).iCheck('uncheck');
        });
        $('.container-refresh').off('click').on('click', function() {
            $.admin.reload();
            $.admin.toastr.success('刷新成功 !', '', {positionClass:"toast-top-center"});
        });
    });
</script>
<script>
    actual_price_class = 0; //单价
    a_actual_price_class = 0; //单价
    sum_actual_price = 0;   //总共本金
    flow_price_class = 0;   //基础服务费
    buy_num_class = 1;      //每单拍

    prepay_num_class = 0;   //垫付单量
    flow_num_class = 0;      //流量单
    talk_type_price = 1;      //评价

    /*
       计算基础佣金 和 单价
     */
    function changePrice(e){
        actual_price_class = parseFloat($(e).val().replace(/,/g, ""));
        a_actual_price_class = actual_price_class*buy_num_class;
        fun_flow_price_class();

        initPriceSum();
    }
    /*
       计算单量
     */
    function on_prepay_num(e){
        prepay_num_class = parseFloat($(e).val().replace(/,/g, ""));
        initPriceSum();
    }
    function on_flow_num(e){
        flow_num_class = parseFloat($(e).val().replace(/,/g, ""));
        initPriceSum();
    }
    /*
    计算佣金
    */
    function fun_flow_price_class(){
        if(a_actual_price_class<=1000){
            if(a_actual_price_class<=100){
                base_price = 0;
            }else{
                base_price = parseInt((a_actual_price_class-100)/100);
            }
            flow_price_class = 6;
        }else if(a_actual_price_class>1000){
            if(a_actual_price_class<=100){
                base_price = 0;
            }else{
                base_price = parseInt((a_actual_price_class-1000)/500);
            }
            flow_price_class = 15;
        }

        flow_price_class += base_price;
        initPriceSum();
    }
    /*
    评价
    */
    $('.talk_type').on('ifChecked', function(event){ //ifCreated 事件应该在插件初始化之前绑定
        talk_type =  $(this).val()
        if(talk_type == 3){
            talk_type_price = 2;
        }else{
            talk_type_price = 1;
        }
        initPriceSum();
    });




    /*
        每单拍数
     */
    function on_buy_num(e) {
        buy_num_class = $(e).val().replace(/,/g, "")
        a_actual_price_class = actual_price_class*buy_num_class;
        fun_flow_price_class();
    }
    function initPriceSum(){
        $('.actual_price_class').html(a_actual_price_class);   //本金
        $('.flow_price_class').html(flow_price_class);  //基础服务费
        $('.prepay_num_class').html(prepay_num_class);
        $('.sum_actual_price').html(a_actual_price_class*prepay_num_class);
        $('.sum_flow_price_class').html(flow_price_class*prepay_num_class);
        $('.flow_num_class').html(flow_num_class);
        $('.sum_flow_num_class').html(flow_num_class*1);
        $('.talk_type_price').html(talk_type_price);

        sum_price_all = (a_actual_price_class*prepay_num_class)+(flow_price_class*prepay_num_class)+(flow_num_class*1)+talk_type_price;
        $('.sum_price_all').html(sum_price_all)

        $('.total_price').val(sum_price_all)
        $('.reward_price').val(flow_price_class);
        $('.flow_price').val(flow_num_class);
        $('.pj_price').val(talk_type_price);

    }
</script>
