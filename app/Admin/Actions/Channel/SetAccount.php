<?php

namespace App\Admin\Actions\Channel;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class SetAccount extends RowAction
{
    public $name = '子账户';

    public function handle(Model $model)
    {
        // $model ...

        return $this->response()->success('Success message.')->refresh();
    }


    /**
     * @return string
     */
    public function href()
    {
        //return "channel-accounts";
        return "channel-accounts?cid=" . $this->getKey();
    }
}