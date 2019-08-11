<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moneychange extends Model
{
    //
    protected $table = 'pay_moneychange';

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;
}
