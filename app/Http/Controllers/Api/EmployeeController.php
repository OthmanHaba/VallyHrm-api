<?php

namespace App\Http\Controllers\Api;

use App\Enums\AppointmentTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::all();
        return response()->json([
            'data' => $employee,
            'message' => 'the employees has returned successfully',
        ]);
    }

    public function store(EmployeeRequest $request)
    {
        $personal = $request->personal;
        $job = $request->job;
        $financial = $request->financial;
        $anotherInformation = $request->anotherInformation;
        $contractType = $job['contractType'];
        $contract = [];

        if ($contractType === 'Contract') {
            $contract[] = [
                'contractStart' => $job['contract_start'],
                'contractEnd' => $job['contract_end'],
                'status' => $job['status'],
            ];
        } else if ($contractType === 'Appointment') {
            $contract[] = [
                'appointment_type' => $job['appointmentType'],
                'appointment_date' => $job['appointmentDate'],
                'appointment_contract_number' => $job['appointmentContractNumber'],
            ];
        }

        $employee = Employee::create([
            // personal
            'name' => $personal['name'],
            'file_number' => $personal['fileNumber'],
            'financial_number' => $personal['financeNumber'],
            'national_number' => $personal['nationalNumber'],
            'mother_name' => $personal['motherName'],
//            'social_status' => $personal['socialStatus'],
            'social_status' => 'single',
            'family_booklet_number' => $personal['familyNumber'],
            'family_number_count' => $personal['familyCount'],
            'registration_number' => $personal['registrationNumber'],
//            'gender' => $personal['gender'],
            'gender' => 'male',
            'birth_date' => $personal['birthDate'],
            'address' => $personal['address'],
            'notes' => $personal['notes'],
//            'personal_image' => $personal['personalPhoto'],
            // job
            'position_id' => $job['currentJob'],
            'department_id' => $job['department'],
            'hiring_date' => $job['startDate'],
//            'contract_type' => $job['contractType'],
            // financial
            'bank_id' => $financial['bank'],
            'bank_branch_id' => $financial['bankBranch'],
            'bank_account_number' => $financial['bankAccountNumber'],
            'hire_financial_grade' => $financial['financialGradeUponAppointment'],
            'current_financial_grade' => $financial['currentFinancialGrade'],
            'current_salary' => $financial['currentPayrollUponFinancialGrade'],
            'next_financial_grade' => $financial['nextFinancialGrade'],
            'financial_grade_due_date' => $financial['financialGradeDate'],
            'years_in_financial_grade' => $financial['financialGradeStayYears'],
            'financial_grade_take_date' => $financial['financialGradeDueDate'],
            'last_bonus_date' => $financial['bonusTakeDate'],
            'total_bonuses' => $financial['bonusCount'],
            'base_salary' => $financial['baseSalary'],
            // additional information
            'blood_type' => $anotherInformation['bloodType'],
            'passport_number' => $anotherInformation['passportNumber'],
            'personal_card_number' => $anotherInformation['personalCardNumber'],
            'phone_number' => $anotherInformation['phoneNumber'],
            'vacation_days' => $anotherInformation['vacationBalance'],
        ]);

        // Additional logic (contract, qualifications, attachments) goes here

        return response()->json([
            'data' => $employee,
            'message' => 'The employee has been created successfully',
        ]);
    }
}
