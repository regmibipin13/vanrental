@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.category.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.category.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_seats">{{ trans('cruds.category.fields.total_seats') }}</label>
                <input class="form-control {{ $errors->has('total_seats') ? 'is-invalid' : '' }}" type="number" name="total_seats" id="total_seats" value="{{ old('total_seats', '') }}" step="1">
                @if($errors->has('total_seats'))
                    <span class="text-danger">{{ $errors->first('total_seats') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.total_seats_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facilities">{{ trans('cruds.category.fields.facilities') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('facilities') ? 'is-invalid' : '' }}" name="facilities[]" id="facilities" multiple>
                    @foreach($facilities as $id => $facility)
                        <option value="{{ $id }}" {{ in_array($id, old('facilities', [])) ? 'selected' : '' }}>{{ $facility }}</option>
                    @endforeach
                </select>
                @if($errors->has('facilities'))
                    <span class="text-danger">{{ $errors->first('facilities') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.facilities_helper') }}</span>
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