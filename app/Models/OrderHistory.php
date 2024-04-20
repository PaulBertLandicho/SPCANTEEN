<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    protected $table = 'order_history';

    protected $fillable = [
        'order_id',
        // Add other fillable fields as needed
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

