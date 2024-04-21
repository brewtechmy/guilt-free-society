@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.ingredient.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ingredients.update", [$ingredient->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.ingredient.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $ingredient->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingredient.fields.name_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label for="description">{{ trans('cruds.ingredient.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $ingredient->description) }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingredient.fields.description_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.ingredient.fields.quantity') }} (g)</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $ingredient->quantity) }}" step="0.01" required>
                @if($errors->has('quantity'))
                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingredient.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="protein">{{ trans('cruds.ingredient.fields.protein') }} (g)</label>
                <input class="form-control {{ $errors->has('protein') ? 'is-invalid' : '' }}" type="number" name="protein" id="protein" value="{{ old('protein', $ingredient->protein) }}" step="0.01" required>
                @if($errors->has('protein'))
                    <span class="text-danger">{{ $errors->first('protein') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingredient.fields.protein_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="carbohydrate">{{ trans('cruds.ingredient.fields.carbohydrate') }} (g)</label>
                <input class="form-control {{ $errors->has('carbohydrate') ? 'is-invalid' : '' }}" type="number" name="carbohydrate" id="carbohydrate" value="{{ old('carbohydrate', $ingredient->carbohydrate) }}" step="0.01" required>
                @if($errors->has('carbohydrate'))
                    <span class="text-danger">{{ $errors->first('carbohydrate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingredient.fields.carbohydrate_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fat">{{ trans('cruds.ingredient.fields.fat') }} (g)</label>
                <input class="form-control {{ $errors->has('fat') ? 'is-invalid' : '' }}" type="number" name="fat" id="fat" value="{{ old('fat', $ingredient->fat) }}" step="0.01" required>
                @if($errors->has('fat'))
                    <span class="text-danger">{{ $errors->first('fat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingredient.fields.fat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="calories">{{ trans('cruds.ingredient.fields.calories') }} (kcal)</label>
                <input class="form-control {{ $errors->has('calories') ? 'is-invalid' : '' }}" type="number" name="calories" id="calories" value="{{ old('calories', $ingredient->calories) }}" step="0.01" required>
                @if($errors->has('calories'))
                    <span class="text-danger">{{ $errors->first('calories') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingredient.fields.calories_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="categories">{{ trans('cruds.ingredient.fields.category') }}</label>
                {{-- <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div> --}}
                <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories[]" id="categories">
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || $ingredient->categories->contains($id)) ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <span class="text-danger">{{ $errors->first('categories') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingredient.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.ingredient.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingredient.fields.photo_helper') }}</span>
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
    url: '{{ route('admin.ingredients.storeMedia') }}',
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
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($ingredient) && $ingredient->photo)
      var file = {!! json_encode($ingredient->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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
@endsection