<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'client_email',
        'partner_id',
        'status'
    ];

    public const NEW_ORDER = 0;
    public const CONFIRMED =10;
    public const COMPLETED = 20;

    public const STATUS = [
        self::NEW_ORDER => 'Новый',
        self::CONFIRMED => 'Подтвержден',
        self::COMPLETED => 'Завершен',
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
