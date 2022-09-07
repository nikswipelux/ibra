@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.playtoearn.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.playtoearns.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="project_link">{{ trans('cruds.playtoearn.fields.project_link') }}</label>
                <input class="form-control {{ $errors->has('project_link') ? 'is-invalid' : '' }}" type="text" name="project_link" id="project_link" value="{{ old('project_link', '') }}">
                @if($errors->has('project_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.playtoearn.fields.project_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.playtoearn.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.playtoearn.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.playtoearn.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}">
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.playtoearn.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nft_support">{{ trans('cruds.playtoearn.fields.nft_support') }}</label>
                <input class="form-control {{ $errors->has('nft_support') ? 'is-invalid' : '' }}" type="text" name="nft_support" id="nft_support" value="{{ old('nft_support', '') }}">
                @if($errors->has('nft_support'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nft_support') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.playtoearn.fields.nft_support_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="blockchain">{{ trans('cruds.playtoearn.fields.blockchain') }}</label>
                <input class="form-control {{ $errors->has('blockchain') ? 'is-invalid' : '' }}" type="text" name="blockchain" id="blockchain" value="{{ old('blockchain', '') }}">
                @if($errors->has('blockchain'))
                    <div class="invalid-feedback">
                        {{ $errors->first('blockchain') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.playtoearn.fields.blockchain_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website">{{ trans('cruds.playtoearn.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', '') }}">
                @if($errors->has('website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('website') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.playtoearn.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.playtoearn.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', '') }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.playtoearn.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discord">{{ trans('cruds.playtoearn.fields.discord') }}</label>
                <input class="form-control {{ $errors->has('discord') ? 'is-invalid' : '' }}" type="text" name="discord" id="discord" value="{{ old('discord', '') }}">
                @if($errors->has('discord'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discord') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.playtoearn.fields.discord_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telegram">{{ trans('cruds.playtoearn.fields.telegram') }}</label>
                <input class="form-control {{ $errors->has('telegram') ? 'is-invalid' : '' }}" type="text" name="telegram" id="telegram" value="{{ old('telegram', '') }}">
                @if($errors->has('telegram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telegram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.playtoearn.fields.telegram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_rank">{{ trans('cruds.playtoearn.fields.total_rank') }}</label>
                <input class="form-control {{ $errors->has('total_rank') ? 'is-invalid' : '' }}" type="number" name="total_rank" id="total_rank" value="{{ old('total_rank', '') }}" step="1">
                @if($errors->has('total_rank'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_rank') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.playtoearn.fields.total_rank_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection