@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.setting.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @foreach ($settings as $setting)
                    <div class="form-group">
                        <label class="required" for={{ $setting->key }}>{{ trans('cruds.setting.fields.' . $setting->key) }}</label>
                        @if ($setting->key == 'calories_formula')
                            <div class="col-form-label">
                                <button type="button" class="btn btn-primary btn-sm calories-btn" data-value="$protein">Protein</button>
                                <button type="button" class="btn btn-primary btn-sm calories-btn" data-value="$carbohydrate">Carbohydrate</button>
                                <button type="button" class="btn btn-primary btn-sm calories-btn" data-value="$fat">Fat</button>
                            </div>
                        @endif
                        @if ($setting->input_type == 'ckeditor')
                            <textarea class="form-control ckeditor {{ $errors->has($setting->key) ? 'is-invalid' : '' }}" name={{ $setting->key }} id={{ $setting->key }}>{!! old($setting->key, $setting->value) !!}</textarea>
                            @if ($errors->has($setting->key))
                                <div class="invalid-feedback">
                                    {{ $errors->first($setting->key) }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.setting.fields.' . $setting->key . '_helper') }}</span>
                        @else
                            <input class="form-control {{ $errors->has($setting->key) ? 'is-invalid' : '' }}" type={{ $setting->input_type }} name={{ $setting->key }} id={{ $setting->key }} value="{{ old($setting->key, $setting->value) }}" required />
                            @if ($errors->has($setting->key))
                                <div class="invalid-feedback">
                                    {{ $errors->first($setting->key) }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.setting.fields.' . $setting->key . '_helper') }}</span>
                        @endif
                    </div>
                @endforeach
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
        $(document).ready(function() {
            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i],
                );
            }

            // Listen pre-set tag for nutrient button
            var buttons = document.querySelectorAll('.calories-btn');
            buttons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var value = this.getAttribute('data-value');
                    document.getElementById('calories_formula').value += ' ' + value;
                });
            });
        });
    </script>
@endsection
