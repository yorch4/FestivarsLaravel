@extends('layouts.master')
@section('content')
    <div class="card mx-auto my-5">
        <div class="card-header"><h5>{{ __('Login') }}</h5></div>
        <div class="card-body mt-3">
            <form method="POST" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @if(isset($error)) is-invalid @endif" name="name" value="{{ old('name') }}" required autofocus>
                    @if(isset($error))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $error }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">{{ __('Description') }}</label>
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="allowedAge">{{ __('Allowed Age') }}</label>
                            <input id="allowedAge" type="number" class="form-control @error('allowedAge') is-invalid @enderror" name="allowedAge" value="{{ old('allowedAge') }}" required>
                            @error('allowedAge')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="capacity">{{ __('Capacity') }}</label>
                            <input id="capacity" type="number" class="form-control @error('capacity') is-invalid @enderror" name="capacity" value="{{ old('capacity') }}" required>
                            @error('capacity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date">{{ __('Date') }}</label>
                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required>
                    @error('date')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo">{{ __('Photo') }}</label>
                    <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" required>
                    @error('photo')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group text-center mt-5 mb-3">
                    <button type="submit" class="btn btn-primary mb-2">
                        {{ __('Añadir') }}
                    </button><br>
                </div>
            </form>
        </div>
    </div>
@endsection
