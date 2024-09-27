@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.van.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.van.fields.id') }}
                        </th>
                        <td>
                            {{ $van->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.van.fields.name') }}
                        </th>
                        <td>
                            {{ $van->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.van.fields.category') }}
                        </th>
                        <td>
                            {{ $van->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.van.fields.price') }}
                        </th>
                        <td>
                            {{ $van->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.van.fields.display_image') }}
                        </th>
                        <td>
                            @if($van->display_image)
                                <a href="{{ $van->display_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $van->display_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.van.fields.images') }}
                        </th>
                        <td>
                            @foreach($van->images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.van.fields.total_number_of_vans') }}
                        </th>
                        <td>
                            {{ $van->total_number_of_vans }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.van.fields.is_enabled') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $van->is_enabled ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.van.fields.facilities') }}
                        </th>
                        <td>
                            @foreach($van->facilities as $key => $facilities)
                                <span class="label label-info">{{ $facilities->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection