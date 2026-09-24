<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            return [
                'nis' => ['required', 'string', 'max:10', 'unique:students,nis,' . $this->student->id],
                'name' => ['required', 'string', 'max:80'],
                'address' => ['nullable', 'string'],
            ];
        }
        return [
            //
            'nis' => ['required', 'string', 'max:10', 'unique:students,nis'],
            'name' => ['required', 'string', 'max:80'],
            'address' => ['nullable', 'string'],
        ];
    }

    
}
