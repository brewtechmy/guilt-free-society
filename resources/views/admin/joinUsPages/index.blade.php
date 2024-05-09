@extends('layouts.admin')
@section('content')
@can('join_us_page_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.join-us-pages.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.joinUsPage.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.joinUsPage.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-JoinUsPage">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.joinUsPage.fields.position') }}
                        </th>
                        <th>
                            {{ trans('cruds.joinUsPage.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.joinUsPage.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.joinUsPage.fields.is_main') }}
                        </th>
                        <th>
                            {{ trans('cruds.joinUsPage.fields.photo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($joinUsPages as $key => $joinUsPage)
                        <tr data-entry-id="{{ $joinUsPage->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $joinUsPage->position ?? 'Main' }}
                            </td>
                            <td>
                                {{ $joinUsPage->title ?? '' }}
                            </td>
                            <td>
                                {!! $joinUsPage->description ?? '' !!}
                            </td>
                            <td>
                                @if ($joinUsPage->is_main)
                                    &check;
                                @else
                                    &#10005;
                                @endif
                            </td>
                            <td>
                                @if($joinUsPage->photo)
                                    <a href="{{ $joinUsPage->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $joinUsPage->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('join_us_page_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.join-us-pages.show', $joinUsPage->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('join_us_page_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.join-us-pages.edit', $joinUsPage->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @if (!$joinUsPage->is_main)
                                    @can('join_us_page_delete')
                                        <form action="{{ route('admin.join-us-pages.destroy', $joinUsPage->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan
                                @endif

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('join_us_page_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.join-us-pages.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-JoinUsPage:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
