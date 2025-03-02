<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $fillable = [
        'description',
        'type',
        'amount',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
