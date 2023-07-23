<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestOrders extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'bl_no' => 'required|string|max:255',
            'booking_no' => 'required|string|max:255',
            'starting_point' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'vessel_voy_no' => 'required|string|max:255',
            'no_of_packages' => 'required|string|min:1',
            'on_board_date' => 'required|date',
            'gross_cargo_weight' => 'required|string|min:0',
            'no_of_containers' => 'required|string|min:1',
            'measurement' => 'required|string|max:255',
            'service_requirement' => 'required|string|max:255',
            'progress1' => 'nullable|string|max:255',
            'progress2' => 'nullable|string|max:255',
        ];
    }
}
