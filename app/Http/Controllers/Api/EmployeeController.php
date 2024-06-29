<?php

namespace App\Http\Controllers\Api;

use App\Enums\AppointmentTypes;
use App\Enums\GenderEnum;
use App\Enums\SocialStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Appointment;
use App\Models\Contract;
use App\Models\Employee;
use App\Models\Qualification;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::latest()->get();

        return response()->json([
            'data' => $employee,
            'message' => 'the employees has returned successfully',
        ]);
    }

    public function store(EmployeeRequest $request)
    {
        $validated = $request->validated();

        $personal = $validated['personal'];
        //$qualification = $validated['qualification'];
        $financial = $validated['financial'];
        $job = $validated['job'];
        $anotherData = $validated['anotherInformation'];
//        $attachments = $validated['attachments'];


        $employee = new  Employee($this->getEmployeeData($personal, $job, $anotherData, $financial));

//        $employee->personal_photo
        $employee->save();
        return response()->json([
            'data' => $employee,
            'message' => 'the employee has been created successfully',
        ]);
    }


    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json([
            'data' => $employee,
            'message' => 'the employee has been returned successfully',
        ]);
    }
    protected function getEmployeeData(mixed $personal, mixed $job, mixed $anotherData, mixed $financial)
    {

        return [
            'name' => $personal['name'],
            'file_number' => $personal['fileNumber'],
            'finance_number' => $personal['financeNumber'],
            'national_number' => $personal['nationalNumber'],
            'mother_name' => $personal['motherName'],
            'social_status' => SocialStatus::getValueFromTranslatedValue($personal['socialStatus']),
            'family_number' => $personal['familyNumber'],
            'family_count' => $personal['familyCount'],
            'registration_number' => $personal['registrationNumber'],
            'gender' => GenderEnum::getValueFromTranslatedValue($personal['gender']),
            'birth_place' => $personal['birthPlace'],
            'birth_date' => $personal['birthDate'],
            'address' => $personal['address'],
            'notes' => $personal['notes'],
            'personal_photo' => $personal['personalPhoto'] ?? null,
            'position_id' => $job['currentJob'],
            'department_id' => $job['department'],
            'start_date' => $job['startDate'],
            'bank_id' => $financial['bank'],
            'bank_branch_id' => $financial['bankBranch'],
            'bank_account_number' => $financial['bankAccountNumber'],
            'financial_grade_upon_appointment' => $financial['financialGradeUponAppointment'],
            'current_financial_grade' => $financial['currentFinancialGrade'],
            'current_payroll_upon_financial_grade' => $financial['currentPayrollUponFinancialGrade'],
            'next_financial_grade' => $financial['nextFinancialGrade'],
            'financial_grade_date' => $financial['financialGradeDate'],
            'financial_grade_stay_years' => $financial['financialGradeStayYears'],
            'financial_grade_due_date' => $financial['financialGradeDueDate'],
            'bonus_take_date' => $financial['bonusTakeDate'],
            'bonus_count' => $financial['bonusCount'],
            'base_salary' => $financial['baseSalary'],
            'blood_type' => $anotherData['bloodType'],
            'nationality' => $anotherData['nationality'],
            'passport_number' => $anotherData['passportNumber'],
            'personal_card_number' => $anotherData['personalCardNumber'],
            'phone_number' => $anotherData['phoneNumber'],
            'efficiency_report_info' => $anotherData['efficiencyReportInfo'],
            'vacation_balance' => $anotherData['vacationBalance'],
//            'cv' => $attachments['cv'],
//            'contract_attachment' => $attachments['contract'],
//            'passport_attachment' => $attachments['passport'],
//            'another_attachment' => $attachments['another'],
        ];
    }
}
