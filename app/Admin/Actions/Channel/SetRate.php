<?php

namespace App\Admin\Actions\Channel;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SetRate extends RowAction
{
    public $name = '费率';

    public function handle(Model $model, Request $request)
    {
        // $model ...
        //dump($request->all());die;
        return $this->response()->success('Success message.')->refresh();
    }


    public function form()
    {
        $this->text('t0defaultrate', __('message.channel.t0defaultrate'));
    }
}