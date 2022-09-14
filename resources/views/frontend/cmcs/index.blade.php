@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('cmc_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.cmcs.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.cmc.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.cmc.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Cmc">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cmc.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cmc.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cmc.fields.website') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cmc.fields.telegram') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cmc.fields.twitter') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cmc.fields.discord') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cmc.fields.price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cmc.fields.market_cap') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cmcs as $key => $cmc)
                                    <tr data-entry-id="{{ $cmc->id }}">
                                        <td>
                                            {{ $cmc->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cmc->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cmc->website ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cmc->telegram ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cmc->twitter ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cmc->discord ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cmc->price ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cmc->market_cap ?? '' }}
                                        </td>
                                        <td>
                                            @can('cmc_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.cmcs.show', $cmc->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('cmc_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.cmcs.edit', $cmc->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('cmc_delete')
                                                <form action="{{ route('frontend.cmcs.destroy', $cmc->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('cmc_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.cmcs.massDestroy') }}",
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
  let table = $('.datatable-Cmc:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection