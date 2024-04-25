@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ingredientCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ingredient-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ingredientCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $ingredientCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingredientCategory.fields.name') }}
                        </th>
                        <td>
                            {{ $ingredientCategory->name }}
                        </td>
                    </tr>
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.ingredientCategory.fields.description') }}
                        </th>
                        <td>
                            {{ $ingredientCategory->description }}
                        </td>
                    </tr> --}}
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.ingredientCategory.fields.photo') }}
                        </th>
                        <td>
                            @if($ingredientCategory->photo)
                                <a href="{{ $ingredientCategory->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $ingredientCategory->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr> --}}
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ingredient-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection