@extends('layouts.bodeguero.app')
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;s
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
@section('content')
    @if(session()->has('message'))
        <div class="message" data-type="success" data-message="{{ session()->get('message') }}">

        </div>
    @endif
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('add-sucursal') }}">Add</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content row">
                <div class="title m-b-md">
                    Almacen
                </div>
                <table class="striped col s12">
                    <thead>
                      <tr>
                          <th>ID</th>
                          <th>Nombre Sucursal</th>
                          <th>Empresa</th>
                          <th>Fecha Expiracion</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($sucursales as $sucursal)
                          <tr>
                            <td>{{ $sucursal->id }}</td>
                            <td>{{ $sucursal->sucursal_name }}</td>
                            <td>{{ $sucursal->expired_on }}</td>
                            <td>{{ $sucursal->empresas->descripcion }}</td>

                            <td>
                                <a href="{{route('edit-sucursal', array('sucursal' => $sucursal->id)) }}"> <i class="tinny material-icons">edit</i> </a>  
                                <a href=""> <i class="tinny material-icons">delete_forever</i> </a>
                            </td>
                          </tr>
                        @endforeach


                  </tbody>
                </table>
                {{ $sucursales->links() }}
            </div>
        </div>

@endsection