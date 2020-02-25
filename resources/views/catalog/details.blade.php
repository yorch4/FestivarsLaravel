@extends('layouts.master')
@section('content')
    <div class="card mx-auto my-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="text-center">
                        <img src="{{url($festival->photo)}}" class="img-circle img-thumbnail">
                    </div></hr><br>
                </div>
                <div class="col-sm-9 text-left" style="color: black;">
                    <div class="tab-content">
                        <hr>
                        <h3 class="text-title"> {{$festival->name}} </h3>
                        <p>{{$festival->description}}</p>
                        <ul class="list-unstyled" style="color: black !important;">
                            <li><i class="fa fa-users mr-2 text-title"></i>{{$festival->capacity}}</li>
                            <li><i class="fa fa-calendar mr-2 text-title"></i>{{$festival->date}} </li>
                            <li><i class="fa fa-ban mr-2 text-title"></i>{{$festival->allowedAge}}</li>
                        </ul>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection