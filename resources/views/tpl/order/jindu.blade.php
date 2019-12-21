<div class="row">
    <form action="/admin/works/check_work" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container>
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">任务信息</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>操作内容</th>
                            <th>操作者</th>
                            <th>结果</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>入口类型</td><td>卖家</td><td>{{ order_in()[$data->orders->order_in] }}</td></tr>
                        <tr><td>入口详情</td><td>卖家</td><td>{{ $data->orders->in_key }}</td></tr>
                        <tr><td>商品的单价</td><td>卖家</td><td>{{ round($data->orders->actual_price,2) }}</td></tr>
                        <tr><td>要求购买的件数</td><td>卖家</td><td>{{ $data->orders->buy_num }}</td></tr>
                        <tr><td>商家额外要求</td><td>卖家</td><td>{{ is_chat()[$data->orders->is_chat] }}</td></tr>
{{--                        <tr><td>主搜页面</td><td>买家</td><td><img src="{{ $data->liuc->img_one }}" alt="" width="150px" height="150px"></td></tr>--}}
                        <tr><td>货比第一家</td><td>买家</td><td><img src="{{ $data->liuc->pv_img_one }}" alt="" width="150px" height="150px"></td></tr>
                        <tr><td>货比第二家</td><td>买家</td><td><img src="{{ $data->liuc->pv_img_two }}" alt="" width="150px" height="150px"></td></tr>
                        <tr><td>货比第三家</td><td>买家</td><td><img src="{{ $data->liuc->pv_img_three }}" alt="" width="150px" height="150px"></td></tr>
                        <tr><td>商品核对结果</td><td>买家</td><td>@if($data->liuc->check_url) 正确 @endif</td></tr>
{{--                        <tr><td>店铺浏览图1</td><td>买家</td><td><img src="{{ $data->liuc->pv_img_one }}" alt="" width="150px" height="150px"></td></tr>--}}
{{--                        <tr><td>店铺浏览图2</td><td>买家</td><td><img src="{{ $data->liuc->pv_img_two }}" alt="" width="150px" height="150px"></td></tr>--}}
                        <tr><td>副宝贝详情</td><td>买家</td><td><img src="{{ $data->liuc->goods_img }}" alt="" width="150px" height="150px"></td></tr>
                        <tr><td>加入购物车截图</td><td>买家</td><td><img src="{{ $data->liuc->shop_img }}" alt="" width="150px" height="150px"></td></tr>
                        <tr><td>付款截图</td><td>买家</td><td><img src="{{ $data->liuc->pay_img }}" alt="" width="150px" height="150px"></td></tr>
                        <tr><td>买家实付金额</td><td>买家</td><td>{{ $data->liuc->pay_price }}</td></tr>
                        <tr><td>同意支付的本金金额</td><td>卖家</td><td>{{ $data->orders->total_price }}</td></tr>
                        <tr><td>评价类型</td><td>卖家</td><td>{{ talk_type()[$data->orders->talk_type] }}</td></tr>
                        <tr><td>好评截图</td><td>买家</td><td><img src="{{ $data->liuc->talk_img }}" alt="" width="150px" height="150px"></td></tr>
                        <tr><td>物流快递签收截图</td><td>买家</td><td><img src="{{ $data->liuc->carriage_img }}" alt="" width="150px" height="150px"></td></tr>
                        <tr><td>审核理由</td><td>卖家</td><td><input type="text" class="form-control check_remark" name="check_remark" id="check_remark" cols="30" rows="6">{{ $data->liuc->check_remark }} </td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        @if($data->status == 2)
        <div class="box-footer">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="status" class="status" value="3">
            <input type="hidden" name="id" class="work_id" value="{{ $data->id }}">
            <input type="hidden" name="liuc_id" class="liuc_id" value="{{ $data->liuc->id }}">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="btn-group pull-right">
                    <button type="submit" class="btn check_submit btn-warning" value="4">审核拒绝</button>
                </div>
                <div class="btn-group pull-right" style="margin-right: 10px">
                    <button type="submit" class="btn check_submit btn-primary" value="3">审核通过</button>
                </div>
            </div>
        </div>
        @endif
    </form>
</div>
<script>
    $('.check_submit').click(function(){
        $status = $(this).val()
        if($status == 4){
            if(!$('.check_remark').val()){
                toastr.error('审核理由不可以为空');
                return false;
            }

            return false;
        }
        $('.status').val($(this).val());
    });
</script>
