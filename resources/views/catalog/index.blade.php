@extends('layouts.master')
@section('content')
    <div class="row mb-3">
        @foreach($arrayFestivals as	$key =>	$festival)
            <div class="col-sm-4 mt-3">
                <div class="card" style="width: 18rem;">
                    <a href="{{url('catalog/details', ['id' => $festival->id])}}"><img class="card-img-top" src="{{$festival->photo}}" style="height: 10rem"></a>
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
                                @if(
                                $query = DB::table('your_festivals')->where([
                                ['idUser', '=', \Illuminate\Support\Facades\Auth::user()->id],
                                ['idFestival', '=', $festival->id],
                                ])->get()
                                )
                                @if($query->count() > 0)
                                    <input type="submit" name="seguir" value="Seguir Festival" class="btn btn-primary" disabled>
                                @else
                                    <input type="hidden" name="festivalOculto" value="{{$festival->id}}">
                                    <input type="submit" name="seguir" value="Seguir Festival" class="btn btn-primary">
                                    @endif
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

