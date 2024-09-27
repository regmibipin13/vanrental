@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.facility.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.facilities.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.facility.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="svg_code">{{ trans('cruds.facility.fields.svg_code') }}</label>
                <textarea class="form-control {{ $errors->has('svg_code') ? 'is-invalid' : '' }}" name="svg_code" id="svg_code">{{ old('svg_code') }}</textarea>
                @if($errors->has('svg_code'))
                    <span class="text-danger">{{ $errors->first('svg_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.svg_code_helper') }}</span>
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