<?php

namespace App\Http\Requests;

use App\Models\Category;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('category_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:categories',
            ],
            'total_seats' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'facilities.*' => [
                'integer',
            ],
            'facilities' => [
                'array',
            ],
        ];
    }
}
