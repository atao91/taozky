<div class="row">
    <div class="col-md-12"><div class="box box-info">
            <!-- form start -->
            <form action="/admin/orders/orders_store" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container>
                <div class="box-body">
                    <div class="fields-group">
                        <div class="form-group  ">
                            <label for="goods_img" class="col-sm-2 asterisk control-label">宝贝主图</label>
                            <div class="col-sm-8">
                                <input type="file" class="goods_img form-control">
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

    });
</script>
