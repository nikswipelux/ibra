@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.cmc.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.cmcs.update", [$cmc->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.cmc.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $cmc->name) }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cmc.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="website">{{ trans('cruds.cmc.fields.website') }}</label>
                            <input class="form-control" type="text" name="website" id="website" value="{{ old('website', $cmc->website) }}" required>
                            @if($errors->has('website'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('website') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cmc.fields.website_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="telegram">{{ trans('cruds.cmc.fields.telegram') }}</label>
                            <input class="form-control" type="text" name="telegram" id="telegram" value="{{ old('telegram', $cmc->telegram) }}">
                            @if($errors->has('telegram'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('telegram') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cmc.fields.telegram_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="twitter">{{ trans('cruds.cmc.fields.twitter') }}</label>
                            <input class="form-control" type="text" name="twitter" id="twitter" value="{{ old('twitter', $cmc->twitter) }}">
                            @if($errors->has('twitter'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('twitter') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cmc.fields.twitter_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="discord">{{ trans('cruds.cmc.fields.discord') }}</label>
                            <input class="form-control" type="text" name="discord" id="discord" value="{{ old('discord', $cmc->discord) }}">
                            @if($errors->has('discord'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('discord') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cmc.fields.discord_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="price">{{ trans('cruds.cmc.fields.price') }}</label>
                            <input class="form-control" type="text" name="price" id="price" value="{{ old('price', $cmc->price) }}">
                            @if($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cmc.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="market_cap">{{ trans('cruds.cmc.fields.market_cap') }}</label>
                            <input class="form-control" type="text" name="market_cap" id="market_cap" value="{{ old('market_cap', $cmc->market_cap) }}">
                            @if($errors->has('market_cap'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('market_cap') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cmc.fields.market_cap_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="cmc_link">{{ trans('cruds.cmc.fields.cmc_link') }}</label>
                            <input class="form-control" type="text" name="cmc_link" id="cmc_link" value="{{ old('cmc_link', $cmc->cmc_link) }}">
                            @if($errors->has('cmc_link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cmc_link') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cmc.fields.cmc_link_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection