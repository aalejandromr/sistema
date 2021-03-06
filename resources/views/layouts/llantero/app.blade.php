
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
        {!! MaterializeCSS::include_css() !!}
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.min.css">
    <script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>
                <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
              <link rel="stylesheet" href="/resources/demos/style.css">
              <style>
              #draggable { width: 150px; height: 150px; padding: 0.5em; }
              </style>

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
                <a class="dropdown-button" href="#!" data-activates="dropdown3"> Catalogos <span class="caret"></span><i class="material-icons right">arrow_drop_down</i></a>
            </li>
                  <!-- Dropdown Structure -->
                <ul id="dropdown3" class="dropdown-content">
                    <li>
                        <a href="{{ route('all-distribuciones') }}">
                            Distribuciones
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('all-distribucion-posicions') }}">
                            Posiciones en Tropa
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('all-ejes') }}">
                            Ejes
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
