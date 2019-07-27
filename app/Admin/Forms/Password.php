<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class Password extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '修改密码';

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
        $this->text('old_password', '原密码')->rules('required');
        $this->text('new_password', '新密码')->rules('required');
        $this->text('confirm_password', '重复新密码')->rules('required');
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'old_password'       => '',
            'new_password'       => '',
            'confirm_password'      => '',
        ];
    }
}
