<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '支付产品';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product);

        $grid->column('id', __('Id'));
        $grid->column('name', __('message.product.name'));
        $grid->column('code', __('message.product.code'));
        $grid->column('paytype', __('message.product.paytype'))->using(config('pay.type'));
        $grid->column('polling', __('message.product.polling'))->using(config('pay.polling_type'));
        $grid->column('status', __('message.product.status'))->switch();
        $grid->column('isdisplay', __('message.product.isdisplay'))->switch();

        $grid->disableFilter();
        $grid->disablePagination();

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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('message.product.id'));
        $show->field('name', __('message.product.name'));
        $show->field('code', __('message.product.code'));
        $show->field('polling', __('message.product.polling'));
        $show->field('paytype', __('message.product.paytype'));
        $show->field('status', __('message.product.status'));
        $show->field('isdisplay', __('message.product.isdisplay'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product);

        $form->text('name', __('message.product.name'));
        $form->text('code', __('message.product.code'));
        $form->radio('polling', __('message.product.polling'))->options(config('pay.polling_type'))->default(0);
        $form->select('paytype', __('message.product.paytype'))->options(config('pay.type'))->setWidth(3);
        $form->switch('status', __('message.product.status'));
        $form->switch('isdisplay', __('message.product.isdisplay'));
        $form->number('channel', __('message.product.channel'));
        $form->textarea('weight', __('message.product.weight'));

        return $form;
    }
}
