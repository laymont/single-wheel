<?php

use App\Enums\PayStatusEnum;
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
        Schema::create('payment_methods', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->boolean('enable')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('payments', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('method_id')->constrained('payment_methods');
            $table->string('reference')->nullable();
            $table->decimal('amount', 10, 2);
            $table->timestamp('date');
            $table->enum('status', PayStatusEnum::values())->default(PayStatusEnum::Pendiente->value);
            $table->timestamps();
            $table->softDeletes();
            $table->index('user_id');
            $table->index('status');
            $table->index('method_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', static function (Blueprint $table) {
            // Elimina la columna payment_method_id
            $table->dropColumn('method_id');
        });
        Schema::dropIfExists('payment_methods');
        Schema::dropIfExists('payments');
    }
};
