<?php

namespace App\Http\Requests;

use App\Models\Van;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('van_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:vans,id',
        ];
    }
}
