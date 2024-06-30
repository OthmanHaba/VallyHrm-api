<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\BankBranch;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Position;
use App\Models\Qualification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // personal data
            'name' => $this->faker->name,
            'phone_number' => $this->faker->phoneNumber,
            'file_number' => $this->faker->unique()->numerify('FN######'),
            'finance_number' => $this->faker->unique()->numerify('FIN######'),
            'national_number' => $this->faker->unique()->numerify('NN######'),
            'mother_name' => $this->faker->firstNameFemale,
            'social_status' => $this->faker->randomElement(['single', 'married', 'divorced', 'widow']),
            'family_number' => $this->faker->numerify('FB######'),
            'family_count' => $this->faker->numberBetween(1, 10),
            'registration_number' => $this->faker->unique()->numerify('RN######'),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'birth_date' => $this->faker->date,
            'birth_place' => $this->faker->city(),
            'address' => $this->faker->address,
            'notes' => $this->faker->optional()->sentence,
            'personal_photo' => $this->faker->imageUrl,
            'position_id' => Position::factory(),
            'start_date' => $this->faker->date,
            'nationality' => $this->faker->country(),
//            'employment_type' => $this->faker->randomElement(['App\\Models\\Employee', 'App\\Models\\Contractor']),
//            'employment_id' => $this->faker->numberBetween(1, 100),
//            'branch_id' => Branch::factory(),
            'department_id' => Department::factory()->create()->id,

            // financial data
            'bank_id' => Bank::factory()->create()->id,
            'bank_branch_id' => BankBranch::factory(),
            'bank_account_number' => $this->faker->numerify('BA######'),
            'financial_grade_upon_appointment' => $this->faker->randomFloat(2, 1000, 5000),
            'current_financial_grade' => $this->faker->randomFloat(2, 1000, 5000),
            'current_payroll_upon_financial_grade' => $this->faker->randomFloat(2, 3000, 10000),
            'next_financial_grade' => $this->faker->randomFloat(2, 1000, 5000),
            'financial_grade_date' => $this->faker->date,
            'financial_grade_stay_years' => $this->faker->numberBetween(0, 10),
            'financial_grade_due_date' => $this->faker->date,
            'bonus_take_date' => $this->faker->date,
            'bonus_count' => $this->faker->numberBetween(0, 20),
            'base_salary' => $this->faker->randomFloat(2, 3000, 10000),
            'blood_type' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'passport_number' => $this->faker->unique()->numerify('P######'),
            'personal_card_number' => $this->faker->numerify('PC######'),
            'vacation_balance' => $this->faker->numberBetween(0, 30),
//            'status' => $this->faker->randomElement(['active', 'inactive']),
//            'created_at' => now(),
//            'updated_at' => now(),
        ];
    }
}
