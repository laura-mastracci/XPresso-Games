<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;


class OrderItem extends Model
{
    protected $fillable = ['order_id', 'article_id', 'price', 'quantity'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}