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
            'financial_number' => $this->faker->unique()->numerify('FIN######'),
            'national_number' => $this->faker->unique()->numerify('NN######'),
            'mother_name' => $this->faker->firstNameFemale,
            'social_status' => $this->faker->randomElement(['single', 'married', 'divorced', 'widow']),
            'family_booklet_number' => $this->faker->numerify('FB######'),
            'family_number_count' => $this->faker->numberBetween(1, 10),
            'registration_number' => $this->faker->unique()->numerify('RN######'),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'birth_date' => $this->faker->date,
            'address' => $this->faker->address,
            'notes' => $this->faker->optional()->sentence,
            'personal_image' => $this->faker->optional()->imageUrl,
            'position_id' => Position::factory(),
            'hiring_date' => $this->faker->date,
            'end_date' => $this->faker->optional()->date,
            'end_reason' => $this->faker->optional()->sentence,
            'employment_type' => $this->faker->randomElement(['App\\Models\\Employee', 'App\\Models\\Contractor']),
            'employment_id' => $this->faker->numberBetween(1, 100),
            'branch_id' => Branch::factory(),
            'department_id' => Department::factory(),

            // financial data
            'bank_id' => Bank::factory(),
            'bank_branch_id' => BankBranch::factory(),
            'bank_account_number' => $this->faker->numerify('BA######'),
            'hire_financial_grade' => $this->faker->optional()->randomFloat(2, 1000, 5000),
            'current_financial_grade' => $this->faker->optional()->randomFloat(2, 1000, 5000),
            'current_salary' => $this->faker->optional()->randomFloat(2, 3000, 10000),
            'next_financial_grade' => $this->faker->optional()->randomFloat(2, 1000, 5000),
            'financial_grade_take_date' => $this->faker->optional()->date,
            'years_in_financial_grade' => $this->faker->optional()->numberBetween(0, 10),
            'financial_grade_due_date' => $this->faker->optional()->date,
            'last_bonus_date' => $this->faker->optional()->date,
            'total_bonuses' => $this->faker->optional()->numberBetween(0, 20),
            'base_salary' => $this->faker->optional()->randomFloat(2, 3000, 10000),
            'qualification_id' => Qualification::factory(),
            'blood_type' => $this->faker->optional()->randomElement(['A', 'B', 'AB', 'O']),
            'passport_number' => $this->faker->unique()->numerify('P######'),
            'personal_card_number' => $this->faker->optional()->numerify('PC######'),
            'vacation_days' => $this->faker->optional()->numberBetween(0, 30),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
