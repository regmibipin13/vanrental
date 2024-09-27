<?php

namespace App\Http\Requests;

use App\Models\Booking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBookingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('booking_edit');
    }

    public function rules()
    {
        return [
            'van_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'pickup_location' => [
                'string',
                'nullable',
            ],
            'drop_location' => [
                'string',
                'nullable',
            ],
            'pickup_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'drop_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'total_booking_amount' => [
                'numeric',
                'required',
            ],
            'extras.*' => [
                'integer',
            ],
            'extras' => [
                'array',
            ],
        ];
    }
}
