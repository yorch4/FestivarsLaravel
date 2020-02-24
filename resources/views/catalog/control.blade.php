@extends('layouts.master')
@section('content')
    <form action="{{url('control/add')}}" method="get">
        {{ csrf_field() }}
        <input type="submit" value="Añadir Festival" class="btn btn-primary mt-3">
    </form>
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
                            <div class="row">
                                <div class="col-sm-6">
                                    <form action="{{url('control/update', ['id' => $festival->id])}}" method="get">
                                        {{ csrf_field() }}
                                        <input type="submit" value="Modificar" class="btn btn-primary">
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <form action="{{url('control/delete', ['id' => $festival->id])}}" method="get">
                                        {{ csrf_field() }}
                                        <input type="submit" value="Eliminar" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminarlo?')">
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

