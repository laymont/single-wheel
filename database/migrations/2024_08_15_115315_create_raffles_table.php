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
        Schema::create('raffles', static function (Blueprint $table) {
            $table->id();
            $table->string('identification')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('numbers');
            $table->float('price');
            $table->string('prize');
            $table->string('prize_img');
            $table->enum('status', \App\Enums\RaffleStatusEnum::values())->default(\App\Enums\RaffleStatusEnum::inactive->value);
            $table->unsignedBigInteger('created_by')->index();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raffles');
    }
};
