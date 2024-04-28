@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ingredient.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ingredients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        {{-- <th>
                            {{ trans('cruds.ingredient.fields.id') }}
                        </th> --}}
                        {{-- <td>
                            {{ $ingredient->id }}
                        </td> --}}
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingredient.fields.name') }}
                        </th>
                        <td>
                            {{ $ingredient->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingredient.fields.quantity') }} (g)
                        </th>
                        <td>
                            {{ $ingredient->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingredient.fields.protein') }} (g)
                        </th>
                        <td>
                            {{ $ingredient->protein }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingredient.fields.carbohydrate') }} (g)
                        </th>
                        <td>
                            {{ $ingredient->carbohydrate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingredient.fields.fat') }} (g)
                        </th>
                        <td>
                            {{ $ingredient->fat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingredient.fields.category') }}
                        </th>
                        <td>
                            @foreach($ingredient->categories as $key => $category)
                                <span class="label label-info">{{ $category->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingredient.fields.photo') }}
                        </th>
                        <td>
                            @if($ingredient->photo)
                                <a href="{{ $ingredient->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $ingredient->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ingredients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection