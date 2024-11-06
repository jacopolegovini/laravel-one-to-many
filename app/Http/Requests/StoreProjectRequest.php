<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3'],
            'type_id' => ['required', 'numeric', 'exists:types,id'],
            'author' => ['required', 'string'],
            'date' => ['required', 'date'],
            'description' => ['string']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Devi mettere un titolo.',
            'title.min' => 'Il titolo deve avere come minimo tre caratteri.'
        ];
    }
}
