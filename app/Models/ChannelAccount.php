<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChannelAccount extends Model
{
    //
    protected $table = 'pay_channel_account';

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;
}
