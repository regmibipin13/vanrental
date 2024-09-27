<?php

namespace App\Http\Requests;

use App\Models\Van;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('van_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:vans',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'price' => [
                'required',
            ],
            'images' => [
                'array',
            ],
            'total_number_of_vans' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'facilities.*' => [
                'integer',
            ],
            'facilities' => [
                'required',
                'array',
            ],
        ];
    }
}
