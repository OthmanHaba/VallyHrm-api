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
            // Personal information
            'personal.name' => 'required|string|max:255',
            'personal.fileNumber' => 'required|string|max:255',
            'personal.financeNumber' => 'required|string|max:255',
            'personal.nationalNumber' => 'required|string|max:255',
            'personal.motherName' => 'required|string|max:255',
            'personal.socialStatus' => 'required|string|max:255',
            'personal.familyNumber' => 'required|string|max:255',
            'personal.familyCount' => 'nullable|integer',
            'personal.registrationNumber' => 'required|string|max:255',
            'personal.gender' => 'required|string|max:255',
            'personal.birthPlace' => 'required|string|max:255',
            'personal.birthDate' => 'required|date',
            'personal.address' => 'required|string|max:255',
            'personal.notes' => 'nullable|string',
            'personal.personalPhoto' => 'nullable|image',
            // Job information
            'job.currentJob' => 'required|exists:positions,id',
            'job.department' => 'required|exists:departments,id',
            'job.startDate' => 'required|date',
//            'job.contractType' => 'required|string|max:255',
//            'job.contract' => 'required|string|max:255',
//            'job.contractStart' => 'required|date',
//            'job.contractEnd' => 'required|date',
//            'job.status' => 'required|string|max:255',
//            'job.appointment_type' => 'required|string|max:255',
//            'job.appointment_date' => 'required|date',
//            'job.appointment_contract_number' => 'required|string|max:255',
            // Financial information
            'financial.bank' => 'required|exists:banks,id',
            'financial.bankBranch' => 'required|exists:bank_branches,id',
            'financial.bankAccountNumber' => 'required|string|max:255',
            'financial.financialGradeUponAppointment' => 'required|string|max:255',
            'financial.currentFinancialGrade' => 'required|string|max:255',
            'financial.currentPayrollUponFinancialGrade' => 'required|string|max:255',
            'financial.nextFinancialGrade' => 'required|string|max:255',
            'financial.financialGradeDate' => 'required|date',
            'financial.financialGradeStayYears' => 'nullable|integer',
            'financial.financialGradeDueDate' => 'required|date',
            'financial.bonusTakeDate' => 'required|date',
            'financial.bonusCount' => 'nullable|integer',
            'financial.baseSalary' => 'nullable|numeric',
            // Another information
            'anotherInformation.bloodType' => 'required|string|max:255',
            'anotherInformation.nationality' => 'required|string|max:255',
            'anotherInformation.passportNumber' => 'required|string|max:255',
            'anotherInformation.personalCardNumber' => 'required|string|max:255',
            'anotherInformation.phoneNumber' => 'required|string|max:255',
            'anotherInformation.efficiencyReportInfo' => 'nullable|string',
            'anotherInformation.vacationBalance' => 'required|integer',
            // Attachments
            'attachments.cv' => 'nullable|file',
            'attachments.contract' => 'nullable|file',
            'attachments.passport' => 'nullable|file',
            'attachments.another' => 'nullable|file',
        ];
    }
}
