    @extends('layouts.llantero.app')
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
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
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
                    <div class="row">
                        <div class="col s12">
                          <div class="card z-depth-4">
                            <div class="card-content">
                              <div class="row" style="margin-bottom: 0px !important;">
                                {!! Form::model($eje, ['method' => 'PATCH', 'action' => ['EjeController@update',$eje->id]]) !!}
                                    {!! Form::token() !!}
                                    {!! Form::text('name') !!}
                                    {{ Form::button('<i class="material-icons right">send</i> Editar', ['type' => 'submit', 'class' => 'btn waves-effect waves-light'] )  }}    
                                {!! Form::close() !!}
                                  </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
@endsection