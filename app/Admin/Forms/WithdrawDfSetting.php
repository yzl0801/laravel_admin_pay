<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class WithdrawDfSetting extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '自动代付设置';

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
        $this->switch('auto_df_switch', __('message.tikuanconfig.auto_df_switch'));
        $this->timeRange('auto_df_stime', 'auto_df_etime', '开启时间');
        $this->text('auto_df_maxmoney', __('message.tikuanconfig.auto_df_maxmoney'))->setWidth(2);
        $this->text('auto_df_max_count', __('message.tikuanconfig.auto_df_max_count'))->setWidth(2);
        $this->text('auto_df_max_sum', __('message.tikuanconfig.auto_df_max_sum'))->setWidth(2);

    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'auto_df_switch' => '0',
            'auto_df_stime' => '',
            'auto_df_etime' => '',
            'auto_df_maxmoney' => '0',
            'auto_df_max_count' => '0',
            'auto_df_max_sum' => '0',
        ];
    }
}
