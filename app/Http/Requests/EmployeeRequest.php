<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Personal
            'personal.name' => 'required|string|max:255',
            'personal.fileNumber' => 'required|string|max:255',
            'personal.financeNumber' => 'required|string|max:255',
            'personal.nationalNumber' => 'required|string|max:255',
            'personal.motherName' => 'required|string|max:255',
            'personal.socialStatus' => 'required|string|max:255',
            'personal.familyNumber' => 'required|string|max:255',
            'personal.familyCount' => 'required|integer',
            'personal.registrationNumber' => 'required|string|max:255',
            'personal.gender' => 'required|string|max:255',
            'personal.birthDate' => 'required|date',
            'personal.address' => 'required|string|max:255',
            'personal.notes' => 'nullable|string',
            'personal.personalPhoto' => 'nullable|image|max:2048',

            // Job
            'job.currentJob' => 'required|integer|exists:positions,id',
            'job.department' => 'required|integer|exists:departments,id',
            'job.startDate' => 'required|date',
            'job.contractType' => 'required|string|max:255',
//            'job.contract_start' => 'required_if:job.contractType,Contract|date',
//            'job.contract_end' => 'required_if:job.contractType,Contract|date',
//            'job.status' => 'required_if:job.contractType,Contract|string|max:255',
//            'job.appointmentType' => 'required_if:job.contractType,Appointment|string|max:255',
//            'job.appointmentDate' => 'required_if:job.contractType,Appointment|date',
//            'job.appointmentContractNumber' => 'required_if:job.contractType,Appointment|string|max:255',

            // Financial
            'financial.bank' => 'required|integer|exists:banks,id',
            'financial.bankBranch' => 'required|integer|exists:bank_branches,id',
            'financial.bankAccountNumber' => 'required|string|max:255',
            'financial.financialGradeUponAppointment' => 'required|string|max:255',
            'financial.currentFinancialGrade' => 'required|string|max:255',
            'financial.currentPayrollUponFinancialGrade' => 'required|numeric',
            'financial.nextFinancialGrade' => 'required|string|max:255',
            'financial.financialGradeDate' => 'required|date',
            'financial.financialGradeStayYears' => 'required|integer',
            'financial.financialGradeDueDate' => 'required|date',
            'financial.bonusTakeDate' => 'required|date',
            'financial.bonusCount' => 'required|integer',
            'financial.baseSalary' => 'required|numeric',

            // Additional Information
            'anotherInformation.bloodType' => 'nullable|string|max:255',
            'anotherInformation.passportNumber' => 'nullable|string|max:255',
            'anotherInformation.personalCardNumber' => 'nullable|string|max:255',
            'anotherInformation.phoneNumber' => 'required|string|max:255',
            'anotherInformation.vacationBalance' => 'required|integer',
        ];
    }
}
