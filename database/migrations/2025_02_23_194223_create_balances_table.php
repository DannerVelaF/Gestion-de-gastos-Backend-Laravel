<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->id();
            $table->decimal('balance', 10, 2)->default(0);

            $table->decimal('income', 10, 2)->default(0);
            $table->decimal('expense', 10, 2)->default(0);

            $table->timestamps();
        });
        DB::table('balances')->insert([
            ['balance' => 0, 'income' => 0, 'expense' => 0],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balances');
    }
};
