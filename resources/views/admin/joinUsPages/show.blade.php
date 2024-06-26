@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.joinUsPage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.join-us-pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    @if (!$joinUsPage->is_main)
                        <tr>
                            <th>
                                {{ trans('cruds.joinUsPage.fields.title') }}
                            </th>
                            <td>
                                {{ $joinUsPage->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.joinUsPage.fields.position') }}
                            </th>
                            <td>
                                {{ $joinUsPage->position }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.joinUsPage.fields.description') }}
                            </th>
                            <td>
                                {!! $joinUsPage->description !!}
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <th>
                            {{ trans('cruds.joinUsPage.fields.is_main') }}
                        </th>
                        <td>
                            @if ($joinUsPage->is_main)
                                &check;
                            @else
                                &#10005;
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.joinUsPage.fields.photo') }}
                        </th>
                        <td>
                            @if($joinUsPage->photo)
                                <a href="{{ $joinUsPage->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $joinUsPage->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.join-us-pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
