@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.booking.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bookings.update", [$booking->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="van_id">{{ trans('cruds.booking.fields.van') }}</label>
                <select class="form-control select2 {{ $errors->has('van') ? 'is-invalid' : '' }}" name="van_id" id="van_id" required>
                    @foreach($vans as $id => $entry)
                        <option value="{{ $id }}" {{ (old('van_id') ? old('van_id') : $booking->van->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('van'))
                    <span class="text-danger">{{ $errors->first('van') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.van_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.booking.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $booking->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pickup_location">{{ trans('cruds.booking.fields.pickup_location') }}</label>
                <input class="form-control {{ $errors->has('pickup_location') ? 'is-invalid' : '' }}" type="text" name="pickup_location" id="pickup_location" value="{{ old('pickup_location', $booking->pickup_location) }}">
                @if($errors->has('pickup_location'))
                    <span class="text-danger">{{ $errors->first('pickup_location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.pickup_location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="drop_location">{{ trans('cruds.booking.fields.drop_location') }}</label>
                <input class="form-control {{ $errors->has('drop_location') ? 'is-invalid' : '' }}" type="text" name="drop_location" id="drop_location" value="{{ old('drop_location', $booking->drop_location) }}">
                @if($errors->has('drop_location'))
                    <span class="text-danger">{{ $errors->first('drop_location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.drop_location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pickup_date">{{ trans('cruds.booking.fields.pickup_date') }}</label>
                <input class="form-control datetime {{ $errors->has('pickup_date') ? 'is-invalid' : '' }}" type="text" name="pickup_date" id="pickup_date" value="{{ old('pickup_date', $booking->pickup_date) }}">
                @if($errors->has('pickup_date'))
                    <span class="text-danger">{{ $errors->first('pickup_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.pickup_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="drop_date">{{ trans('cruds.booking.fields.drop_date') }}</label>
                <input class="form-control datetime {{ $errors->has('drop_date') ? 'is-invalid' : '' }}" type="text" name="drop_date" id="drop_date" value="{{ old('drop_date', $booking->drop_date) }}" required>
                @if($errors->has('drop_date'))
                    <span class="text-danger">{{ $errors->first('drop_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.drop_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_booking_amount">{{ trans('cruds.booking.fields.total_booking_amount') }}</label>
                <input class="form-control {{ $errors->has('total_booking_amount') ? 'is-invalid' : '' }}" type="number" name="total_booking_amount" id="total_booking_amount" value="{{ old('total_booking_amount', $booking->total_booking_amount) }}" step="0.01" required>
                @if($errors->has('total_booking_amount'))
                    <span class="text-danger">{{ $errors->first('total_booking_amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.total_booking_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="extras">{{ trans('cruds.booking.fields.extras') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('extras') ? 'is-invalid' : '' }}" name="extras[]" id="extras" multiple>
                    @foreach($extras as $id => $extra)
                        <option value="{{ $id }}" {{ (in_array($id, old('extras', [])) || $booking->extras->contains($id)) ? 'selected' : '' }}>{{ $extra }}</option>
                    @endforeach
                </select>
                @if($errors->has('extras'))
                    <span class="text-danger">{{ $errors->first('extras') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.extras_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection