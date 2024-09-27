<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBookingStatusRequest;
use App\Http\Requests\StoreBookingStatusRequest;
use App\Http\Requests\UpdateBookingStatusRequest;
use App\Models\Booking;
use App\Models\BookingStatus;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BookingStatusController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('booking_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BookingStatus::with(['booking'])->select(sprintf('%s.*', (new BookingStatus)->table));
            $table = Datatables::of($query);
            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'booking_status_show';
                $editGate      = 'booking_status_edit';
                $deleteGate    = 'booking_status_delete';
                $crudRoutePart = 'booking-statuses';

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
            $table->addColumn('booking_pickup_location', function ($row) {
                return $row->booking ? $row->booking->pickup_location : '';
            });

            $table->editColumn('booking.drop_location', function ($row) {
                return $row->booking ? (is_string($row->booking) ? $row->booking : $row->booking->drop_location) : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? BookingStatus::STATUS_SELECT[$row->status] : '';
            });
            $table->addColumn('date', function ($row) {
                return $row->created_at->format('Y-m-d H:I:A');
            });


            $table->rawColumns(['actions', 'placeholder', 'booking']);

            return $table->make(true);
        }

        $bookings = Booking::get();

        return view('admin.bookingStatuses.index', compact('bookings'));
    }

    public function create()
    {
        abort_if(Gate::denies('booking_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookings = Booking::pluck('pickup_location', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bookingStatuses.create', compact('bookings'));
    }

    public function store(StoreBookingStatusRequest $request)
    {
        $bookingStatus = BookingStatus::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $bookingStatus->id]);
        }

        return redirect()->route('admin.booking-statuses.index');
    }

    public function edit(BookingStatus $bookingStatus)
    {
        abort_if(Gate::denies('booking_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookings = Booking::pluck('pickup_location', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bookingStatus->load('booking');

        return view('admin.bookingStatuses.edit', compact('bookingStatus', 'bookings'));
    }

    public function update(UpdateBookingStatusRequest $request, BookingStatus $bookingStatus)
    {
        $bookingStatus->update($request->all());

        return redirect()->route('admin.booking-statuses.index');
    }

    public function show(BookingStatus $bookingStatus)
    {
        abort_if(Gate::denies('booking_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookingStatus->load('booking');

        return view('admin.bookingStatuses.show', compact('bookingStatus'));
    }

    public function destroy(BookingStatus $bookingStatus)
    {
        abort_if(Gate::denies('booking_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookingStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyBookingStatusRequest $request)
    {
        $bookingStatuses = BookingStatus::find(request('ids'));

        foreach ($bookingStatuses as $bookingStatus) {
            $bookingStatus->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('booking_status_create') && Gate::denies('booking_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BookingStatus();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
