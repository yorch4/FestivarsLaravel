@extends('layouts.master')
@section('content')
    <div class="row mb-3">
        @foreach($arrayFestivals as	$key =>	$festival)
            <div class="col-sm-4 mt-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{$festival->photo}}" style="height: 10rem">
                    <hr>
                    <div class="card-body">
                        <h5 class="card-title text-center" style="color: #e18508 !important; font-size: 1.1rem">{{$festival->name}}</h5>
                        <p class="card-text" style="color: black !important;">{{$festival->description}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

