<?php

namespace App\Admin\Controllers;

use App\Models\PayForAnother;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DfProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '代付渠道';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PayForAnother);

        $grid->column('id', __('message.pay_for_another.Id'));
        $grid->column('title', __('message.pay_for_another.Title'));
        $grid->column('code', __('message.pay_for_another.Code'));
        $grid->column('updatetime', __('message.pay_for_another.Updatetime'));
        $grid->column('status', __('message.pay_for_another.Status'))->switch();
        $grid->column('is_default', __('message.pay_for_another.Is default'))->switch();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(PayForAnother::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('code', __('Code'));
        $show->field('title', __('Title'));
        $show->field('mch_id', __('Mch id'));
        $show->field('appid', __('Appid'));
        $show->field('appsecret', __('Appsecret'));
        $show->field('signkey', __('Signkey'));
        $show->field('public_key', __('Public key'));
        $show->field('private_key', __('Private key'));
        $show->field('exec_gateway', __('Exec gateway'));
        $show->field('query_gateway', __('Query gateway'));
        $show->field('serverreturn', __('Serverreturn'));
        $show->field('unlockdomain', __('Unlockdomain'));
        $show->field('updatetime', __('Updatetime'));
        $show->field('status', __('Status'));
        $show->field('is_default', __('Is default'));
        $show->field('cost_rate', __('Cost rate'));
        $show->field('rate_type', __('Rate type'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PayForAnother);

        $form->text('title', '中文名称')->setWidth(2);
        $form->text('code', '控制器名称')->setWidth(2);
        $form->text('mch_id', __('message.pay_for_another.Mch id'));
        $form->text('signkey', __('message.pay_for_another.Signkey'));
        $form->text('appid', __('message.pay_for_another.Appid'));
        $form->text('appsecret', __('message.pay_for_another.Appsecret'));
        $form->textarea('public_key', __('message.pay_for_another.Public key'));
        $form->textarea('private_key', __('message.pay_for_another.Private key'));
        $form->text('exec_gateway', __('message.pay_for_another.Exec gateway'));
        $form->text('query_gateway', __('message.pay_for_another.Query gateway'));
        $form->text('serverreturn', __('message.pay_for_another.Serverreturn'));
        $form->text('unlockdomain', __('message.pay_for_another.Unlockdomain'));
        $form->number('cost_rate', __('message.pay_for_another.Cost rate'))->default(0.0000);
        $form->radio('rate_type', __('message.pay_for_another.Rate type'))->options(config('pay.df_rate_type'))->default(0);
        $form->switch('is_default', '是否默认');
        $form->switch('status', __('message.pay_for_another.Status'));

        return $form;
    }
}
