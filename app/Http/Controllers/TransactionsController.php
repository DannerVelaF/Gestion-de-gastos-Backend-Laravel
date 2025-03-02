<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionResource;
use App\Models\Balances;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionsController extends Controller
{

    public function index()
    {
        $transactions = Transactions::orderBy('created_at', 'desc')->get();

        return response()->json([
            'message' => 'Transactions retrieved successfully',
            'status' => 200,
            'transactions' => TransactionResource::collection($transactions),
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'amount' => 'required|numeric',
            'type' => 'required|in:ingreso,gasto',
            'category_id' => 'numeric|nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $transaction = Transactions::create([
            'description' => $request->description,
            'amount' => $request->amount,
            'type' => $request->type,
            'category_id' => $request->category_id,
        ]);

        if ($request->type == 'ingreso') {
            $this->increaseBalance($request->amount);
        } else {
            $this->decreaseBalance($request->amount);
        }

        return response()->json([
            'message' => 'Transaction created successfully',
            'status' => 200,
            'transaction' => new TransactionResource($transaction),
        ]);
    }

    public function increaseBalance($amount)
    {
        $balance = Balances::find(1);

        $balance->update([
            'balance' => $balance->balance + $amount,
            'income' => $balance->income + $amount,
        ]);
    }

    public function decreaseBalance($amount)
    {
        $balance = Balances::find(1);

        $balance->update([
            'balance' => $balance->balance - $amount,
            'expense' => $balance->expense + $amount,
        ]);
    }
}
