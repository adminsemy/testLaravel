<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $perPage = 25;

    public function vendor()
    {
        return $this->belongsTo('App\Vendor', 'vendor_id');
    }
}
