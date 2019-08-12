<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class WithdrawTimeSetting extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '提款时间设置';

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
        $this->timeRange('allowstart', 'allowend', '提款时间');
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'allowstart' => '08:00:00',
            'allowend' => '18:00:00',
        ];
    }
}
