<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');

    // 系统设置
    $router->resource('websiteconfig', WebsiteconfigController::class);
    $router->resource('email', EmailController::class);
    $router->resource('sms', SmsController::class);
    $router->get('plan', 'SystemController@plan', SystemController::class);
    $router->get('password', 'SystemController@revisePassword', SystemController::class);
    $router->get('mobile', 'SystemController@mobileSetting', SystemController::class);
    $router->get('clear-data', 'SystemController@clearData', SystemController::class);

    $router->resource('users', UserController::class);

    // 订单管理
    $router->resource('orders', OrderController::class);
    $router->resource('moneychanges', FundController::class);
    $router->get('complaint-rule', 'SystemController@complaint', SystemController::class);

    // 通道管理
    $router->resource('products', ProductController::class);
    $router->resource('channels', ChannelController::class);
    $router->resource('channel-accounts', ChannelAccountController::class);
    $router->resource('pay-for-anothers', DfProductController::class);
});
