<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBookingRequest;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\Extra;
use App\Models\User;
use App\Models\Van;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('booking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Booking::with(['van', 'user', 'extras'])->select(sprintf('%s.*', (new Booking)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'booking_show';
                $editGate      = 'booking_edit';
                $deleteGate    = 'booking_delete';
                $crudRoutePart = 'bookings';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('van_name', function ($row) {
                return $row->van ? $row->van->name : '';
            });

            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('pickup_location', function ($row) {
                return $row->pickup_location ? $row->pickup_location : '';
            });
            $table->editColumn('drop_location', function ($row) {
                return $row->drop_location ? $row->drop_location : '';
            });

            $table->editColumn('total_booking_amount', function ($row) {
                return $row->total_booking_amount ? $row->total_booking_amount : '';
            });
            $table->editColumn('extras', function ($row) {
                $labels = [];
                foreach ($row->extras as $extra) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $extra->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'van', 'user', 'extras']);

            return $table->make(true);
        }

        $vans   = Van::get();
        $users  = User::get();
        $extras = Extra::get();

        return view('admin.bookings.index', compact('vans', 'users', 'extras'));
    }

    public function create()
    {
        abort_if(Gate::denies('booking_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vans = Van::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $extras = Extra::pluck('name', 'id');

        return view('admin.bookings.create', compact('extras', 'users', 'vans'));
    }

    public function store(StoreBookingRequest $request)
    {
        $booking = Booking::create($request->all());
        $booking->extras()->sync($request->input('extras', []));

        return redirect()->route('admin.bookings.index');
    }

    public function edit(Booking $booking)
    {
        abort_if(Gate::denies('booking_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vans = Van::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $extras = Extra::pluck('name', 'id');

        $booking->load('van', 'user', 'extras');

        return view('admin.bookings.edit', compact('booking', 'extras', 'users', 'vans'));
    }

    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $booking->update($request->all());
        $booking->extras()->sync($request->input('extras', []));

        return redirect()->route('admin.bookings.index');
    }

    public function show(Booking $booking)
    {
        abort_if(Gate::denies('booking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $booking->load('van', 'user', 'extras');

        return view('admin.bookings.show', compact('booking'));
    }

    public function destroy(Booking $booking)
    {
        abort_if(Gate::denies('booking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $booking->statuses->each->delete();

        $booking->delete();

        return back();
    }

    public function massDestroy(MassDestroyBookingRequest $request)
    {
        $bookings = Booking::find(request('ids'));

        foreach ($bookings as $booking) {
            $booking->statuses->each->delete();
            $booking->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
