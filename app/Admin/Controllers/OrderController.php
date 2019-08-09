<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '订单';

    public function index(Content $content)
    {
        $request = request();
        return $content
            ->title($this->title())
            ->description($this->description['index'] ?? trans('admin.list'))
            ->body($this->grid($request->input('status')));
    }


    /**
     * Make a grid builder.
     *
     * @param string $status
     * @return Grid
     */
    protected function grid($status)
    {
        $grid = new Grid(new Order);
        switch($status) {
            case "0" :
            case "1" :
                $grid->model()->where('pay_status', $status);
                break;
            case "3" :
                $grid->model()->whereIn('pay_status', [1, 2]);
                break;
            default:
                break;
        }

        $grid->column('ddlx', __('message.order.Ddlx'));
        $grid->column('pay_orderid', __('message.order.Pay orderid'));
        $grid->column('out_trade_id', __('message.order.Out trade id'));
        $grid->column('pay_memberid', __('message.order.Pay memberid'));
        $grid->column('pay_amount', __('message.order.Pay amount'));
        $grid->column('pay_poundage', __('message.order.Pay poundage'));
        $grid->column('pay_actualamount', __('message.order.Pay actualamount'));
        $grid->column('pay_applydate', __('message.order.Pay applydate'));
        $grid->column('pay_successdate', __('message.order.Pay successdate'));
        $grid->column('pay_zh_tongdao', __('message.order.Pay zh tongdao'));
        $grid->column('memberid', __('message.order.Memberid'));

        $grid->disableCreateButton();
        $grid->footer(function ($query) {

            // 查询出已支付状态的订单总金额
            //$data = $query->where('status', 2)->sum('amount');

            //return "<div style='padding: 10px;'>总收入 ： 100</div>";
        });
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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('pay_memberid', __('Pay memberid'));
        $show->field('pay_orderid', __('Pay orderid'));
        $show->field('pay_amount', __('Pay amount'));
        $show->field('pay_poundage', __('Pay poundage'));
        $show->field('pay_actualamount', __('Pay actualamount'));
        $show->field('pay_applydate', __('Pay applydate'));
        $show->field('pay_successdate', __('Pay successdate'));
        $show->field('pay_bankcode', __('Pay bankcode'));
        $show->field('pay_notifyurl', __('Pay notifyurl'));
        $show->field('pay_callbackurl', __('Pay callbackurl'));
        $show->field('pay_bankname', __('Pay bankname'));
        $show->field('pay_status', __('Pay status'));
        $show->field('pay_productname', __('Pay productname'));
        $show->field('pay_tongdao', __('Pay tongdao'));
        $show->field('pay_zh_tongdao', __('Pay zh tongdao'));
        $show->field('pay_tjurl', __('Pay tjurl'));
        $show->field('out_trade_id', __('Out trade id'));
        $show->field('num', __('Num'));
        $show->field('memberid', __('Memberid'));
        $show->field('key', __('Key'));
        $show->field('account', __('Account'));
        $show->field('isdel', __('Isdel'));
        $show->field('ddlx', __('Ddlx'));
        $show->field('pay_ytongdao', __('Pay ytongdao'));
        $show->field('pay_yzh_tongdao', __('Pay yzh tongdao'));
        $show->field('xx', __('Xx'));
        $show->field('attach', __('Attach'));
        $show->field('pay_channel_account', __('Pay channel account'));
        $show->field('cost', __('Cost'));
        $show->field('cost_rate', __('Cost rate'));
        $show->field('account_id', __('Account id'));
        $show->field('channel_id', __('Channel id'));
        $show->field('t', __('T'));
        $show->field('last_reissue_time', __('Last reissue time'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order);

        $form->text('pay_memberid', __('Pay memberid'));
        $form->text('pay_orderid', __('Pay orderid'));
        $form->decimal('pay_amount', __('Pay amount'))->default(0.0000);
        $form->decimal('pay_poundage', __('Pay poundage'))->default(0.0000);
        $form->decimal('pay_actualamount', __('Pay actualamount'))->default(0.0000);
        $form->number('pay_applydate', __('Pay applydate'));
        $form->number('pay_successdate', __('Pay successdate'));
        $form->text('pay_bankcode', __('Pay bankcode'));
        $form->text('pay_notifyurl', __('Pay notifyurl'));
        $form->text('pay_callbackurl', __('Pay callbackurl'));
        $form->text('pay_bankname', __('Pay bankname'));
        $form->switch('pay_status', __('Pay status'));
        $form->text('pay_productname', __('Pay productname'));
        $form->text('pay_tongdao', __('Pay tongdao'));
        $form->text('pay_zh_tongdao', __('Pay zh tongdao'));
        $form->text('pay_tjurl', __('Pay tjurl'));
        $form->text('out_trade_id', __('Out trade id'));
        $form->switch('num', __('Num'));
        $form->text('memberid', __('Memberid'));
        $form->text('key', __('Key'));
        $form->text('account', __('Account'));
        $form->switch('isdel', __('Isdel'));
        $form->number('ddlx', __('Ddlx'));
        $form->text('pay_ytongdao', __('Pay ytongdao'));
        $form->text('pay_yzh_tongdao', __('Pay yzh tongdao'));
        $form->number('xx', __('Xx'));
        $form->textarea('attach', __('Attach'));
        $form->text('pay_channel_account', __('Pay channel account'));
        $form->decimal('cost', __('Cost'))->default(0.0000);
        $form->decimal('cost_rate', __('Cost rate'))->default(0.0000);
        $form->number('account_id', __('Account id'));
        $form->number('channel_id', __('Channel id'));
        $form->switch('t', __('T'))->default(1);
        $form->number('last_reissue_time', __('Last reissue time'))->default(11);

        return $form;
    }
}
