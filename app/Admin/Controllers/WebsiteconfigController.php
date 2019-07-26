<?php

namespace App\Admin\Controllers;

use App\Models\Websiteconfig;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;

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
            ->body($this->form()->setAction('websiteconfig/1')->edit(1));
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
        $show->tongji('网站统计代码');
        $show->login('网站登录地址');
        $show->payingservice('商户代付');
        $show->authorized('商户认证');
        $show->invitecode('邀请码注册');
        $show->company('公司名称');
        $show->serverkey('授权KEY');
        $show->withdraw('提现通知');
        $show->login_warning_num('商户前台登录错误次数');
        $show->login_ip('IP登录白名单');
        $show->is_repeat_order('允许重复订单');
        $show->google_auth('谷歌令牌登录验证');
        $show->df_api('代付API');
        $show->register_need_activate('用户注册是否需要激活');
        $show->random_mchno('使用随机商户号');
        $show->admin_alone_login('管理员只允许同时一处登录');

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
        $form->text('tongji', '网站统计代码');
        $form->text('login', '网站登录地址');
        $form->switch('payingservice', '商户代付');
        $form->switch('authorized', '商户认证');
        $form->switch('invitecode', '邀请码注册');
        $form->text('company', '公司名称');
        $form->text('serverkey', '授权KEY');
        $form->switch('withdraw', '提现通知');
        $form->switch('login_warning_num', '商户前台登录错误次数')->default(3);
        $form->text('login_ip', 'IP登录白名单')->default(' ');
        $form->switch('is_repeat_order', '允许重复订单')->default(1);
        $form->switch('google_auth', '谷歌令牌登录验证');
        $form->switch('df_api', '代付API');
        $form->switch('register_need_activate', '用户注册是否需要激活');
        $form->switch('random_mchno', '使用随机商户号');
        $form->switch('admin_alone_login', '管理员只允许同时一处登录');
        // 自定义工具
        $form->tools(function (Form\Tools $tools) {
            // 去掉`列表`按钮
            $tools->disableList();
            // 去掉`删除`按钮
            $tools->disableDelete();
            // 去掉`查看`按钮
            $tools->disableView();
            // 添加一个按钮, 参数可以是字符串, 或者实现了Renderable或Htmlable接口的对象实例
            //$tools->add('<a class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;delete</a>');
        });

        // 表单脚部
        $form->footer(function ($footer) {
            // 去掉`重置`按钮
            $footer->disableReset();
            // 去掉`提交`按钮
            //$footer->disableSubmit();
            // 去掉`查看`checkbox
            $footer->disableViewCheck();
            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();
            // 去掉`继续创建`checkbox
            $footer->disableCreatingCheck();
        });

        //保存后回调
        $form->saved(function (Form $form) {
            //...
            return redirect('/admin/websiteconfig');
        });

        return $form;
    }

}
