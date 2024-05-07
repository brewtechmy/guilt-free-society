@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.outlet.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.outlets.update', [$outlet->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">{{ trans('cruds.outlet.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $outlet->name) }}">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.outlet.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="address">{{ trans('cruds.outlet.fields.address') }}</label>
                    <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address', $outlet->address) }}</textarea>
                    @if ($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.outlet.fields.address_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="business_hour">{{ trans('cruds.outlet.fields.business_hour') }}</label>
                    <input class="form-control {{ $errors->has('business_hour') ? 'is-invalid' : '' }}" type="text" name="business_hour" id="business_hour" value="{{ old('business_hour', $outlet->business_hour) }}">
                    @if ($errors->has('business_hour'))
                        <div class="invalid-feedback">
                            {{ $errors->first('business_hour') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.outlet.fields.business_hour_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="contact_no">{{ trans('cruds.outlet.fields.contact_no') }}</label>
                    <input class="form-control {{ $errors->has('contact_no') ? 'is-invalid' : '' }}" type="text" name="contact_no" id="contact_no" value="{{ old('contact_no', $outlet->contact_no) }}">
                    @if ($errors->has('contact_no'))
                        <div class="invalid-feedback">
                            {{ $errors->first('contact_no') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.outlet.fields.contact_no_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="embed_map_url">{{ trans('cruds.outlet.fields.embed_map_url') }}</label>
                    <textarea class="form-control {{ $errors->has('embed_map_url') ? 'is-invalid' : '' }}" name="embed_map_url" id="embed_map_url" onkeyup="showPreview()">{{ old('embed_map_url', $outlet->embed_map_url) }}</textarea>
                    @if ($errors->has('embed_map_url'))
                        <div class="invalid-feedback">
                            {{ $errors->first('embed_map_url') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.outlet.fields.embed_map_url_helper') }}</span>
                </div>
                <div class="form-group" id="previewMap">
                    {!! $outlet->embed_map_url !!}
                </div>
                <div class="form-group">
                    <label for="photo">{{ trans('cruds.outlet.fields.photo') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                    </div>
                    @if ($errors->has('photo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('photo') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.outlet.fields.photo_helper') }}</span>
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
        function showPreview() {
            var embedContent = document.getElementById("embed_map_url").value;
            if (embedContent.trim().startsWith("<iframe")) {
                document.getElementById("previewMap").innerHTML = embedContent;
            } else {
                document.getElementById("previewMap").innerHTML = "<span style='color: red; font-weight: bold;'>NOT VALID EMBEDDED IFRAME LINK!!!</span>";
            }
        }
    </script>
    <script>
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.outlets.storeMedia') }}',
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
                @if (isset($outlet) && $outlet->photo)
                    var file = {!! json_encode($outlet->photo) !!}
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
