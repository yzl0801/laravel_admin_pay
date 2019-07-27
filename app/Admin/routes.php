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

    $router->resource('websiteconfig', WebsiteconfigController::class);
    $router->resource('email', EmailController::class);
    $router->resource('sms', SmsController::class);

    $router->get('plan', 'SystemController@plan', SystemController::class);
    $router->get('password', 'SystemController@revisePassword', SystemController::class);
    $router->get('mobile', 'SystemController@mobileSetting', SystemController::class);
    $router->get('clear-data', 'SystemController@clearData', SystemController::class);
});
