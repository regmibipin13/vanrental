<?php

namespace App\Http\Requests;

use App\Models\Blog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBlogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('blog_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:blogs,title,' . request()->route('blog')->id,
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
