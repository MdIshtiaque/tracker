<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function status()
    {
        return $this->hasMany(OrderStatus::class);
    }

    public function currentPort()
    {
        return $this->belongsTo(CurrentPort::class, 'id', 'orders_id');
    }
}
