<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('partyorder', function (Blueprint $table) {
            $table->id();
            $table->string('party_id');
            $table->string('buyer_name');
            $table->string('phone_number');
            $table->string('address')->nullable();
            $table->string('item_name');
            $table->string('price');
            $table->string('qty');
            $table->string('total');
            $table->boolean('status')->default(0)->comment('0 is Pending , 1 is Shipped , 2 is Completed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partyorder');
    }
};
