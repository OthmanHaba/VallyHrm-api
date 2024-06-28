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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            // personal data
            $table->string('name');
            $table->string('phone_number');
            $table->string('file_number')->unique();
            $table->string('financial_number')->unique();
            $table->string('national_number')->unique();
            $table->string('mother_name');
            $table->enum('social_status', \App\Enums\SocialStatus::getValues());
            $table->string('family_booklet_number');
            $table->integer('family_number_count');
            $table->string('registration_number')->unique();
            $table->enum('gender', ['male', 'female']);
            $table->date('birth_date');
            $table->string('address');
            $table->string('notes')->nullable();
            $table->string('personal_image')->nullable();
            $table->foreignIdFor(\App\Models\Position::class);
            $table->date('hiring_date');
            $table->date('end_date')->nullable();
            $table->string('end_reason')->nullable();
            $table->morphs('employment');
            $table->foreignIdFor(\App\Models\Branch::class);
            $table->foreignIdFor(\App\Models\Department::class);

            // financial data
            $table->foreignIdFor(\App\Models\Bank::class);
            $table->foreignIdFor(\App\Models\BankBranch::class);
            $table->string('bank_account_number');
            $table->decimal('hire_financial_grade', 8, 2)->nullable();
            $table->decimal('current_financial_grade', 8, 2)->nullable();
            $table->decimal('current_salary', 10, 2)->nullable();
            $table->decimal('next_financial_grade', 8, 2)->nullable();
            $table->date('financial_grade_take_date')->nullable();
            $table->integer('years_in_financial_grade')->nullable();
            $table->date('financial_grade_due_date')->nullable();
            $table->date('last_bonus_date')->nullable();
            $table->integer('total_bonuses')->nullable();
            $table->decimal('base_salary', 10, 2)->nullable();
            $table->foreignIdFor(App\Models\Qualification::class);
            $table->string('blood_type')->nullable();
            $table->string('passport_number')->unique();
            $table->string('personal_card_number')->nullable();
            $table->integer('vacation_days')->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
