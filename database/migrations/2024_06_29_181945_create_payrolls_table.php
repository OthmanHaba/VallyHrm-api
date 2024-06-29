<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Employee::class)->constrained()->cascadeOnDelete();
            $table->date('date');
            $table->decimal('basic_salary', 15, 2);
            $table->decimal('allowances', 15, 2)->nullable();
            $table->decimal('deductions', 15, 2)->nullable();
            $table->decimal('net_salary', 15, 2);
            $table->text('notes')->nullable();
            $table->string('status')->default('pending');
            $table->date('payment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
