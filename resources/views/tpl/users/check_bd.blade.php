<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="box-tools">
                        <div class="btn-group pull-right" style="margin-right: 5px">
                            <a href="/admin/users/check_bd" class="btn btn-sm btn-default" title="列表"><i class="fa fa-list"></i><span class="hidden-xs">&nbsp;列表</span></a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('bind_store') }}" method="post" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" pjax-container>
                    <div class="box-body">
                        <div class="fields-group">
                            <div class="form-group ">
                                <label class="col-sm-2  control-label">关联会员</label>
                                <div class="col-sm-8">
                                    <div class="box box-solid box-default no-margin">
                                        <!-- /.box-header -->
                                        <div class="box-body">{{ $data->users->name }}&nbsp;</div><!-- /.box-body -->
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-sm-2  control-label">淘宝会员名</label>
                                <div class="col-sm-8">
                                    <div class="box box-solid box-default no-margin">
                                        <!-- /.box-header -->
                                        <div class="box-body">{{ $data->ali_name }}&nbsp; </div><!-- /.box-body -->
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  ">
                                <label for="sex" class="col-sm-2  control-label">淘宝会员等级</label>
                                <div class="col-sm-8">
                                    <div class="box box-solid box-default no-margin">
                                        <!-- /.box-header -->
                                        <div class="box-body"><img src="//cdn.tbzlc.com/binary//level/level_{!! $data->ali_level !!}.gif">&nbsp; </div><!-- /.box-body -->
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-sm-2  control-label">淘宝会员等级</label>
                                <div class="col-sm-8">
                                    <div class="box box-solid box-default no-margin">
                                        <!-- /.box-header -->
                                        <div class="box-body">{{ sex_type()[$data->sex] }}&nbsp; </div><!-- /.box-body -->
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-sm-2  control-label">收货人姓名</label>
                                <div class="col-sm-8">
                                    <div class="box box-solid box-default no-margin">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            123&nbsp;
                                        </div><!-- /.box-body -->
                                    </div>


                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-sm-2  control-label">收货人电话</label>
                                <div class="col-sm-8">
                                    <div class="box box-solid box-default no-margin">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            123&nbsp;
                                        </div><!-- /.box-body -->
                                    </div>


                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-sm-2  control-label">收货地址</label>
                                <div class="col-sm-8">
                                    <div class="box box-solid box-default no-margin">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            北京 北京市 东城区&nbsp;
                                        </div><!-- /.box-body -->
                                    </div>


                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-sm-2  control-label">详细街道地址</label>
                                <div class="col-sm-8">
                                    <div class="box box-solid box-default no-margin">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            123&nbsp;
                                        </div><!-- /.box-body -->
                                    </div>


                                </div>
                            </div>
                            <div class="form-group  ">
                                <label for="level_img" class="col-sm-2  control-label">淘宝等级截图</label>
                                <div class="col-sm-8">
                                    <div class="file-preview-frame krajee-default  file-preview-initial file-sortable kv-preview-thumb" id="preview-1573644475054_47-init_0" data-fileindex="init_0" data-template="image">
                                        <div class="kv-file-content">
                                            <img src="{{ env('APP_URL').'/storage/upload/'.$data->level_img }}" class="file-preview-image kv-preview-data" title="{{ $data->level_img }}" alt="{{ $data->level_img }}" style="width:auto;height:auto;max-width:100%;max-height:100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group  ">
                                <label for="ali_auth" class="col-sm-2  control-label">实名认证截图</label>
                                <div class="col-sm-8">
                                    <div class="file-preview-frame krajee-default  file-preview-initial file-sortable kv-preview-thumb" id="preview-1573644475054_47-init_0" data-fileindex="init_0" data-template="image">
                                        <div class="kv-file-content">
                                            <img src="{{ env('APP_URL').'/storage/upload/'.$data->ali_auth }}" class="file-preview-image kv-preview-data" title="{{ $data->ali_auth }}" alt="{{ $data->ali_auth }}" style="width:auto;height:auto;max-width:100%;max-height:100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group  ">
                                <label for="status" class="col-sm-2  control-label">审核状态</label>
                                <div class="col-sm-8">
                                    <span class="icheck">
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="0" class="minimal status" checked="" style="position: absolute; opacity: 0;">&nbsp;审核通过&nbsp;&nbsp;
                                        </label>
                                    </span>
                                    <span class="icheck">
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="1" class="minimal status" checked="" style="position: absolute; opacity: 0;">&nbsp;审核拒绝&nbsp;&nbsp;
                                        </label>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group  ">
                                <label for="app_remark" class="col-sm-2  control-label">审核备注</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text" id="app_remark" name="app_remark" value="" class="form-control app_remark" placeholder="输入 审核备注" required="1"/>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="admin_id" value="{{ Admin::user()->id }}" class="admin_id"  />
                            <input type="hidden" name="id" value="{{ $data->id }}" class="id"  />
                            <input type="hidden" name="user_id" value="{{ $data->user_id }}"  />

                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-8">
                            <div class="btn-group pull-right">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-footer -->
                </form>
            </div>

        </div></div>

</section>
</div>
<script data-exec-on-popstate>

    $(function () {
        $('.status').iCheck({radioClass:'iradio_minimal-blue'});

        $("form select").on("select2:opening", function (e) {
            if($(this).attr('readonly') || $(this).is(':hidden')){
                e.preventDefault();
            }
        });
        $(document).ready(function(){
            $('select').each(function(){
                if($(this).is('[readonly]')){
                    $(this).closest('.form-group').find('span.select2-selection__choice__remove').first().remove();
                    $(this).closest('.form-group').find('li.select2-search').first().remove();
                    $(this).closest('.form-group').find('span.select2-selection__clear').first().remove();
                }
            });
        });

        $('.status.la_checkbox').bootstrapSwitch({
            size:'small',
            onText: '审核通过',
            offText: '审核拒绝',
            onColor: 'primary',
            offColor: 'default',
            onSwitchChange: function(event, state) {
                $(event.target).closest('.bootstrap-switch').next().val(state ? '0' : '1').change();
            }
        });
        $('.after-submit').iCheck({checkboxClass:'icheckbox_minimal-blue'}).on('ifChecked', function () {
            $('.after-submit').not(this).iCheck('uncheck');
        });
        $('.container-refresh').off('click').on('click', function() {
            $.admin.reload();
            $.admin.toastr.success('刷新成功 !', '', {positionClass:"toast-top-center"});
        });
    });
</script>


