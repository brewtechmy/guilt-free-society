@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.section.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.sections.update') }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @foreach ($sections as $section)
                    <div class="form-group">
                        <label class="required" for={{ $section->key }}>{{ trans('cruds.section.fields.' . $section->key) }}
                            {{ $section->input_type == 'image' ? '(jpeg/jpg/png/gif)' : '' }}</label>
                        @if ($section->input_type == 'ckeditor')
                            <textarea class="form-control ckeditor {{ $errors->has($section->key) ? 'is-invalid' : '' }}" name={{ $section->key }}
                                id={{ $section->key }}>{!! old($section->key, $section->value) !!}</textarea>
                            @if ($errors->has($section->key))
                                <div class="invalid-feedback">
                                    {{ $errors->first($section->key) }}
                                </div>
                            @endif
                            <span
                                class="help-block">{{ trans('cruds.section.fields.' . $section->key . '_helper') }}</span>
                        @elseif ($section->input_type == 'text' || $section->input_type == 'number')
                            <input class="form-control {{ $errors->has($section->key) ? 'is-invalid' : '' }}"
                                type={{ $section->input_type }} name={{ $section->key }} id={{ $section->key }}
                                value="{{ old($section->key, $section->value) }}" required />
                            @if ($errors->has($section->key))
                                <div class="invalid-feedback">
                                    {{ $errors->first($section->key) }}
                                </div>
                            @endif
                            <span
                                class="help-block">{{ trans('cruds.section.fields.' . $section->key . '_helper') }}</span>
                        @elseif ($section->input_type == 'image')
                            <div class="needsclick dropzone {{ $errors->has($section->key) ? 'is-invalid' : '' }}"
                                id="{{ $section->key }}-dropzone">
                                @if ($errors->has($section->key))
                                    <div class="invalid-feedback">
                                        {{ $errors->first($section->key) }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.section.fields.' . $section->key . '_helper') }}</span>
                            @else
                                <div>Contact Administrator for assistance.</div>
                        @endif
                    </div>
                @endforeach
                <div class="form-group">
                    <button class="btn btn-danger" id="submit" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var globalFiles = {}
        $(document).ready(function() {
            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i],
                );
            }

            let submitButton = document.getElementById("submit");
            submitButton.addEventListener("click", function(event) {
                let hasEmptyFileMessage = null
                for (const fileKey in globalFiles) {
                    if (globalFiles[fileKey].files.length != 1) {
                        event.preventDefault();
                        event.stopPropagation();
                        hasEmptyFileMessage = `Please upload ONE image for ${fileKey.split("_")
  .map((x) => (x.charAt(0).toUpperCase() + x.slice(1)))
  .join(" ")}.`
                        break;
                    }
                }
                if (hasEmptyFileMessage) alert(hasEmptyFileMessage)
            });
        });

        @foreach ($sections as $section)
            var inputType = {!! json_encode($section->input_type) !!}
            var key = {!! json_encode($section->key) !!}
            if (inputType == 'image') {
                globalFiles[key] = {
                    files: []
                }
                var camelKey = key.toLowerCase().replace(/([-_][a-z])/g, group =>
                    group
                    .toUpperCase()
                    .replace('-', '')
                    .replace('_', '')
                )
                Dropzone.options[`${camelKey}Dropzone`] = {
                    url: '{{ route('admin.sections.storeMedia') }}',
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
                        var id = this.element.id
                        var key = id.split("-")[0]
                        $('form').find(`input[name="${key}"]`).remove()
                        $('form').append(`<input type="hidden" name="${key}" value="` + response.name +
                            '">')
                    },
                    removedfile: function(file) {
                        var id = this.element.id
                        var key = id.split("-")[0]
                        file.previewElement.remove()
                        if (file.status !== 'error') {
                            $('form').find(`input[name="${key}"]`).remove()
                            globalFiles[key].files.shift()
                            this.options.maxFiles = this.options.maxFiles + 1
                        }
                    },
                    init: function() {
                        this.on("addedfile", function() {
                            var id = this.element.id
                            var key = id.split("-")[0]
                            globalFiles[key].files.push(file)
                            if (globalFiles[key].files[1] != null) {
                                this.removeFile(globalFiles[key].files[0]);
                            }
                        });
                        @if ($section->photo)
                            var file = {!! json_encode($section->photo) !!}
                            var key = {!! json_encode($section->key) !!}
                            this.options.addedfile.call(this, file)
                            this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                            globalFiles[key].files.push(file)
                            file.previewElement.classList.add('dz-complete')
                            $('form').append(`<input type="hidden" name="${key}" value="${file.file_name}">`)
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
            }
        @endforeach
    </script>
@endsection
