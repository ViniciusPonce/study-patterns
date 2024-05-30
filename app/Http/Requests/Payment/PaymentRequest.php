<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'order_id' => 'required|integer',
            'items' => 'required|array',
            'items.*.id' => 'required|integer',
            'items.*.quantity' => 'required|integer',
            'items.*.price' => 'required|numeric',
            'customer' => 'required|array',
            'customer.name' => 'required|string',
            'customer.email' => 'required|email',
            'customer.document' => 'required|string',
            'customer.phone' => 'required|string',
            'payment' => 'required|array',
            'payment.id' => 'required|integer',
            'payment.intermediator' => 'required|string',
            'payment.method' => 'required|string',
            'payment.total' => 'required|numeric',
        ];
    }
}
