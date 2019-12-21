<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>会员登录</title>
    <!-- font-awesome & bootstrap.min.css-->
    <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- swiper -->
    <link rel="stylesheet" href="./swiper/css/swiper.min.css">
    <!-- weui -->
    <link rel="stylesheet" href="./weui/lib/weui.min.css">
    <link rel="stylesheet" href="./weui/css/jquery-weui.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- 网站内容主体开始 -->

<div class="mission">
    <!-- 返回上一级 -->
    <div class="nav-left">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <div style="text-align: center;">登录</div>
            </div>
            <div class="weui-cell__ft">&nbsp;</div>
        </div>
    </div><!-- 返回上一级 -->
    <div class="user-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label>用户名</label>
                <input type="text" class="form-control" name="name" placeholder="用户名" required>
                @error('name')
                <span class="invalid-feedback" style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>密码</label>
                <input type="password" name="password" class="form-control" placeholder="密码" required>
                @error('password')
                <span class="invalid-feedback" style="color: red"  role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button class="weui-btn weui-btn_warn">登录</button >
        </form>
    </div>

</div>
<div class="clearfix"><!-- 清除浮动 --></div>
<!-- 网站内容主体结束 -->

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

</body>
</html>
