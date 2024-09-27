@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.testimonial.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.testimonials.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.testimonial.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.testimonial.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rent_details">{{ trans('cruds.testimonial.fields.rent_details') }}</label>
                <input class="form-control {{ $errors->has('rent_details') ? 'is-invalid' : '' }}" type="text" name="rent_details" id="rent_details" value="{{ old('rent_details', '') }}">
                @if($errors->has('rent_details'))
                    <span class="text-danger">{{ $errors->first('rent_details') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.testimonial.fields.rent_details_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="review">{{ trans('cruds.testimonial.fields.review') }}</label>
                <textarea class="form-control {{ $errors->has('review') ? 'is-invalid' : '' }}" name="review" id="review" required>{{ old('review') }}</textarea>
                @if($errors->has('review'))
                    <span class="text-danger">{{ $errors->first('review') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.testimonial.fields.review_helper') }}</span>
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