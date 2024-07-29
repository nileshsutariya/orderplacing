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
        if (!Schema::hasTable('item')) {
            Schema::create('item', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('group_id');
                $table->string('name');
                $table->string('description');
                $table->string('price');
                $table->string('qty')->nullable();
                $table->boolean('status')->default(0)->comment('0 is Deactive , 1 is Active');;
                $table->foreign('group_id')->references('id')->on('item_group');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};
