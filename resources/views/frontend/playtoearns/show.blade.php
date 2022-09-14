@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.playtoearn.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.playtoearns.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $playtoearn->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.project_link') }}
                                    </th>
                                    <td>
                                        {{ $playtoearn->project_link }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $playtoearn->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $playtoearn->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.nft_support') }}
                                    </th>
                                    <td>
                                        {{ $playtoearn->nft_support }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.blockchain') }}
                                    </th>
                                    <td>
                                        {{ $playtoearn->blockchain }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.website') }}
                                    </th>
                                    <td>
                                        {{ $playtoearn->website }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.twitter') }}
                                    </th>
                                    <td>
                                        {{ $playtoearn->twitter }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.discord') }}
                                    </th>
                                    <td>
                                        {{ $playtoearn->discord }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.telegram') }}
                                    </th>
                                    <td>
                                        {{ $playtoearn->telegram }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.playtoearn.fields.total_rank') }}
                                    </th>
                                    <td>
                                        {{ $playtoearn->total_rank }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.playtoearns.index') }}">
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