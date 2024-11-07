<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
    return [
        'title.required' => 'Judul task harus diisi.',
        'due_date.required' => 'Tanggal jatuh tempo harus diisi.',
        'category_id.exists' => 'Kategori yang dipilih tidak valid.',
    ];
    }

}
