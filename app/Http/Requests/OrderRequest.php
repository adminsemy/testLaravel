<?php

namespace App\Http\Requests;

use App\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client_email' => 'required|email:rfc,dns',
            'partner_id' => 'required|exists:partners,id',
            'product' => 'array',
            'product.*' => 'integer|min:1',
            'status' => ['required', Rule::in(array_keys(Order::STATUS))],
        ];
    }
}
