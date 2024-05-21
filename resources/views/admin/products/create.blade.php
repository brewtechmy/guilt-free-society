@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.product.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="categories">{{ trans('cruds.product.fields.category') }}</label>
                    <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories[]" id="categories">
                        @foreach ($categories as $id => $category)
                            <option value="{{ $id }}" {{ in_array($id, old('categories', [])) ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('categories'))
                        <span class="text-danger">{{ $errors->first('categories') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.category_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="price">{{ trans('cruds.product.fields.price') }} (RM)</label>
                    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                    @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.price_helper') }}</span>
                </div>
                <div class="form-group">
                    <input type="hidden" name="has_ingredient" value="0">
                    <label class="form-check-label" for="has_ingredient"><strong>{{ trans('cruds.product.fields.ingredient') }}</strong></label>
                    <input class="form-check-input" style="margin-top: 0.4rem; margin-left: 0.5rem;" type="checkbox" name="has_ingredient" id="has_ingredient" value="1" checked>
                </div>
                <div id="ingredients-group" class="form-group">
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('ingredients') ? 'is-invalid' : '' }}" name="ingredients[]" id="ingredients" multiple>
                        @foreach ($ingredients as $id => $ingredient)
                            <option value="{{ $id }}" {{ in_array($id, old('ingredients', [])) ? 'selected' : '' }}>{{ $ingredient }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('ingredients'))
                        <span class="text-danger">{{ $errors->first('ingredients') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.ingredient_helper') }}</span>
                </div>
                <div id="calories-group" class="form-group">
                    <label class="required" for="calories">{{ trans('cruds.product.fields.calories') }} (kcal)</label>
                    <input class="form-control {{ $errors->has('calories') ? 'is-invalid' : '' }}" type="number" name="calories" id="calories" value="{{ old('calories', '') }}" step="1">
                    @if ($errors->has('calories'))
                        <span class="text-danger">{{ $errors->first('calories') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.calories_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="photo">{{ trans('cruds.product.fields.photo') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                    </div>
                    @if ($errors->has('photo'))
                        <span class="text-danger">{{ $errors->first('photo') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.photo_helper') }}</span>
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
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.products.storeMedia') }}',
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
                @if (isset($product) && $product->photo)
                    var file = {!! json_encode($product->photo) !!}
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

        function toggleIngredients() {
            if ($('#has_ingredient').is(':checked')) {
                $('#ingredients-group').show();
                $('#ingredients').attr('required', 'required');
                $('#calories-group').hide();
                $('#calories').removeAttr('required');
            } else {
                $('#ingredients-group').hide();
                $('#ingredients').removeAttr('required');
                $('#calories-group').show();
                $('#calories').attr('required', 'required');
            }
        }

        toggleIngredients();

        $('#has_ingredient').change(function() {
            toggleIngredients();
        });
    </script>
@endsection
