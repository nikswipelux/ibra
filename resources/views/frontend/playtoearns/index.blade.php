@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('playtoearn_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.playtoearns.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.playtoearn.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Playtoearn', 'route' => 'admin.playtoearns.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.playtoearn.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Playtoearn">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.blockchain') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.website') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.twitter') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.discord') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.telegram') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($playtoearns as $key => $playtoearn)
                                    <tr data-entry-id="{{ $playtoearn->id }}">
                                        <td>
                                            {{ $playtoearn->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $playtoearn->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $playtoearn->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $playtoearn->blockchain ?? '' }}
                                        </td>
                                        <td>
                                            {{ $playtoearn->website ?? '' }}
                                        </td>
                                        <td>
                                            {{ $playtoearn->twitter ?? '' }}
                                        </td>
                                        <td>
                                            {{ $playtoearn->discord ?? '' }}
                                        </td>
                                        <td>
                                            {{ $playtoearn->telegram ?? '' }}
                                        </td>
                                        <td>
                                            @can('playtoearn_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.playtoearns.show', $playtoearn->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('playtoearn_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.playtoearns.edit', $playtoearn->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('playtoearn_delete')
                                                <form action="{{ route('frontend.playtoearns.destroy', $playtoearn->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('playtoearn_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.playtoearns.massDestroy') }}",
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
  let table = $('.datatable-Playtoearn:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection