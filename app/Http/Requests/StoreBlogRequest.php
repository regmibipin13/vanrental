<?php

namespace App\Http\Requests;

use App\Models\Blog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBlogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('blog_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:blogs',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
            'short_description' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'published_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'display_image' => [
                'required',
            ],
            'cover_image' => [
                'required',
            ],
        ];
    }
}
