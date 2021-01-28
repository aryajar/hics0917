<?php
/**
 * web端路由
 */
//院感 非院感
Route::group('admin', function () {
    Route::rule('show', 'admin/Admin/index', 'get');
    Route::rule('indexList', 'admin/Admin/indexList', 'post');
    Route::rule('add', 'admin/Admin/create', 'get|post');
    Route::rule('read/:id', 'admin/Admin/read', 'get');
    Route::rule('update', 'admin/Admin/update', 'post');
    Route::rule('del', 'admin/Admin/del', 'post');
    Route::rule('save', 'admin/Admin/save', 'post');
});

// 数据与意见提交路由
Route::group('posts', function () {
    Route::rule('index', 'admin/Posts/index', 'get');
    Route::rule('indexList', 'admin/Posts/indexList', 'post');
    Route::rule('create', 'admin/Posts/create', 'get');
    Route::rule('save', 'admin/Posts/save', 'post');
    Route::rule('update', 'admin/Posts/update', 'post');
    Route::rule('del', 'admin/Posts/del', 'post');
    Route::rule('get/:id', 'admin/Posts/read', 'get');
    Route::rule('detail', 'admin/Posts/detail', 'post');
    Route::rule('system', 'admin/Posts/system', 'post');
    Route::rule('reply', 'admin/Posts/reply', 'post');
});

// 数据概况路由
Route::group('assess', function () {
    Route::rule('index', 'admin/Assess/index', 'get');
    Route::rule('indexList', 'admin/Assess/indexList', 'post');
    Route::rule('create', 'admin/Assess/create', 'get');
    Route::rule('save', 'admin/Assess/save', 'post');
    Route::rule('update', 'admin/Assess/update', 'post');
    Route::rule('del', 'admin/Assess/del', 'post');
    Route::rule('system', 'admin/Assess/system', 'post');
    Route::rule('get/:id', 'admin/Assess/read', 'get');
    Route::rule('detail', 'admin/Assess/detail', 'post');
    Route::rule('scoreDate', 'admin/Assess/scoreDate', 'post');
});


// 基础管理
Route::group('user', function () {
    Route::rule('login', 'index/Index/index', 'get');
    Route::rule('checkLogin', 'index/User/login', 'post');
    Route::rule('checkLoginTwo', 'index/User/loginTwo', 'post');
    Route::rule('show', 'admin/User/index', 'get');
    Route::rule('add', 'admin/User/create', 'get|post');
    Route::rule('read/:id', 'admin/User/read', 'get');
    Route::rule('update', 'admin/User/update', 'post');
    Route::rule('del', 'admin/User/del', 'post');
    Route::rule('loginOut', 'index/Index/loginOut', 'get');
});



// 系统设置路由
Route::group('sys', function () {
    Route::rule('emailAdd', 'admin/System/emailCreate', 'get|post');
});

/*// 权限设置
Route::group('access', function () {
    Route::rule('create', 'admin/Access/createAccess', 'post|get');
    Route::rule('show', 'admin/Access/showAccess', 'get');
    Route::rule('update', 'admin/Access/updateAccess', 'get|post');
    Route::rule('createRole', 'admin/Access/createRole', 'get|post');
    Route::rule('showRole', 'admin/Access/showRole', 'get');
    Route::rule('delRole', 'admin/Access/delRole', 'post');
    Route::rule('updateRole/:id?', 'admin/Access/updateRole', 'get|post');
});*/
