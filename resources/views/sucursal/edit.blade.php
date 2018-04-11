    @extends('layouts.administracion.app')
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
        <div class="flex-center position-ref full-height" style="
    display: block;
">
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
                        <div class="col s10 offset-s1">
                          <div class="card z-depth-4">
                            <div class="card-content">
                                <h4>Editar Sucursal</h4>
                              <div class="row" style="margin-bottom: 0px !important;">
                                {!! Form::model($data['sucursal'], ['method' => 'PATCH', 'action' => ['SucursalController@update',$data['sucursal']->id]]) !!}
                                    {!! Form::token() !!}
                                    <div class="input-field col s12">
                                    <div class="input-field col s6">
                                        {!! Form::label('sucursal_name', 'Nombre de Sucursal') !!}
                                    {!! Form::text('sucursal_name') !!}
                                    </div>
                                    </div>
                                    <div class="input-field col s12">
                                    {!! Form::select('empresas[]', 
                                    $data['empresas']) !!}
                                    {!! Form::label('empresas') !!}
                                    </div>
                                    
                                    {{ Form::button('<i class="material-icons right">send</i> Editar', ['type' => 'submit', 'class' => 'btn waves-effect waves-light'] )  }}    
                                {!! Form::close() !!}
                                  </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
    <script type="text/javascript">
        $(document).ready(function(){
            console.log($('select[name="designs[]"]'));
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('select[name="designs[]"]').change(function(){
                $.ajax({
                  url: '/design/getFabricantes',
                  dataType: 'json',
                  type: 'POST',
                  data: {
                    design: this.value
                  },
                  success: function(response){
                    $ToAppend = '<div id="ToAppend" style="display: none;" class="input-field col s12"><div class="input-field col s6"><div class="select-wrapper"><span class="caret">▼</span><input type="text" class="select-dropdown" readonly="true" value="' + response.fabricante_name + '"></div> <label for="fabricantes">Fabricantes</label></div> <div class="input-field col s6"><div class="select-wrapper"><span class="caret">▼</span><input type="text" class="select-dropdown" readonly="true" data-activates="select-options-2927a5ce-46bf-f8fc-5156-2f89bdf251a1" value="' + response.aplicacion_name + '"></div> <label for="Aplicaciones">Aplicaciones</label></div></div>';
                    if($("#ToAppend").length == 0){
                        $($(".input-field")[4]).after($ToAppend);
                        $("#ToAppend").show(400);
                    }
                    else {
                        $("#ToAppend").replaceWith($ToAppend);
                        $("#ToAppend").show(400);
                    }
                  }
                });
            });
        });
    </script>
@endsection