<?php

namespace App\Http\Controllers;

use App\Http\Resources\BalanceResource;
use App\Models\Balances;
use Illuminate\Http\Request;

class BalancesController extends Controller
{
    public function index()
    {
        $balances = Balances::find(1);

        return new BalanceResource($balances);
    }
}
