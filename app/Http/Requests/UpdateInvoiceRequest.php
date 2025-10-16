<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
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
        $invoiceId = $this->route('invoice')->id ?? null;
        return [
            'work_order_id' => 'required|exists:work_orders,id',
            'client_id' => 'required|exists:clients,id',
            'total' => 'required|numeric|min:0',
            'tax_amount' => 'required|numeric|min:0',
            'issue_date' => 'required|date',
        ];
    }
}
