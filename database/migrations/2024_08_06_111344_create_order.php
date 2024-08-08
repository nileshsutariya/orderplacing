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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('party_id');
            $table->foreign('party_id')->references('id')->on('party_master')->onUpdate("cascade")->onDelete("cascade");
            $table->string('total_products');
            $table->string('subtotal');
            $table->string('tax_percentage');
            $table->string('tax_amount');
            $table->string('final_total');
            $table->boolean('status')->default(0)->comment('0 is Pending , 1 is Shipped , 2 is Completed');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
