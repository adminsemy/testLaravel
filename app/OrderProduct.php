<?php

namespace App;

use DB;
use DomainException;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products';

    protected $fillable = [
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public static function updateQuantity($orderId, $arrayProducts)
    {
        try {
            DB::beginTransaction();
            foreach ($arrayProducts as $productId => $quantity) {
                OrderProduct::where(['order_id' => $orderId, 'product_id' => $productId])->update(['quantity' => $quantity]);
            }
            DB::commit();
        } catch(DomainException $e) {
            DB::rollBack();
        }
    }
}
