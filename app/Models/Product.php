<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = [];


    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    const HOT_ON = 1;
    const HOT_OFF = 0;

    protected $status = [
        1 => [
            'name' => 'Public',
            'class' => 'bg-danger'
        ],
        0 => [
            'name' => 'Private',
            'class' => 'bg-secondary'
        ]
    ];

    protected $hotitem = [
        1 => [
            'name' => 'Nổi bật',
            'class' => 'bg-success'
        ],
        0 => [
            'name' => 'Không',
            'class' => 'bg-secondary'
        ]
    ];

    public function getHot()
    {
        return Arr::get($this->hotitem, $this->hot, '[N\A]');
    }

    public function getStatus()
    {
        return Arr::get($this->status, $this->active, '[N\A]');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'pro_category_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }
}