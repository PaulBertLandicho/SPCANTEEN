<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Define the relationships and other properties as needed
    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
        'ready',

    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected $primaryKey = 'product_id';
    
}
