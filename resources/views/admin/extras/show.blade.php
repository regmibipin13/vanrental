@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.extra.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.extras.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.extra.fields.id') }}
                        </th>
                        <td>
                            {{ $extra->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.extra.fields.name') }}
                        </th>
                        <td>
                            {{ $extra->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.extra.fields.price') }}
                        </th>
                        <td>
                            {{ $extra->price }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.extras.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection