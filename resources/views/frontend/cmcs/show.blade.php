@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.cmc.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.cmcs.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cmc.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $cmc->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cmc.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $cmc->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cmc.fields.website') }}
                                    </th>
                                    <td>
                                        {{ $cmc->website }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cmc.fields.telegram') }}
                                    </th>
                                    <td>
                                        {{ $cmc->telegram }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cmc.fields.twitter') }}
                                    </th>
                                    <td>
                                        {{ $cmc->twitter }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cmc.fields.discord') }}
                                    </th>
                                    <td>
                                        {{ $cmc->discord }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cmc.fields.price') }}
                                    </th>
                                    <td>
                                        {{ $cmc->price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cmc.fields.market_cap') }}
                                    </th>
                                    <td>
                                        {{ $cmc->market_cap }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cmc.fields.cmc_link') }}
                                    </th>
                                    <td>
                                        {{ $cmc->cmc_link }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.cmcs.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection