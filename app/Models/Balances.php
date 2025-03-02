<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balances extends Model
{
    protected $fillable = [
        'balance',
        'income',
        'expense',
    ];
}
