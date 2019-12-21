<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">任务信息</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>任务单号</th>
                        <th>父订单号</th>
                        <th>接单时间</th>
                        <th>接单淘宝账号</th>
                        <th>任务状态</th>
                        <th>最后一次操作时间</th>
                    </tr>
                    <tr>
                        <td>{{ $data->work_no }}</td>
                        <td>{{ $data->orders->order_no }}</td>
                        <td>{{ $data->liuc->created_at }}</td>
                        <td>{{ $data->liuc->ali->ali_name }}</td>
                        <td>{{ work_status()[$data->status] }}</td>
                        <td>{{ $data->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
