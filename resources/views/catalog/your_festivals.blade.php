@extends('layouts.master')
@section('content')
    @if(count($arrayFestivals) == 0)
        <p class="text-center mt-3">
            Aún no sigues festivales
        </p>
    @endif
    <div class="row mb-3">
        @foreach($arrayFestivals as	$key =>	$festival)
            <div class="col-sm-4 mt-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{$festival->photo}}" style="height: 10rem">
                    <hr>
                    <div class="card-body">
                        <h5 class="card-title  text-center" style="color: #e18508 !important; font-size: 1.1rem">{{$festival->name}}</h5>
                        <p class="card-text">
                        <ul class="list-unstyled ml-5 pl-4" style="color: black !important;">
                            <li><i class="fa fa-users mr-2"></i>{{$festival->capacity}}</li>
                            <li><i class="fa fa-calendar mr-2"></i>{{$festival->date}} </li>
                            <li><i class="fa fa-ban"></i>{{$festival->allowedAge}}</li>
                        </ul>
                        </p>
                        <div class="text-center">
                            <form action="" method="post">
                            {{ csrf_field() }}
                                <input type="hidden" name="festivalOculto" value="{{$festival->id}}">
                                <input type="submit" name="dejarDeSeguir" value="Dejar de Seguir" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
