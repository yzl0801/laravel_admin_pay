<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/26
 * Time: 20:57
 */

namespace App\Admin\Controllers;

use App\Admin\Forms;
use App\Admin\Forms\ClearData;
use App\Admin\Forms\ComplaintRule;
use App\Admin\Forms\MobileSetting;
use App\Admin\Forms\Password;
use App\Admin\Forms\Plan;
use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Tab;

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


    public function complaint(Content $content)
    {
        return $content->body(new ComplaintRule());
    }


    public function withdraw(Content $content)
    {
        $forms = [
            'basic'    => Forms\WithdrawSetting::class,
            'time'    => Forms\WithdrawTimeSetting::class,
            'df'    => Forms\WithdrawDfSetting::class,
        ];

        return $content
            ->title('提款管理')
            ->body(Tab::forms($forms));
    }


    public function risk(Content $content)
    {
        return $content->body(new Forms\RiskSetting());
    }
}