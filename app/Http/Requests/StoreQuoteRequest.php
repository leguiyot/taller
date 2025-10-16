<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
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
            'client_id' => 'required|exists:clients,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'description' => 'required|string',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:Pendiente,Aprobado,Rechazado',
        ];
    }
}
