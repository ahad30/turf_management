<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoookingRequest extends FormRequest
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
            'package' => 'required',
            'date' => 'date',
            'selected_time' => 'required',
            'products' => 'required',
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_phone_number' => 'required',
            'payment_with' => 'required',
            'payment_type' => 'required',
            'transaction_number' => 'required',
            'amount' => 'required',
            'transaction_code' => 'required',
        ];
    }
}
