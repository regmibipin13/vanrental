<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\BookingStatus;
use Livewire\Component;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class BookVan extends Component
{
    public $vans;
    public $extras;
    public $selectedExtras = [];
    public $showExtrasModal = false;
    public $showCheckoutModal = false;
    public $selectedVan;

    public $pickup_location;
    public $pickup_date;
    public $dropoff_location;
    public $dropoff_date;

    public $totalAmount;


    public function mount()
    {
        $this->pickup_date = request()->pickup_date;
        $this->pickup_location = request()->pickup_location;
        $this->dropoff_location = request()->dropoff_location;
        $this->dropoff_date = request()->dropoff_date;
    }

    public function addExtra($key)
    {
        if (isset($this->extras[$key])) {
            if (in_array($key, $this->selectedExtras)) {
                // Remove extra if already selected
                $this->selectedExtras = array_filter($this->selectedExtras, fn($item) => $item !== $key);
            } else {
                // Add extra if not already selected
                $this->selectedExtras[] = $key;
            }
        }
    }

    public function openExtrasModal($van)
    {
        $this->showExtrasModal = true;
        $this->selectedVan = $van;
    }

    public function closeExtrasModal()
    {
        $this->showExtrasModal = false;
        $this->selectedVan = null;
        $this->selectedExtras = [];
    }

    public function openCheckoutModal()
    {
        $this->showExtrasModal = false;
        $this->showCheckoutModal = true;
        $this->totalAmount = $this->calculateTotalPrice();

        foreach ($this->selectedExtras as $extra) {
            $this->totalAmount += $this->extras[$extra]['price'];
        }
    }

    public function closeCheckoutModal()
    {
        $this->showCheckoutModal = false;
        $this->selectedExtras = [];
        $this->selectedVan = null;
        $this->totalAmount = 0;
    }

    public function proceedToCheckout()
    {

        $pickupDate = \Carbon\Carbon::parse($this->pickup_date)->format('Y-m-d H:i:s');
        $dropoffDate = \Carbon\Carbon::parse($this->dropoff_date)->format('Y-m-d H:i:s');

        // Prepare extras data
        $ext = [];
        foreach ($this->selectedExtras as $extra) {
            $ext[] = $this->extras[$extra]->id;
        }

        // Save booking details to the database
        $data = [
            'pickup_location' => $this->pickup_location,
            'pickup_date' => $pickupDate,
            'drop_location' => $this->dropoff_location,
            'drop_date' => $dropoffDate,
            'extras' => $ext,
            'van_id' => $this->selectedVan['id'],
            'user_id' => auth()->id(),
            'total_booking_amount' => $this->totalAmount,
        ];

        $booking = Booking::create($data);
        $booking->extras()->attach($ext);

        BookingStatus::create([
            'booking_id' => $booking->id,
            'status' => 'payment_initiated',
        ]);
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'cad',
                    'product_data' => [
                        'name' => $this->selectedVan['name'],

                    ],
                    'unit_amount' => $this->totalAmount * 100, // 1000 cents = $10
                ],
                'quantity' => 1,
            ]],
            'metadata' => [
                'booking_id' => $booking->id,
            ],
            'mode' => 'payment',
            'success_url' => route('frontend.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}', // Stripe will replace this            'cancel_url' => route('frontend.checkout.cancel'),
        ]);
        return redirect()->away($session->url);
    }

    public function calculateTotalPrice()
    {
        // Calculate number of days between pickup and dropoff
        $pickupDate = \Carbon\Carbon::parse($this->pickup_date);
        $dropoffDate = \Carbon\Carbon::parse($this->dropoff_date);
        $days = $pickupDate->diffInDays($dropoffDate);

        // Ensure at least 1 day is counted
        $days = $days > 0 ? $days : 1;

        // Calculate total price (van price * total days)
        return $this->selectedVan['price'] * $days;
    }


    public function render()
    {
        return view('livewire.book-van');
    }
}
