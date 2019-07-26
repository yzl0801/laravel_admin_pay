<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class Plan extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '计划任务';

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
        $this->text('num')->rules('required');
        $this->text('allowstart')->rules('required');
        $this->text('allowend')->rules('required');
        // $this->email('email')->rules('email');
        $this->datetime('created_at');
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'num'       => '补发次数',
            'allowstart'      => '开始时间',
            'allowend' => '结束时间',
            'created_at' => now(),
        ];
    }
}
