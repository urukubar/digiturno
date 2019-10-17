<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Digiturno') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app2.css') }}" rel="stylesheet">
  </head>
  <body>
      <nav class="navbar navbar-expand-md navbar-light bg-light">
        {{-- {{'DIGITURNO'}} --}}
      <img src="http://www.ccv.org.co/site/fileadmin/user_upload/img/ccv.png" class="img-responsive">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
        @guest
            <li class="nav-item dropdown">
              <a class="nav-link " href="{{route('login')}}">
                {{_('Iniciar Sesion')}}
              </a>
            </li>
          </ul>
          {{-- @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif --}}
        @else
            @if (Auth::user()->idtipo_usuario==1)
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('turnosadmin') }}">Turnos <span class="sr-only">(current)</span></a>
                </li>
              </ul>
            @else
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('turnos') }}">Turnos <span class="sr-only">(current)</span></a>
                </li>
              </ul>
            @endif
          @if (Auth::user()->idtipo_usuario==1)
            <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ __('Administracion') }}
                </a>
              <div class="dropdown-menu dropdown-menu-" aria-labelledby="navbarDropdown">
                <a  class="dropdown-item" href="{{ url('/usuarios') }}">{{ __('Usuarios') }}</a>
                <a class="dropdown-item" href="{{url('/tramites')}}" >{{ __('Tramites') }}</a>
                <a class="dropdown-item" href="{{url('/taquillas')}}" >{{ __('Taquillas') }}</a>
              </div>
            </li>
          </ul>
        @endif
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-Left" aria-labelledby="navbarDropdown">
                <a  class="dropdown-item" href="{{ route('password') }}">{{ __('Password') }}</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
          </li>
        </ul>
    @endguest
      </ul>
    </div>
  </nav>
<main class="py-4">
    @yield('content')
</main>
<script type="text/javascript">
function digitar(valor) {
          document.getElementById("calificacion").value += valor;
        }

</script>
  </body>
</html>
