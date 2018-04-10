
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
        {!! MaterializeCSS::include_css() !!}
    
    <script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>

</head>
<body>
    <div id="app">
        <nav>
          <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Logo</a>
            <ul class="right hide-on-med-and-down">
              <!-- Dropdown Trigger -->
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
            <li>
                <a class="dropdown-button" href="#!" data-activates="dropdown3"> Almacen <span class="caret"></span><i class="material-icons right">arrow_drop_down</i></a>
            </li>
                  <!-- Dropdown Structure -->
                <ul id="dropdown3" class="dropdown-content">
                    <li>
                        <a href="{{ route('all-llantas') }}">
                            Ver Todos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('comprar-llanta') }}">
                            Comprar
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('registrar-llanta') }}">
                            Registrar
                        </a>
                    </li>
                </ul>
                <li><a class="dropdown-button" href="#!" data-activates="dropdown1"> Catalogos <span class="caret"></span><i class="material-icons right">arrow_drop_down</i></a></li>
                  <!-- Dropdown Structure -->
                <ul id="dropdown1" class="dropdown-content">
                    <li>
                        <a href="{{ route('all_marcas') }}">
                            Marca
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('all-medidas') }}">
                            Medida
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('all-construcciones') }}">
                            Contruccion
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('all-tipos') }}">
                            Tipo
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('all-aplicaciones') }}">
                            Aplicacion
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('all-fabricantes') }}">
                            Fabricante
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('all-designs') }}">
                            Diseños
                        </a>
                    </li>
                </ul>
                <li><a class="dropdown-button" href="#!" data-activates="dropdown2">{{ Auth::user()->name }} <span class="caret"></span><i class="material-icons right">arrow_drop_down</i></a></li>
                  <!-- Dropdown Structure -->
                <ul id="dropdown2" class="dropdown-content">
                    <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                    </li>
                </ul>
            @endguest
            </ul>
          </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {!! MaterializeCSS::include_js() !!}
    <script type="text/javascript">
        $(document).ready(function(){
            $(".dropdown-button").dropdown();

                  
            if($('.message').length > 0){
                if($('.message').attr("data-type") == "success"){
                    Materialize.toast($('.message').attr("data-message") , 3000, 'rounded blue darken-4'); // 'rounded' is the class I'm applying to the toast
                }
            }

            $('select').material_select();

        });
    </script>
    </script>
</body>
</html>
