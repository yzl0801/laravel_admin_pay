<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/26
 * Time: 20:57
 */

namespace App\Admin\Controllers;


use App\Admin\Forms\ClearData;
use App\Admin\Forms\MobileSetting;
use App\Admin\Forms\Password;
use App\Admin\Forms\Plan;
use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;

class SystemController extends Controller
{

    public function plan(Content $content)
    {
        return $content->title("计划任务")->body(new Plan());
    }


    public function revisePassword(Content $content)
    {
        return $content->body(new Password());
    }


    public function mobileSetting(Content $content)
    {
        return $content->body(new MobileSetting());
    }

    public function clearData(Content $content)
    {
        return $content->body(new ClearData());
    }
}