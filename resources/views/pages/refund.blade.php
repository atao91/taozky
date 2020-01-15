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
                    <div style="text-align: center;">提现</div>
                </div>
                <div class="weui-cell__ft">&nbsp;</div>
            </div>
        </div><!-- 返回上一级 -->
        <div class="weui-cells" style="padding-bottom: 5px;">
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd"><p>余额 <span style="color: red">{!! $data->amount !!}</span>元， 最少提现金额<span style="color: red">10</span>元</p></div>
            </div>
        </div>
        <div class="weui-cells" style="padding-bottom: 5px;">
            <div class="weui-cell weui-cell_access" href="javascript:;">
                <div class="weui-cell__hd"><p>提现金额</p></div>
                <div class="weui-cell__bd"><input class="weui-input" id="amount" type="text" name="amount" placeholder="请输入提现金额" required="1"></div>
                <div class="weui-cell__ft"></div>
            </div>
            <div class="user-exit" >
                @if($data->amount >=10)
                <input type="submit"  class="weui-btn weui-btn_warn" value="申请提现">
                @endif
            </div>
        </div>
        <div id="list" class='weui-cells' style="margin-bottom:80px">
            <div class="weui-cell"> <h1>重要提醒:</h1></div>
            <div class="weui-cell">1.提现金额单位是元，不支持角分提现</div>
            <div class="weui-cell">2.最少提现金额为10元</div>
            <div class="weui-cell">3.银行卡请绑定我们指定的银行，工商银行、建设银行、农业银行、中国银行、民生银行、交通银行、招商银行</div>
            <div class="weui-cell">4.如提现未到帐,首先请检查所绑定的银行卡信息是否正确.（银行卡填写错误，请联系客服解绑重新绑定，如有银行退回，我们会重新返款）</div>
            <div class="weui-cell">5.提现时间15:00前，打款时间：15:00【15:00后提现的第二天15:00统一打款】，具体的到账时间根据银行受理情况决定，头一天下午三点后提现的和当天下午三点前提现的总金额会一笔打过去，请注意核对金额</div>
            <div class="weui-cell">6.如需查询您的金额是否到账，请在1-3个工作日之内查询。（双休，节假日，特殊情况除外）</div>
            <div class="weui-cell">7.如未收到提现金额，请联系平台客服。（请通过网上银行，手机银行，银行营业大厅去查询。不要通过非银行的第三方软件查询，否则不予受理)</div>
            <div class="weui-cell">8.平台打款时间为：周一至周五，周末和法定节假日提现不打款，统一在下一个工作日15:00打款</div>
        </div>
    </div>
    <input type="hidden" name="_token" class="token" value="{!! csrf_token() !!}">
@stop


@section('footerJs')
    <script>
        $(function () {
            $('.weui-btn_warn').click(function () {
                amount = $('#amount').val();
                if(amount < 10){
                    $.toast("提现金额必须大于10", "cancel");
                    return false;
                }
                if(amount > {!! $data->amount !!}){
                    $.toast("提现金额不能超出余额", "cancel");
                    return false;
                }
                var data = new Object();
                data._token = $('.token').val();
                data.amount = amount;
                $.post("{{ route('refund_apply') }}", data,function(res){
                    $.toast(res.message,2000);
                    setInterval(function () {
                        window.location.reload();
                    },2000);
                },'json');
            })
        })
    </script>

@stop
