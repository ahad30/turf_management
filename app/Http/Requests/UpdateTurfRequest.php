<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTurfRequest extends FormRequest
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
            'branch_id' => 'exists:branches,id',
            'city_id' => 'required',
            'turf_name' => 'required|unique:turfs,turf_name',
            'size' => 'required',
            'turf_type' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'thumbnail' => 'nullable|mimes:jpg,png,jpeg',
            'description' => 'sometimes|nullable',
            'price_for_60_minutes_at_day' => 'required|min:0',
            'price_for_90_minutes_at_day' => 'required|min:0',
            'price_for_120_minutes_at_day' => 'required|min:0',
            'price_for_60_minutes_at_night' => 'required|min:0',
            'price_for_90_minutes_at_night' => 'required|min:0',
            'price_for_120_minutes_at_night' => 'required|min:0',
            'bank_name' => 'required',
            'account_holder_name' => 'required',
            'account_type' => 'required',
            'account_number' => 'required',
            'qr_code' => 'nullable|mimes:jpg,png,jpeg',
        ];
    }
}
