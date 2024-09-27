<?php

namespace App\Http\Requests;

use App\Models\Extra;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExtraRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('extra_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'price' => [
                'required',
            ],
            'image' => [
                'required',
            ]
        ];
    }
}
