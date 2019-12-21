@extends('layouts.app')
@section('title', '任务大厅')

@section('content')
    <style>
        .img-responsive{width: 98%;height: 48%}
    </style>
    <div class="mission">
             <div class="page-header" style="margin: 20px 0 20px;">
            <h4 class="text-center">任务列表</h4>
        </div>
        <!-- 商品 -->
        <div class="product-mobile">
            @foreach($data as $k => $v)
            <div class="col-mobile" style="margin-bottom: 10px;">
                <div class="product-title" style="height: 20%">
                    <a href="{{ route('goods').'?d='.$v->id }}" style="height: 11rem">
                        <img src="{{ env('APP_URL_SH').$v->orders->templates->goods_img }}" class="img-responsive" style="height: 100%">
                    </a>
                    <a href="{{ route('goods').'?d='.$v->id }}">
                        <p class="similar-product-text">{{ $v->work_no }}</p>
                    </a>
                    <div class="weui-flex">
                        <div class="weui-flex__item">
                            <div class="placeholder">
                                <span class="product-money"><i class="fa fa-rmb"></i> {{ $v->orders->actual_price }}</span>
                            </div>
                        </div>
                        <div class="weui-flex__item">
                            <div class="placeholder">
                                <span class="product-sell">已售出{{ $v->orders->take_num }}件</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!-- 商品 -->
        <div  style="margin-bottom: 10%;clear: both;text-align: center">{{ $data->render() }}</div>  <!-- 只需要添加这一行 -->
    </div>

@stop


@section('footerJs')
    <script>
        var loading = false;  //状态标记
        $(document.body).infinite().on("infinite", function() {
            if(loading) return;
            loading = true;
            setTimeout(function() {
                $("#list").append("<p> 我是新加载的内容 </p>");
                loading = false;
            }, 1500);   //模拟延迟
        });
    </script>
@stop
