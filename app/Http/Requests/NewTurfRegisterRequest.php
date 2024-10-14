<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewTurfRegisterRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|unique:new_turf_registers,email',
            'phone' => 'required|unique:new_turf_registers,phone',
            'city' => 'required|string',
            'address' => 'required|string',
            'turf_size' => 'required|string',
            'turf_type' => 'required|string',
        ];
    }
}
