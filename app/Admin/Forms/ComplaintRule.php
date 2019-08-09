<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class ComplaintRule extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '投诉保证金设置';

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
        $this->number('ratio', '保证金比例（%）')->max(100)->setWidth(2);
        $this->number('period', '冻结周期（小时）')->setWidth(2);
        $this->switch('status', '规则状态');

        $this->disableReset();
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'ratio'       => '0',
            'period'      => '0',
            'status' => '0',
        ];
    }
}
