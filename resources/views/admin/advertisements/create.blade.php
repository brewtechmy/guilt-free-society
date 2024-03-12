@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.advertisement.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.advertisements.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-10 form-group">
                        <label class="required" for="name">{{ trans('cruds.advertisement.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                            name="name" id="name" value="{{ old('name', '') }}" required />
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.advertisement.fields.name_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="name">{{ trans('cruds.advertisement.fields.position') }}</label>
                        <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="number"
                            name="position" id="position" value="{{ old('position', '') }}" min="1" step="1"
                            required />
                        @if ($errors->has('position'))
                            <span class="text-danger">{{ $errors->first('position') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="required" for="photo">{{ trans('cruds.advertisement.fields.photo') }}
                        (jpeg/jpg/png/gif)</label>
                    <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                    </div>
                    @if ($errors->has('photo'))
                        <span class="text-danger">{{ $errors->first('photo') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.advertisement.fields.photo_helper') }}</span>
                </div>
                <div class="form-group">
                    <button id="submit" class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
                <span class="help-block"><mark>
                        {{ trans('cruds.advertisement.fields.position_helper') }}</mark></span>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.advertisements.storeMedia') }}',
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
            success: function(file, response) {
                $('form').find('input[name="photo"]').remove()
                $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                let submitButton = document.querySelector("#submit");
                _this = this;
                submitButton.addEventListener("click", function(event) {
                    if (_this.files.length != 1) {
                        event.preventDefault();
                        alert("Please upload ONE image.")
                    }
                });
                this.on("addedfile", function() {
                    if (this.files[1] != null) {
                        this.removeFile(this.files[0]);
                    }
                });
                @if (isset($advertisement) && $advertisement->photo)
                    var file = {!! json_encode($advertisement->photo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
