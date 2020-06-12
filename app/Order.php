<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public const STATUS = [
        0 => 'Новый',
        10 => 'Подтвержден',
        20 => 'Завершен',
    ];

    public function partner()
    {
        return $this->belongsTo('App\Partner', 'partner_id');
    }

    public function orderProduct()
    {
        return $this->hasMany('App\OrderProduct', 'order_id');
    }
}
