<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{url('/')}}">
        <img src="{{url('img/Logo.PNG')}}" alt="Logo" style="width:40px;">
    </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="ml-3" href="{{url('/')}}">FESTIVARS</a>
                @if(Auth::user())
                    <a class="ml-3" href="{{url('/your_festivals')}}">TUS FESTIVALES</a>
                    @if(Auth::user()->rol == 'admin')
                        <a class="ml-3" href="{{url('/control')}}">CONTROL</a>
                        @endif
                    @endif
                <a class="ml-3" href="{{url('/info')}}">INFO</a>
            </li>
        </ul>
        <span class="navbar-text">
            @if(!Auth::check())
        <a href="{{url('/login')}}">Log In</a>
                @else
                <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    <button type="submit" class="btnLink" style="display:inline;cursor:pointer">
                        LOG OUT
                    </button>
                </form>
                @endif
      </span>
    </div>
</nav>