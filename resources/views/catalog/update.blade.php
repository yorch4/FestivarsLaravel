@extends('layouts.master')
@section('content')
    <div class="card mx-auto my-5">
        <div class="card-header"><h5>Modificar Festival</h5></div>
        <div class="card-body mt-3">
            <form method="POST" action="{{ url('control/update') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $festival->name }}" required autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">{{ __('Description') }}</label>
                    <textarea style="height: 9rem" id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required>{{$festival->description}}
                    </textarea>
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
                            <input id="allowedAge" type="number" class="form-control @error('allowedAge') is-invalid @enderror" name="allowedAge" value="{{ $festival->allowedAge }}" required>
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
                            <input id="capacity" type="number" class="form-control @error('capacity') is-invalid @enderror" name="capacity" value="{{ $festival->capacity }}" required>
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
                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $festival->date }}" required>
                    @error('date')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo">{{ __('Photo') }}</label>
                    <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ $festival->photo }}" required>
                    @error('photo')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <input type="hidden" value="{{ $festival->id }}" name="idOculto">
                <div class="form-group text-center mt-5 mb-3">
                    <button type="submit" class="btn btn-primary mb-2">
                        {{ __('Modificar') }}
                    </button><br>
                </div>
            </form>
        </div>
    </div>
@endsection
