<?php

namespace App\Admin\Actions\Channel;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class SetRisk extends RowAction
{
    public $name = '风控';

    public function handle(Model $model)
    {
        // $model ...

        return $this->response()->success('Success message.')->refresh();
    }

}