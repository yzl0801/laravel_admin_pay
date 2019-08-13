<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class RiskSetting extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '风控设置';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        //dump($request->all());

        admin_success('Processed successfully.');

        return back();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->html("注意:不需要风控的事项请默认0");
        $this->number('min_money', __('message.user_riskcontrol_config.min_money'))->setWidth(2);
        $this->number('max_money', __('message.user_riskcontrol_config.max_money'))->setWidth(2);
        $this->number('all_money', __('message.user_riskcontrol_config.all_money'))->setWidth(2);
        $this->timeRange('start_time', 'end_time', '风控时间');
        $this->text('unit_interval', __('message.user_riskcontrol_config.unit_interval'))->setWidth(2);
        $this->radio('time_unit', __('message.user_riskcontrol_config.time_unit'))->options(config('pay.risk_limit_time_type'));
        $this->text('unit_number', __('message.user_riskcontrol_config.unit_number'))->setWidth(2);
        $this->text('unit_all_money', __('message.user_riskcontrol_config.unit_all_money'))->setWidth(2);
        $this->switch('status', __('message.user_riskcontrol_config.status'));
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'min_money' => '0',
            'max_money' => '0',
            'all_money' => 0,
            'start_time' => '08:00:00',
            'end_time' => '18:00:00:',
            'unit_interval' => '0',
            'time_unit' => 'i',
            'unit_number' => '0',
            'unit_all_money' => '0',
            'status' => '',
        ];
    }
}
