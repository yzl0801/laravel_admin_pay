<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class WithdrawSetting extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '提款设置';

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
        $this->text('tkzxmoney', __('message.tikuanconfig.tkzxmoney'))->setWidth(2);
        $this->text('tkzdmoney', __('message.tikuanconfig.tkzdmoney'))->setWidth(2);
        $this->text('dayzdmoney', __('message.tikuanconfig.dayzdmoney'))->setWidth(2);
        $this->text('dayzdnum', __('message.tikuanconfig.dayzdnum'))->setWidth(2);
        $this->text('daycardzdmoney', __('message.tikuanconfig.daycardzdmoney'))->setWidth(2);
        $this->radio('t1zt', __('message.tikuanconfig.t1zt'))->options(config('pay.tk_js_type'))->stacked();
        $this->radio('tktype', __('message.tikuanconfig.tktype'))->options(config('pay.tk_sfx_type'));
        $this->text('sxfrate', __('message.tikuanconfig.sxfrate'))->setWidth(2);
        $this->text('sxffixed', __('message.tikuanconfig.sxffixed'))->setWidth(2);
        $this->radio('tk_charge_type', __('message.tikuanconfig.tk_charge_type'))->options(config('pay.tk_sfx_charge_type'));
        $this->switch('tkzt', __('message.tikuanconfig.tkzt'));
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'tkzxmoney' => '',
            'tkzdmoney' => '',
            'dayzdmoney' => '',
            'dayzdnum' => '',
            'daycardzdmoney' => '',
            't1zt' => '0',
            'tktype' => '1',
            'sxfrate' => '',
            'sxffixed' => '',
            'tk_charge_type' => '0',
            'tkzt' => '0',
        ];
    }
}
