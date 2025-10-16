<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
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
        $vehicleId = $this->route('vehicle')->id ?? null;
        return [
            'client_id' => 'required|exists:clients,id',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y')+1),
            'license_plate' => 'required|string|max:20|unique:vehicles,license_plate,' . $vehicleId,
            'vin_number' => 'required|string|max:50|unique:vehicles,vin_number,' . $vehicleId,
        ];
    }
}
