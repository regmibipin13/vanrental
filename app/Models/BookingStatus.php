<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BookingStatus extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'booking_statuses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'booking_id',
        'status',
        'message',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'pending'    => 'Pending',
        'payment_pending'    => 'Payment Pending',
        'payment_initiated'    => 'Payment Initiated',
        'payment_completed'    => 'Payment Completed',
        'payment_failed'    => 'Payment Failed',
        'confirmed'  => 'Confirmed',
        'picked_up'  => 'Picked Up',
        'droped_off' => 'Dropped Off',
        'completed'  => 'Completed',
        'cancelled'  => 'Cancelled',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
