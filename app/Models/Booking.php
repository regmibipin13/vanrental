<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public $table = 'bookings';

    protected $dates = [
        'pickup_date',
        'drop_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'van_id',
        'user_id',
        'pickup_location',
        'drop_location',
        'pickup_date',
        'drop_date',
        'total_booking_amount',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function van()
    {
        return $this->belongsTo(Van::class, 'van_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getPickupDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setPickupDateAttribute($value)
    {
        $this->attributes['pickup_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDropDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDropDateAttribute($value)
    {
        $this->attributes['drop_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function extras()
    {
        return $this->belongsToMany(Extra::class);
    }

    public function statuses()
    {
        return $this->hasMany(BookingStatus::class);
    }
}
