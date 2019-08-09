<?php

namespace App\Admin\Controllers;

use App\Models\ChannelAccount;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class ChannelAccountController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '子账户';

    public function index(Content $content)
    {
        $request = request();
        return $content
            ->title($this->title())
            ->description($this->description['index'] ?? trans('admin.list'))
            ->body($this->grid($request->input('cid')));
    }


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid($cid)
    {
        $grid = new Grid(new ChannelAccount);
        $grid->model()->where('channel_id', $cid);

        $grid->column('id', __('message.channel_account.Id'));
        $grid->column('title', __('message.channel_account.Title'));
        $grid->column('status', __('message.channel_account.Status'))->switch();
        $grid->column('weight', __('message.channel_account.Weight'));
        $grid->column('custom_rate', __('message.channel_account.Custom rate'))->using(config('pay.rate_type'));

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
        $show = new Show(ChannelAccount::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('channel_id', __('Channel id'));
        $show->field('mch_id', __('Mch id'));
        $show->field('signkey', __('Signkey'));
        $show->field('appid', __('Appid'));
        $show->field('appsecret', __('Appsecret'));
        $show->field('defaultrate', __('Defaultrate'));
        $show->field('fengding', __('Fengding'));
        $show->field('rate', __('Rate'));
        $show->field('updatetime', __('Updatetime'));
        $show->field('status', __('Status'));
        $show->field('title', __('Title'));
        $show->field('weight', __('Weight'));
        $show->field('custom_rate', __('Custom rate'));
        $show->field('start_time', __('Start time'));
        $show->field('end_time', __('End time'));
        $show->field('last_paying_time', __('Last paying time'));
        $show->field('paying_money', __('Paying money'));
        $show->field('all_money', __('All money'));
        $show->field('max_money', __('Max money'));
        $show->field('min_money', __('Min money'));
        $show->field('offline_status', __('Offline status'));
        $show->field('control_status', __('Control status'));
        $show->field('is_defined', __('Is defined'));
        $show->field('unit_frist_paying_time', __('Unit frist paying time'));
        $show->field('unit_paying_number', __('Unit paying number'));
        $show->field('unit_paying_amount', __('Unit paying amount'));
        $show->field('unit_interval', __('Unit interval'));
        $show->field('time_unit', __('Time unit'));
        $show->field('unit_number', __('Unit number'));
        $show->field('unit_all_money', __('Unit all money'));
        $show->field('t0defaultrate', __('T0defaultrate'));
        $show->field('t0fengding', __('T0fengding'));
        $show->field('t0rate', __('T0rate'));
        $show->field('unlockdomain', __('Unlockdomain'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ChannelAccount);

        $form->text('title', __('message.channel_account.Title'));
        $form->text('mch_id', __('message.channel_account.Mch id'));
        $form->text('signkey', __('message.channel_account.Signkey'));
        $form->text('appid', __('message.channel_account.Appid'));
        $form->text('appsecret', __('message.channel_account.Appsecret'));
        $form->switch('weight', __('message.channel_account.Weight'));
        $form->switch('custom_rate', __('message.channel_account.Custom rate'));
        $form->switch('is_defined', __('message.channel_account.Is defined'));
        $form->text('unlockdomain', __('message.channel_account.Unlockdomain'));
        $form->switch('status', __('message.channel_account.Status'));


        return $form;
    }
}
