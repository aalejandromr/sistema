    @extends('layouts.bodeguero.app')
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

            .pointer{
                cursor: pointer;
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
                                <h4>Editar Diseño</h4>
                              <div class="row" style="margin-bottom: 0px !important;">
                                {!! Form::model($data['design'], ['method' => 'PATCH', 'action' => ['DesignController@update',$data['design']->id]]) !!}
                                    {!! Form::token() !!}
                                    {!! Form::text('design') !!}
                                    <div class="input-field col s12">
                                    {!! Form::select('aplicacions[]', 
                                    $data['aplicacion'], null,array('id' => 'appSlc')) !!}
                                    {!! Form::label('aplicacions') !!}
                                    <a id="add-app-trigger">
                                        <i class="material-icons pointer modal-trigger">
                                            add
                                        </i>                                        
                                    </a>
                                    </div>
                                    <div class="input-field col s12">
                                    {!! Form::select('fabricantes[]', 
                                    $data['fabricantes'], null,array('id' => 'fabriSlc')) !!}
                                    {!! Form::label('fabricantes') !!}
                                    <a id="add-fabricante-trigger">
                                        <i class="material-icons pointer modal-trigger">
                                            add
                                        </i>                                        
                                    </a>
                                    </div>
                                    {{ Form::button('<i class="material-icons right">send</i> Editar', ['type' => 'submit', 'class' => 'btn waves-effect waves-light'] )  }}    
                                {!! Form::close() !!}
                                  </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <!-- MODAL SECTION -->

                <!-- ADD APP MODAL -->
                  <div id="app-modal" class="modal">
                    
                  </div>

                <!-- ADD APP MODAL -->
                  <div id="fabricante-modal" class="modal">
                    
                  </div>

                <script type="text/javascript">
                    $( document ).ready(function() {

                        //initialize all modals           
                        $('.modal').modal();

                        
                        $( "#add-app-trigger" ).click(function() {

                            $.get( "/bodega/dashboard/add/aplicacion", {} )
                              .done(function( data ) {


                                $( "#app-modal" ).append(data);

                                //CREATING FUNCTION TO PREVENT SUBMIT AFTER APPEND THE FORM
                                $("#appForm").submit(function(e){
                                    e.preventDefault();

                                    var app = $("#aplicacion").val();

                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    $.ajax({
                                      type: "POST",
                                      url: "/bodega/dashboard/add/aplicacion",
                                      success: function(response){

                                       $('#appSlc').append($('<option>', {
                                           value: response.id,
                                           text: app
                                       }));

                                        //CHOOSE THE OPTION
                                        $("#appSlc option[value='"+response.id+"']").prop('selected', true);
                                        

                                        // $('#appSlc').trigger('contentChanged');
                                        $('#appSlc').material_select();

                                        //CLOSE MODAL
                                       $('#app-modal').modal('close');
                                       
                                       Materialize.toast("Data inserted successfully!" , 3000, 'rounded blue darken-4');

                                     },
                                      data: {
                                        "aplicacion": app
                                      }
                                      ,
                                      dataType: "json"
                                    });
                                });

                              });

                                //now you can open modal from code
                               $('#app-modal').modal('open');
                        });//FINAL CLICK APP-MODAL


                        //FABRICANTE SECTION
                        $( "#add-fabricante-trigger" ).click(function() {

                            $.get( "/bodega/dashboard/add/fabricante", {} )
                              .done(function( data ) {


                                $( "#fabricante-modal" ).append(data);

                                //CREATING FUNCTION TO PREVENT SUBMIT AFTER APPEND THE FORM
                                $("#fabriForm").submit(function(e){
                                    e.preventDefault();

                                    var attri = $("#name").val();

                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    $.ajax({
                                      type: "POST",
                                      url: "/bodega/dashboard/add/fabricante",
                                      success: function(response){
                                            $('#fabriSlc').append($('<option>', {
                                           value: response.id,
                                           text: attri
                                       }));

                                        //CHOOSE THE OPTION
                                        $("#fabriSlc option[value='"+response.id+"']").prop('selected', true);
                                        

                                        // $('#appSlc').trigger('contentChanged');
                                        $('#fabriSlc').material_select();

                                        //CLOSE MODAL
                                       $('#fabricante-modal').modal('close');
                                       
                                       Materialize.toast("Data inserted successfully!" , 3000, 'rounded blue darken-4');

                                     },
                                      data: {
                                        "name": attri
                                      }
                                      ,
                                      dataType: "json"
                                    });
                                });

                              });

                                //now you can open modal from code
                               $('#fabricante-modal').modal('open');
                        });//FINAL CLICK APP-MODAL


                        $('#appSlc').on('contentChanged', function() {
                          // re-initialize (update)
                          $(this).material_select();
                        });                        
                    
                    });// Handler for .ready() called.
    
                </script>

@endsection 