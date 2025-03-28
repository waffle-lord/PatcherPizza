<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePizzaOrderRequest extends FormRequest
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
            'order_number' => ['required', 'integer'],
            'message' => ['required', 'string', 'max:255'],
            'step_labels' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z, ]+$/'],
            'current_step' => ['required', 'integer'],
            'step_progress' => ['integer', 'between:-1,100']
        ];
    }
}
