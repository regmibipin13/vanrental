@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.van.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.vans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.van.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.van.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.van.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.van.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.van.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                @if($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.van.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="display_image">{{ trans('cruds.van.fields.display_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('display_image') ? 'is-invalid' : '' }}" id="display_image-dropzone">
                </div>
                @if($errors->has('display_image'))
                    <span class="text-danger">{{ $errors->first('display_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.van.fields.display_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="images">{{ trans('cruds.van.fields.images') }}</label>
                <div class="needsclick dropzone {{ $errors->has('images') ? 'is-invalid' : '' }}" id="images-dropzone">
                </div>
                @if($errors->has('images'))
                    <span class="text-danger">{{ $errors->first('images') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.van.fields.images_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_number_of_vans">{{ trans('cruds.van.fields.total_number_of_vans') }}</label>
                <input class="form-control {{ $errors->has('total_number_of_vans') ? 'is-invalid' : '' }}" type="number" name="total_number_of_vans" id="total_number_of_vans" value="{{ old('total_number_of_vans', '1') }}" step="1">
                @if($errors->has('total_number_of_vans'))
                    <span class="text-danger">{{ $errors->first('total_number_of_vans') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.van.fields.total_number_of_vans_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_enabled') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_enabled" value="0">
                    <input class="form-check-input" type="checkbox" name="is_enabled" id="is_enabled" value="1" {{ old('is_enabled', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_enabled">{{ trans('cruds.van.fields.is_enabled') }}</label>
                </div>
                @if($errors->has('is_enabled'))
                    <span class="text-danger">{{ $errors->first('is_enabled') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.van.fields.is_enabled_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="facilities">{{ trans('cruds.van.fields.facilities') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('facilities') ? 'is-invalid' : '' }}" name="facilities[]" id="facilities" multiple required>
                    @foreach($facilities as $id => $facility)
                        <option value="{{ $id }}" {{ in_array($id, old('facilities', [])) ? 'selected' : '' }}>{{ $facility }}</option>
                    @endforeach
                </select>
                @if($errors->has('facilities'))
                    <span class="text-danger">{{ $errors->first('facilities') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.van.fields.facilities_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.displayImageDropzone = {
    url: '{{ route('admin.vans.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="display_image"]').remove()
      $('form').append('<input type="hidden" name="display_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="display_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($van) && $van->display_image)
      var file = {!! json_encode($van->display_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="display_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    var uploadedImagesMap = {}
Dropzone.options.imagesDropzone = {
    url: '{{ route('admin.vans.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
      uploadedImagesMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedImagesMap[file.name]
      }
      $('form').find('input[name="images[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($van) && $van->images)
      var files = {!! json_encode($van->images) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

</script>
@endsection