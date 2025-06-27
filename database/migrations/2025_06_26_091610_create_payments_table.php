<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->cascadeOnDelete();
            $table->string('payment_method')->nullable(); // misal: transfer bank, cash
            $table->decimal('amount', 10, 2);
            $table->string('status')->default('pending'); // pending, confirmed, failed
            $table->string('payment_proof')->nullable(); // file bukti transfer (opsional)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
