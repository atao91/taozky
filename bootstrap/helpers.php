<?php
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}
/* 店铺类型 */
function shop_type(){
    return collect(['淘宝','京东','拼多多']);
}

/* 状态 */
function check_status(){
    return collect(['审核通过','待审核','审核拒绝']);
}
/* 设备类型 */
function device_type(){
    return [
        0=>'手机',
        1=>'电脑',
    ];
}
/* ID */
function admin_id(){
    return  Admin::user()->id;
}

/* 入口 */
function order_in(){
    return collect(['搜索 ','分享成交 ','淘口令 ','聚划算 ','淘抢购 ','天天特价 ','加购任务']);
}
/* 排序方式 */
function sort_type(){
    return collect(['销量','综合','综合直通车']);
}
/* 是否使用优惠券 */
function is_coupon(){
    return collect(['不使用优惠券','使用优惠券']);
}
/* 是否需要假聊 */
function is_chat(){
    return collect(['不需要假聊','需要假聊']);
}
/* 是否需要会员截图操作 */
function is_wabei(){
    return collect(['不需要截图 ','需要截图']);
}
/* 是否需要会员截图操作 */
function is_safety(){
    return collect(['平台系统返款 + 买号安全筛查']);
}
/* 放单模式 */
function order_type(){
    return collect(['普通模式','优先模式，优先派送给会员接单']);
}
/* 性别 */
function sex_type(){
    return collect(['不限','男','女']);
}

/* 花呗限制 */
function is_tokio(){
    return collect(['不限制','只允许开通花呗的会员接单']);
}

/* 年龄限制 */
function age_range(){
    return collect(['不限制','15-25岁','26-35岁','36-45岁','46-55岁','55岁以上']);
}

/* 等级限制 */
function grade_range(){
    return collect(['不限制','3心','4心','5心','1钻','2钻','3钻','4钻','5钻','1皇冠','2皇冠','3皇冠','4皇冠','5皇冠']);
}

/* 评价方式 */
function talk_type(){
    return collect(['等待系统默认好评','普通好评','指定内容（限500字以内）','指定图片（限3张图片，500字以内）']);

}

function bill_type(){
    return collect(['本金','佣金','推广','充值','提现','额外']);
}

function bills_type(){
    return collect(['佣金','推广','提现']);
}
function work_status(){
    return collect([
        '放单中',
        '已接单待操作',
        '已完成,待审核',
        '审核通过,待返款',
        '已返款,订单结束',
        '审核拒绝',
        '订单撤销',
    ]);
}
function liuc_status(){
    return collect([
        '完成',
        '提交审核',
        '审核通过,待返款',
        '已返款,订单结束',
        '审核拒绝' ,
        '已撤销'
    ]);
}

function draw_type(){
    return collect(['完成','申请中']);
}
function work_type(){
    return collect(['垫付单','流量单']);
}
