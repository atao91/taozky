<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>@yield('title', '淘赚客') - 首页</title>
    @include('layouts._css')
</head>
<body>

<!-- 网站内容主体结束 -->


@include('layouts._header')

@yield('content')
<!-- 网站内容主体开始 -->

<div class="clearfix"><!-- 清除浮动 --></div>
@include('layouts._footer')
<!-- script -->
<script src="./js/jquery-1.11.3.min.js"></script>
<!-- weui -->
<script src="./weui/lib/fastclick.js"></script>
<script src="./weui/js/jquery-weui.min.js"></script>
<!-- swiper -->
<script src="./swiper/js/swiper.min.js"></script>

<script type="text/javascript">
    // swiper
    var swiper = new Swiper('.swiper-container', {
        pagination: {
            el: '.swiper-pagination',
        },
    });
</script>
@yield('footerJs')
</body>
</html>
