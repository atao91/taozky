<?php
Auth::routes();
Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/', 'PagesController@root')->name('root');
    Route::get('goods', 'PagesController@goods')->name('goods');  //详情
    Route::post('goods_store', 'PagesController@goods_store')->name('goods_store');  //接单
    Route::get('index', 'CenterController@index')->name('center');  //个人中心
    Route::get('setting', 'CenterController@setting')->name('setting');  //会员设置
    Route::post('centerStore', 'CenterController@centerStore')->name('centerStore');  //会员设置
    Route::get('share', 'CenterController@share')->name('share');  //会员设置
    Route::get('bindTb', 'CenterController@bindTb')->name('bind');  //会员设置
    Route::get('bindList', 'CenterController@bindList')->name('bindList');  //会员设置
    Route::post('bindStore', 'CenterController@bindStore')->name('bindStore');  //绑定提交
    Route::get('bill', 'CenterController@bill')->name('bill');  //账单
    Route::get('refund', 'CenterController@refund')->name('refund');                        //提现
    Route::get('refund_list', 'CenterController@refund_list')->name('refund_list');                        //提现
    Route::post('refund_apply', 'CenterController@refund_apply')->name('refund_apply');     //提现申请

    Route::get('work', 'WorkController@index')->name('work');  //绑定提交
    Route::get('goods_detail', 'WorkController@goods_detail')->name('detail');  //绑定提交
    Route::post('work_store', 'WorkController@work_store')->name('up_store');   //做单信息提交
    Route::post('check_goods', 'WorkController@check_goods')->name('check_goods');  //核对商品
    Route::post('uploader', 'UploadimagesController@uploader')->name('uploader');  //绑定提交   图片提交

    Route::get('contacts', 'CenterController@contacts')->name('contacts');  //联系客服
    Route::get('changePwd', 'CenterController@changePwd')->name('changePwd');  //会员设置
    Route::post('pwdStore', 'CenterController@pwdStore')->name('pwdStore');  //会员设置

});
Route::get('register', 'RegisterController@register')->name('register');  //会员设置
Route::get('reg', 'RegisterController@reg')->name('reg');  //会员设置
Route::post('login', 'Auth\LoginController@login')->name('login');

Route::post('uploader_img', 'UploadimagesController@uploader_img')->name('uploader_img');  //绑定提交   图片提交
Route::post('register/sendcode', 'RegisterController@sendUserCode')->name('register.sendcode');
Route::post('register/regs', 'RegisterController@zhuce')->name('register.regs');
