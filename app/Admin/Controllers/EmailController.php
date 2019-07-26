<?php

namespace App\Admin\Controllers;

use App\Models\Email;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Facades\App;

class EmailController extends Controller
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
        return $content
            ->header('邮件设置')
            ->description(' ')
            ->body($this->form()->setAction('email/1')->edit(1));
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
        $grid = new Grid(new Email);

        $grid->id('Id');
        $grid->smtp_host('Smtp host');
        $grid->smtp_port('Smtp port');
        $grid->smtp_user('Smtp user');
        $grid->smtp_pass('Smtp pass');
        $grid->smtp_email('Smtp email');
        $grid->smtp_name('Smtp name');

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
        $show = new Show(Email::findOrFail($id));

        $show->id('Id');
        $show->smtp_host('Smtp host');
        $show->smtp_port('Smtp port');
        $show->smtp_user('Smtp user');
        $show->smtp_pass('Smtp pass');
        $show->smtp_email('Smtp email');
        $show->smtp_name('Smtp name');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Email);

        $form->text('smtp_host', __('message.smtp_host'));
        $form->text('smtp_port',  __('message.smtp_port'));
        $form->text('smtp_user',  __('message.smtp_user'));
        $form->text('smtp_pass', __('message.smtp_pass'));
        $form->text('smtp_email',  __('message.smtp_email'));
        $form->text('smtp_name',  __('message.smtp_name'));

        //保存后回调
        $form->saved(function (Form $form) {
            //...
            return redirect('/admin/email');
        });

        return $form;
    }
}
