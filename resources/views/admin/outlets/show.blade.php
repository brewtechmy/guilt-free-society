@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.outlet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.outlets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.id') }}
                        </th>
                        <td>
                            {{ $outlet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.name') }}
                        </th>
                        <td>
                            {{ $outlet->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.address') }}
                        </th>
                        <td>
                            {{ $outlet->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.business_hour') }}
                        </th>
                        <td>
                            {{ $outlet->business_hour }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.embed_map_url') }}
                        </th>
                        <td>
                            {{ $outlet->embed_map_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outlet.fields.photo') }}
                        </th>
                        <td>
                            @if($outlet->photo)
                                <a href="{{ $outlet->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $outlet->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.outlets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection