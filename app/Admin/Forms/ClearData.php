<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class ClearData extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '数据清理';

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
        $this->checkbox('type', '数据类型')->options([
            1 => '入金记录',
            2 => '代付记录',
            3 => '登录记录',
            4 => '冻结记录',
            5 => '资金记录',
        ])->stacked()->canCheckAll();
        //$this->text('range', '数据时间范围');
        $this->dateRange('start_time', 'end_time', '数据时间范围');

    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'type'       => '',
            'start_time'      => '',
            'end_time'      => '',
        ];
    }
}
