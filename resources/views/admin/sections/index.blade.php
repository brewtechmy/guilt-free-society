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
                        <label class="required"
                            for={{ $section->key }}>{{ trans('cruds.section.fields.' . $section->key) }}</label>
                        <input class="form-control {{ $errors->has($section->key) ? 'is-invalid' : '' }}" type="number"
                            name={{ $section->key }} id={{ $section->key }}
                            value="{{ old($section->key, $section->value) }}" required />
                        @if ($errors->has($section->key))
                            <div class="invalid-feedback">
                                {{ $errors->first($section->key) }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.section.fields.'.$section->key.'_helper') }}</span>
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
