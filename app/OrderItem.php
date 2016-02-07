<?php

namespace FRD;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'id',
        'product_id',
        'order_id',
        'price',
        'qtd'
    ];

    public function orders()
    {
        return $this->belongsTo('FRD\Order');
    }
}
