<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Extra;
use App\Models\FaqQuestion;
use App\Models\Payment;
use App\Models\Testimonial;
use App\Models\Van;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PagesController extends Controller
{
    public function index()
    {
        $vans = Van::enabled()->with('category')->orderBy('id', 'desc')->get();
        $blogs = Blog::published()->orderBy('id', 'desc')->get();
        $testimonials = Testimonial::orderBy('id', 'desc')->get();
        $faqs = FaqQuestion::all();
        return view('frontend.pages.home', compact('vans', 'blogs', 'testimonials', 'faqs'));
    }

    public function search(Request $request)
    {
        $sanitized = $request->validate([
            'pickup_location' => ['required'],
            'dropoff_location' => ['required'],
            'pickup_date' => ['required'],
            'dropoff_date' => ['required'],
        ]);
        $pickupDate = $request->pickup_date;
        $dropoffDate = $request->dropoff_date;
        $vans = \App\Models\Van::where('is_enabled', 1)
            ->whereDoesntHave('bookings', function ($query) use ($pickupDate, $dropoffDate) {
                $query->where(function ($query) use ($pickupDate, $dropoffDate) {
                    // Handle cases where pickup_date or drop_date may be NULL
                    $query->where(function ($q) use ($pickupDate, $dropoffDate) {
                        $q->whereNotNull('pickup_date')
                            ->where('pickup_date', '<=', $dropoffDate);
                    })
                        ->where(function ($q) use ($pickupDate, $dropoffDate) {
                            $q->whereNotNull('drop_date')
                                ->where('drop_date', '>=', $pickupDate);
                        });
                });
            })
            ->get();

        $extras = Extra::orderBy('id', 'desc')->get();
        return view('frontend.pages.search', compact('vans', 'extras'));
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function privacyPolicies()
    {
        return view('frontend.pages.privacy');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function postcontact(Request $request)
    {
        $sanitized = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string'],
        ]);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new \App\Mail\ContactMail($sanitized));
        return redirect()->back()->with('success', 'Your message has been sent successfully');
    }

    public function checkout()
    {
        $bookingDetails = session()->get(auth()->id() . '__booking_details');
        return view('frontend.pages.checkout', compact('bookingDetails'));
    }
    public function profile()
    {
        return view('frontend.pages.profile');
    }
    public function userInformation()
    {
        return view('frontend.pages.user-information');
    }
    public function bookings()
    {
        $bookings = Booking::where('user_id', auth()->id())->orderBy('id', 'desc')->paginate(20);
        return view('frontend.pages.bookings', compact('bookings'));
    }
    public function checkoutSuccess(Request $request)
    {
        // Initialize Stripe with your secret key
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        // Retrieve the session ID from the request
        $sessionId = $request->query('session_id');
        $session = Session::retrieve($sessionId);
        // dd($session);
        $payment = Payment::create([
            'booking_id' => $session->metadata->booking_id,
            'payment_intent_id' => $session->payment_intent,
            'payment_status' => $session->payment_status,
            'amount_total' => $session->amount_total / 100,
            'amount_subtotal' => $session->amount_subtotal / 100,
            'customer' => json_encode($session->customer_details),
        ]);
        if ($payment) {
            $bookingStaus = BookingStatus::create([
                'booking_id' => $session->metadata->booking_id,
                'status' => 'payment_completed',
            ]);
        }
        $booking = Booking::find($session->metadata->booking_id);
        return view('frontend.pages.success', compact('payment', 'booking'));
    }

    public function checkoutCancel(Request $request)
    {
        return view('frontend.pages.cancel');
    }
}
