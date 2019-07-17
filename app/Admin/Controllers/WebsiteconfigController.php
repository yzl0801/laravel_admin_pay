<?php

namespace App\Admin\Controllers;

use App\Models\Websiteconfig;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class WebsiteconfigController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
/*        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());*/
        return $content
            ->header('基本设置')
            ->description(' ')
            ->body($this->form()->edit(1));
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Websiteconfig);

        $grid->websitename('网站名称');
        $grid->domain('网站地址');
        $grid->email('联系邮箱');
        $grid->tel('客服电话');
        $grid->qq('网站客服QQ');
        $grid->directory('网站后台目录');
        $grid->icp('网站备案号');
        $grid->tongji('Tongji');
        $grid->login('Login');
        $grid->payingservice('Payingservice');
        $grid->authorized('Authorized');
        $grid->invitecode('Invitecode');
        $grid->company('Company');
        $grid->serverkey('Serverkey');
        $grid->withdraw('Withdraw');
        $grid->login_warning_num('Login warning num');
        $grid->login_ip('Login ip');
        $grid->is_repeat_order('Is repeat order');
        $grid->google_auth('Google auth');
        $grid->df_api('Df api');
        $grid->register_need_activate('Register need activate');
        $grid->random_mchno('Random mchno');
        $grid->admin_alone_login('Admin alone login');

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
        $show = new Show(Websiteconfig::findOrFail($id));

        $show->websitename('网站名称');
        $show->domain('网站地址');
        $show->email('联系邮箱');
        $show->tel('客服电话');
        $show->qq('网站客服QQ');
        $show->directory('网站后台目录');
        $show->icp('网站备案号');
        $show->tongji('Tongji');
        $show->login('Login');
        $show->payingservice('Payingservice');
        $show->authorized('Authorized');
        $show->invitecode('Invitecode');
        $show->company('Company');
        $show->serverkey('Serverkey');
        $show->withdraw('Withdraw');
        $show->login_warning_num('Login warning num');
        $show->login_ip('Login ip');
        $show->is_repeat_order('Is repeat order');
        $show->google_auth('Google auth');
        $show->df_api('Df api');
        $show->register_need_activate('Register need activate');
        $show->random_mchno('Random mchno');
        $show->admin_alone_login('Admin alone login');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Websiteconfig);

        $form->text('websitename', '网站名称');
        $form->text('domain', '网站地址');
        $form->email('email', '联系邮箱');
        $form->text('tel', '客服电话');
        $form->text('qq', '网站客服QQ');
        $form->text('directory', '网站后台目录');
        $form->text('icp', '网站备案号');
        $form->text('tongji', 'Tongji');
        $form->text('login', 'Login');
        $form->switch('payingservice', 'Payingservice');
        $form->switch('authorized', 'Authorized');
        $form->switch('invitecode', 'Invitecode');
        $form->text('company', 'Company');
        $form->text('serverkey', 'Serverkey');
        $form->switch('withdraw', 'Withdraw');
        $form->switch('login_warning_num', 'Login warning num')->default(3);
        $form->text('login_ip', 'Login ip')->default(' ');
        $form->switch('is_repeat_order', 'Is repeat order')->default(1);
        $form->switch('google_auth', 'Google auth');
        $form->switch('df_api', 'Df api');
        $form->switch('register_need_activate', 'Register need activate');
        $form->switch('random_mchno', 'Random mchno');
        $form->switch('admin_alone_login', 'Admin alone login');

        return $form;
    }
}
