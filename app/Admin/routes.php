<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('users', UserController::class);

    // 系统设置
    $router->resource('websiteconfig', WebsiteconfigController::class);
    $router->resource('email', EmailController::class);
    $router->resource('sms', SmsController::class);
    $router->get('plan', 'SystemController@plan', SystemController::class);
    $router->get('password', 'SystemController@revisePassword', SystemController::class);
    $router->get('mobile', 'SystemController@mobileSetting', SystemController::class);
    $router->get('clear-data', 'SystemController@clearData', SystemController::class);

    // 用户管理
    $router->get('risk-setting', 'SystemController@risk', SystemController::class);

    // 代理管理

    // 订单管理
    $router->resource('orders', OrderController::class);
    $router->resource('moneychanges', FundController::class);
    $router->get('complaint-rule', 'SystemController@complaint', SystemController::class);

    // 提款管理
    $router->get('withdraw-setting', 'SystemController@withdraw', SystemController::class);
    $router->resource('wttklists', WithdrawController::class);

    // 通道管理
    $router->resource('products', ProductController::class);
    $router->resource('channels', ChannelController::class);
    $router->resource('channel-accounts', ChannelAccountController::class);
    $router->resource('pay-for-anothers', DfProductController::class);

    // 财务分析
});
