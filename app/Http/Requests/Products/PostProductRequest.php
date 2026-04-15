<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class PostProductRequest extends FormRequest
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
            "name"=> ["required", "string", "min:3", "max:100"],
            "price"=> ["required", "integer"],
            "type"=> ["required", "integer"],
            "discount"=> ["required", "integer"],
            "discrption"=> ["required", "string", "min:10", "max:255"]
        ];
    }
}
