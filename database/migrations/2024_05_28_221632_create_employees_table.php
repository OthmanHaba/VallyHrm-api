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
            // Personal information
            $table->string('name');
            $table->string('file_number');
            $table->string('finance_number');
            $table->string('national_number');
            $table->string('mother_name');
            $table->string('social_status');
            $table->string('family_number');
            $table->integer('family_count')->nullable();
            $table->string('registration_number');
            $table->string('gender');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('address');
            $table->text('notes')->nullable();
            $table->string('personal_photo')->nullable();
            // Job information
//            $table->integer('current_job');
            $table->foreignIdFor(\App\Models\Position::class);
            $table->foreignIdFor(\App\Models\Department::class);
            $table->date('start_date');
//            $table->string('contract_type');
//            $table->string('contract');
//            $table->date('contract_start');
//            $table->date('contract_end');
//            $table->string('status');
//            $table->string('appointment_type');
//            $table->date('appointment_date');
//            $table->string('appointment_contract_number');
            // Financial information
            $table->foreignIdFor(\App\Models\Bank::class);
            $table->foreignIdFor(\App\Models\BankBranch::class);
            $table->string('bank_account_number');
            $table->string('financial_grade_upon_appointment');
            $table->string('current_financial_grade');
            $table->string('current_payroll_upon_financial_grade');
            $table->string('next_financial_grade');
            $table->date('financial_grade_date');
            $table->integer('financial_grade_stay_years')->nullable();
            $table->date('financial_grade_due_date');
            $table->date('bonus_take_date');
            $table->integer('bonus_count')->nullable();
            $table->decimal('base_salary', 15, 2)->nullable();
            // Another information
            $table->string('blood_type');
            $table->string('nationality');
            $table->string('passport_number');
            $table->string('personal_card_number');
//            $table->string('insurance_card_number');
            $table->string('phone_number');
            $table->text('efficiency_report_info')->nullable();
            $table->integer('vacation_balance');
            // Attachments
            $table->string('cv')->nullable();
            $table->string('contract_attachment')->nullable();
            $table->string('passport_attachment')->nullable();
            $table->string('another_attachment')->nullable();

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
