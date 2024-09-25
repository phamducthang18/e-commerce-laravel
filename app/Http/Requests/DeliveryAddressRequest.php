<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class DeliveryAddressRequest extends FormRequest
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
            'consignee_name' => 'required|string',
            'phone_number'=>'required|regex:/^\+?[0-9]{1,4}?[0-9]{6,14}$/',
            'specific' =>'string',
            'street' => 'required',
            'wards_id'=>'required|exists:wards,id',
            'districts_id'=>'required|exists:districts,id',
            'provinces_id'=>'required|exists:provinces,id',
            'is_default'=>'boolean'
        ];
    }
    
    public function getData()
    {
        $data = $this->validated();
        $data['user_id'] = auth()->id();
      
        return $data;
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422));
    }
}
