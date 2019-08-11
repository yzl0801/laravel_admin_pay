<?php

namespace App\Admin\Controllers;

use App\Models\Moneychange;
use Encore\Admin\Actions\Action;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FundController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '流水记录';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Moneychange);

        $grid->column('transid', __('message.moneychange.Transid'));
        $grid->column('userid', __('message.moneychange.Userid'));
        $grid->column('lx', __('message.moneychange.Lx'));
        $grid->column('tcuserid', __('message.moneychange.Tcuserid'));
        $grid->column('tcdengji', __('message.moneychange.Tcdengji'));
        $grid->column('ymoney', __('message.moneychange.Ymoney'));
        $grid->column('money', __('message.moneychange.Money'))->color('firebrick');
        $grid->column('gmoney', __('message.moneychange.Gmoney'));
        $grid->column('datetime', __('message.moneychange.Datetime'));
        $grid->column('tongdao', __('message.moneychange.Tongdao'));
        $grid->column('contentstr', __('message.moneychange.Contentstr'));

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
        $show = new Show(Moneychange::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('userid', __('Userid'));
        $show->field('ymoney', __('Ymoney'));
        $show->field('money', __('Money'));
        $show->field('gmoney', __('Gmoney'));
        $show->field('datetime', __('Datetime'));
        $show->field('transid', __('Transid'));
        $show->field('tongdao', __('Tongdao'));
        $show->field('lx', __('Lx'));
        $show->field('tcuserid', __('Tcuserid'));
        $show->field('tcdengji', __('Tcdengji'));
        $show->field('orderid', __('Orderid'));
        $show->field('contentstr', __('Contentstr'));
        $show->field('t', __('T'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Moneychange);

        $form->number('userid', __('Userid'));
        $form->decimal('ymoney', __('Ymoney'))->default(0.0000);
        $form->decimal('money', __('Money'))->default(0.0000);
        $form->decimal('gmoney', __('Gmoney'))->default(0.0000);
        $form->datetime('datetime', __('Datetime'))->default(date('Y-m-d H:i:s'));
        $form->text('transid', __('Transid'));
        $form->number('tongdao', __('Tongdao'));
        $form->switch('lx', __('Lx'))->default(1);
        $form->number('tcuserid', __('Tcuserid'));
        $form->number('tcdengji', __('Tcdengji'));
        $form->text('orderid', __('Orderid'));
        $form->text('contentstr', __('Contentstr'));
        $form->number('t', __('T'));

        return $form;
    }
}
