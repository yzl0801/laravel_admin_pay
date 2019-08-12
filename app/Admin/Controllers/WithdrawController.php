<?php

namespace App\Admin\Controllers;

use App\Models\Wttklist;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class WithdrawController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '代付结算';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Wttklist);

        $grid->column('t', __('message.wttklist.T'));
        $grid->column('orderid', __('message.wttklist.Orderid'));
        $grid->column('userid', __('message.wttklist.Userid'));
        $grid->column('channel_mch_id', __('message.wttklist.Channel mch id'));
        $grid->column('tkmoney', __('message.wttklist.Tkmoney'));
        $grid->column('sxfmoney', __('message.wttklist.Sxfmoney'));
        $grid->column('money', __('message.wttklist.Money'));
        $grid->column('bankname', __('message.wttklist.Bankname'));
        $grid->column('bankzhiname', __('message.wttklist.Bankzhiname'));
        $grid->column('banknumber', __('message.wttklist.Banknumber'));
        $grid->column('bankfullname', __('message.wttklist.Bankfullname'));
        $grid->column('sheng', __('message.wttklist.Sheng'));
        $grid->column('shi', __('message.wttklist.Shi'));

        $grid->disableCreateButton();
        $grid->disableActions();

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
        $show = new Show(Wttklist::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('userid', __('Userid'));
        $show->field('bankname', __('Bankname'));
        $show->field('bankzhiname', __('Bankzhiname'));
        $show->field('banknumber', __('Banknumber'));
        $show->field('bankfullname', __('Bankfullname'));
        $show->field('sheng', __('Sheng'));
        $show->field('shi', __('Shi'));
        $show->field('sqdatetime', __('Sqdatetime'));
        $show->field('cldatetime', __('Cldatetime'));
        $show->field('status', __('Status'));
        $show->field('tkmoney', __('Tkmoney'));
        $show->field('sxfmoney', __('Sxfmoney'));
        $show->field('money', __('Money'));
        $show->field('t', __('T'));
        $show->field('payapiid', __('Payapiid'));
        $show->field('memo', __('Memo'));
        $show->field('additional', __('Additional'));
        $show->field('code', __('Code'));
        $show->field('df_id', __('Df id'));
        $show->field('df_name', __('Df name'));
        $show->field('orderid', __('Orderid'));
        $show->field('cost', __('Cost'));
        $show->field('cost_rate', __('Cost rate'));
        $show->field('rate_type', __('Rate type'));
        $show->field('extends', __('Extends'));
        $show->field('out_trade_no', __('Out trade no'));
        $show->field('df_api_id', __('Df api id'));
        $show->field('auto_submit_try', __('Auto submit try'));
        $show->field('is_auto', __('Is auto'));
        $show->field('last_submit_time', __('Last submit time'));
        $show->field('df_lock', __('Df lock'));
        $show->field('auto_query_num', __('Auto query num'));
        $show->field('channel_mch_id', __('Channel mch id'));
        $show->field('df_charge_type', __('Df charge type'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Wttklist);

        $form->number('userid', __('Userid'));
        $form->text('bankname', __('Bankname'));
        $form->text('bankzhiname', __('Bankzhiname'));
        $form->text('banknumber', __('Banknumber'));
        $form->text('bankfullname', __('Bankfullname'));
        $form->text('sheng', __('Sheng'));
        $form->text('shi', __('Shi'));
        $form->datetime('sqdatetime', __('Sqdatetime'))->default(date('Y-m-d H:i:s'));
        $form->datetime('cldatetime', __('Cldatetime'))->default(date('Y-m-d H:i:s'));
        $form->switch('status', __('Status'));
        $form->decimal('tkmoney', __('Tkmoney'))->default(0.0000);
        $form->decimal('sxfmoney', __('Sxfmoney'))->default(0.0000);
        $form->decimal('money', __('Money'))->default(0.0000);
        $form->number('t', __('T'))->default(1);
        $form->number('payapiid', __('Payapiid'));
        $form->textarea('memo', __('Memo'));
        $form->text('additional', __('Additional'))->default(' ');
        $form->text('code', __('Code'))->default(' ');
        $form->number('df_id', __('Df id'));
        $form->text('df_name', __('Df name'))->default(' ');
        $form->text('orderid', __('Orderid'))->default(' ');
        $form->decimal('cost', __('Cost'))->default(0.00);
        $form->decimal('cost_rate', __('Cost rate'))->default(0.0000);
        $form->switch('rate_type', __('Rate type'));
        $form->textarea('extends', __('Extends'));
        $form->text('out_trade_no', __('Out trade no'));
        $form->number('df_api_id', __('Df api id'));
        $form->number('auto_submit_try', __('Auto submit try'));
        $form->switch('is_auto', __('Is auto'));
        $form->number('last_submit_time', __('Last submit time'));
        $form->switch('df_lock', __('Df lock'));
        $form->number('auto_query_num', __('Auto query num'));
        $form->text('channel_mch_id', __('Channel mch id'));
        $form->switch('df_charge_type', __('Df charge type'));

        return $form;
    }
}
