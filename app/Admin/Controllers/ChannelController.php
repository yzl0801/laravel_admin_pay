<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Channel\SetAccount;
use App\Admin\Actions\Channel\SetRate;
use App\Admin\Actions\Channel\SetRisk;
use App\Models\Channel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ChannelController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '入金渠道';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Channel);

        $grid->column('id', __('message.channel.id'));
        $grid->column('title', __('message.channel.title'));
        $grid->column('code', __('message.channel.code'));
        $grid->column('status', __('message.channel.status'))->switch();
        $grid->column('paytype', __('message.channel.paytype'))->using(config('pay.type'));
        $grid->column('defaultrate', '费率下限');
        $grid->column('fengding', '费率上限');

        $grid->disableFilter();
        $grid->disablePagination();

        $grid->actions(function ($actions) {
            $actions->add(new SetAccount());
            $actions->add(new SetRate());
            $actions->add(new SetRisk());
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
        $show = new Show(Channel::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('code', __('Code'));
        $show->field('title', __('Title'));
        $show->field('mch_id', __('Mch id'));
        $show->field('signkey', __('Signkey'));
        $show->field('appid', __('Appid'));
        $show->field('appsecret', __('Appsecret'));
        $show->field('gateway', __('Gateway'));
        $show->field('pagereturn', __('Pagereturn'));
        $show->field('serverreturn', __('Serverreturn'));
        $show->field('defaultrate', __('Defaultrate'));
        $show->field('fengding', __('Fengding'));
        $show->field('rate', __('Rate'));
        $show->field('updatetime', __('Updatetime'));
        $show->field('unlockdomain', __('Unlockdomain'));
        $show->field('status', __('Status'));
        $show->field('paytype', __('Paytype'));
        $show->field('start_time', __('Start time'));
        $show->field('end_time', __('End time'));
        $show->field('paying_money', __('Paying money'));
        $show->field('all_money', __('All money'));
        $show->field('last_paying_time', __('Last paying time'));
        $show->field('min_money', __('Min money'));
        $show->field('max_money', __('Max money'));
        $show->field('control_status', __('Control status'));
        $show->field('offline_status', __('Offline status'));
        $show->field('t0defaultrate', __('T0defaultrate'));
        $show->field('t0fengding', __('T0fengding'));
        $show->field('t0rate', __('T0rate'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Channel);

        $form->text('title', __('message.channel.title'));
        $form->text('code', __('message.channel.code'));
        $form->text('gateway', __('message.channel.gateway'));
        $form->text('pagereturn', __('message.channel.pagereturn'));
        $form->text('serverreturn', __('message.channel.serverreturn'));

        // T+0

        $form->divider('T0费率');
        $form->decimal('t0defaultrate', __('message.channel.t0defaultrate'))->default(0.0000);
        $form->decimal('t0fengding', __('message.channel.t0fengding'))->default(0.0000);
        $form->decimal('t0rate', __('message.channel.t0rate'))->default(0.0000);
        //T+1
        $form->divider('T1费率');
        $form->decimal('defaultrate', __('message.channel.defaultrate'))->default(0.0000);
        $form->decimal('fengding', __('message.channel.fengding'))->default(0.0000);
        $form->decimal('rate', __('message.channel.rate'))->default(0.0000);

        $form->text('unlockdomain', __('message.channel.unlockdomain'));
        $form->select('paytype', __('message.channel.paytype'))->options(config('pay.type'))->setWidth(2);
        $form->switch('status', __('message.channel.status'));

        return $form;
    }
}
