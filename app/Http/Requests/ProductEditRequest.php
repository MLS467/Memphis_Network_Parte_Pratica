<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string', 'max:1000'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome do produto é obrigatório.',
            'name.string'   => 'O nome do produto deve ser um texto válido.',
            'name.max'      => 'O nome do produto não pode ultrapassar 255 caracteres.',

            'price.required'   => 'O preço é obrigatório.',
            'price.numeric'    => 'O preço deve ser um número.',
            'price.min'        => 'O preço não pode ser negativo.',

            'description.required' => 'A descrição é obrigatória.',
            'description.string'   => 'A descrição deve ser um texto.',
            'description.max'      => 'A descrição não pode ultrapassar 1000 caracteres.',

            'photo.image' => 'O arquivo enviado deve ser uma imagem.',
            'photo.mimes' => 'A foto deve estar no formato JPG ou PNG.',
            'photo.max'   => 'A foto não pode ter mais que 2MB.',
        ];
    }
}