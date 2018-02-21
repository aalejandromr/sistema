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
                            <h4>Registrar Llanta</h4>
                          <div class="row" style="margin-bottom: 0px !important;">
                            {!! Form::model($data['llanta'], ['method' => 'POST', 'action' => ['AlmacenController@store']]) !!}
                            <div class="input-field">
                                    {!! Form::token() !!}
                                <div class="input-field col s12">
                                    {!! Form::select('marcas[]', 
                                $data['marcas'],null,array('id' => 'marcaSlc')) !!}
                                    {!! Form::label('marcas') !!}
                                    <a id="add-marca-trigger">
                                        <i class="material-icons pointer">
                                            add
                                        </i>                                        
                                    </a>
                                </div>
                                <div class="input-field col s12">
                                    {!! Form::select('medidas[]', 
                                $data['medidas'],null,array('id' => 'medidaSlc')) !!}
                                    {!! Form::label('medidas') !!}

                                <a id="add-medida-trigger">
                                        <i class="material-icons pointer">
                                            add
                                        </i>                                        
                                    </a>
                                </div>
                                <div class="input-field col s12">
                                    <div class="input-field col s6 offset-s1">
                                        {!! Form::label('dot', 'DOT') !!}
                                        {!! Form::text('dot') !!}
                                    </div>
                                    <div class="input-field col s3">
                                        {!! Form::label('profundidad', 'Profundidad') !!}
                                        {!! Form::text('profundidad') !!}
                                    </div>
                                </div>
                                <div class="input-field col s12">
                                    {!! Form::select('construcciones[]', 
                                $data['construcciones'],null,array('id' => 'construcSlc')) !!}
                                    {!! Form::label('construcciones') !!}
                                    <a id="add-construc-trigger">
                                        <i class="material-icons pointer">
                                            add
                                        </i>                                        
                                    </a>
                                </div>
                                <div class="input-field col s12">
                                    {!! Form::select('tipos[]', 
                                        $data['tipos'],null,array('id' => 'tiposSlc')) !!}
                                    {!! Form::label('tipos') !!}
                                    <a id="add-tipos-trigger">
                                        <i class="material-icons pointer">
                                            add
                                        </i>                                        
                                    </a>
                                </div>
                                <div class="input-field col s12">
                                    {!! Form::select('designs[]', 
                                $data['designs'],null,array('id' => 'designSlc')) !!}
                                    {!! Form::label('designs') !!}
                                </div>
                                {{ Form::button('<i class="material-icons right">send</i> Enviar', ['type' => 'submit', 'class' => 'btn waves-effect waves-light'] )  }}   
                            </div>
                            {!! Form::close() !!}
                              </div>
                        </div>
                      </div>
                    </div>
                </div>

                 <!-- MODAL SECTION -->

                <!-- ADD APP MODAL -->
                  <div id="marca-modal" class="modal">
                    
                  </div>

                <!-- ADD APP MODAL -->
                  <div id="medida-modal" class="modal">
                    
                  </div>

                <!-- ADD APP MODAL -->
                  <div id="construc-modal" class="modal">
                    
                  </div>

                <!-- ADD APP MODAL -->
                  <div id="tipos-modal" class="modal">
                    
                  </div>

        </div>

        


        <script type="text/javascript">
            $(document).ready(function(){

                //initialize all modals           
                $('.modal').modal();
                //CONFIGURATION ON CLOSE
                $('#construc-modal').modal({
                    complete: emptyModal
                });

                $('#medida-modal').modal({
                    complete: emptyModal
                });

                $('#marca-modal').modal({
                    complete: emptyModal
                });

                $('#tipos-modal').modal({
                    complete: emptyModal
                });

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
                            $($(".input-field")[8]).after($ToAppend);
                            $("#ToAppend").show(400);
                        }
                        else {
                            $("#ToAppend").replaceWith($ToAppend);
                            $("#ToAppend").show(400);
                        }
                      }
                    });
                });


                        
                        $( "#add-marca-trigger" ).click(function() {

                            $.get( "/bodega/dashboard/add/marca", {} )
                              .done(function( data ) {

                                //IF MODAL IS EMPTY, APPEND THE DATA
                                if (isEmpty($('#marca-modal'))) {
                                      $( "#marca-modal" ).append(data);
   
                                }

                                //CREATING FUNCTION TO PREVENT SUBMIT AFTER APPEND THE FORM
                                $("#marcaForm").submit(function(e){
                                    e.preventDefault();

                                    var app = $("#marca").val();

                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    $.ajax({
                                      type: "POST",
                                      url: "/bodega/dashboard/add/marca",
                                      success: function(response){

                                       $('#marcaSlc').append($('<option>', {
                                           value: response.id,
                                           text: app
                                       }));

                                        //CHOOSE THE OPTION
                                        $("#marcaSlc option[value='"+response.id+"']").prop('selected', true);
                                        

                                        // $('#appSlc').trigger('contentChanged');
                                        $('#marcaSlc').material_select();

                                        //CLOSE MODAL
                                       $('#marca-modal').modal('close');

                                       //REMOVING CONTENT FROM MODAL
                                        $("#content-container" ).remove();

                                       Materialize.toast("Data inserted successfully!" , 3000, 'rounded blue darken-4');

                                     },
                                      data: {
                                        "marca": app
                                      }
                                      ,
                                      dataType: "json"
                                    });
                                });

                              });

                                //now you can open modal from code
                               $('#marca-modal').modal('open');
                        });//FINAL CLICK APP-MODAL


                        //FABRICANTE SECTION
                        $( "#add-medida-trigger" ).click(function() {

                            $.get( "/bodega/dashboard/add/medida", {} )
                              .done(function( data ) {

                                //IF MODAL IS EMPTY, APPEND THE DATA
                                if (isEmpty($('#medida-modal'))) {
                                      $( "#medida-modal" ).append(data);
   
                                }
                                

                                //CREATING FUNCTION TO PREVENT SUBMIT AFTER APPEND THE FORM
                                $("#medidaForm").submit(function(e){
                                    e.preventDefault();

                                    var attri = $("#medida").val();

                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    $.ajax({
                                      type: "POST",
                                      url: "/bodega/dashboard/add/medida",
                                      success: function(response){
                                            $('#medidaSlc').append($('<option>', {
                                           value: response.id,
                                           text: attri
                                       }));

                                        //CHOOSE THE OPTION
                                        $("#medidaSlc option[value='"+response.id+"']").prop('selected', true);
                                        

                                        // $('#appSlc').trigger('contentChanged');
                                        $('#medidaSlc').material_select();

                                        //CLOSE MODAL
                                       $('#medida-modal').modal('close');
                                       
                                       //empty modal
                                       $('#medida-modal').empty();

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
                               $('#medida-modal').modal('open');
                        });//FINAL CLICK APP-MODAL


                       //CONSTRUC SECTION
                        $( "#add-construc-trigger" ).click(function() {

                            $.get( "/bodega/dashboard/add/construccion", {} )
                              .done(function( data ) {

                                //IF MODAL IS EMPTY, APPEND THE DATA
                                if (isEmpty($('#construc-modal'))) {
                                    $( "#construc-modal" ).append(data);
                                }                                


                                //CREATING FUNCTION TO PREVENT SUBMIT AFTER APPEND THE FORM
                                $("#construcForm").submit(function(e){
                                    e.preventDefault(); 
                                    alert("INSIDE")

                                    var attri = $("#name").val();

                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    $.ajax({
                                      type: "POST",
                                      url: "/bodega/dashboard/add/construccion",
                                      success: function(response){
                                        console.log("gg")
                                            $('#construcSlc').append($('<option>', {
                                           value: response.id,
                                           text: attri
                                       }));

                                        //CHOOSE THE OPTION
                                        $("#construcSlc option[value='"+response.id+"']").prop('selected', true);
                                        

                                        // $('#appSlc').trigger('contentChanged');
                                        $('#construcSlc').material_select();

                                        //CLOSE MODAL
                                       $('#construc-modal').modal('close');
                                       
                                        //REMOVING CONTENT FROM MODAL
                                        $("#content-container" ).remove();
                                       
                                       Materialize.toast("Data inserted successfully!" , 3000, 'rounded blue darken-4');

                                     },
                                      data: {
                                        "name": attri
                                      }
                                    })
                                        .done(function(response){
                                         
;
                                        });;
                                });

                              });

                                //now you can open modal from code
                               $('#construc-modal').modal('open');
                        });//FINAL CLICK APP-MODAL 

                        //TIPOS SECTION
                        $( "#add-tipos-trigger" ).click(function() {

                            $.get( "/bodega/dashboard/add/tipo", {} )
                              .done(function( data ) {

                                //IF MODAL IS EMPTY, APPEND THE DATA
                                if (isEmpty($('#tipos-modal'))) {
                                    $( "#tipos-modal" ).append(data);
                                }

                                //CREATING FUNCTION TO PREVENT SUBMIT AFTER APPEND THE FORM
                                $("#tiposForm").submit(function(e){
                                    e.preventDefault();

                                    var attri = $("#name").val();

                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    $.ajax({
                                      type: "POST",
                                      url: "/bodega/dashboard/add/tipo",
                                      success: function(response){

                                        if(response.success){
                                            $('#tiposSlc').append($('<option>', {
                                           value: response.id,
                                           text: attri
                                       }));

                                        //CHOOSE THE OPTION
                                        $("#tiposSlc option[value='"+response.id+"']").prop('selected', true);
                                        

                                        // $('#appSlc').trigger('contentChanged');
                                        $('#tiposSlc').material_select();

                                        //CLOSE MODAL
                                       $('#tipos-modal').modal('close');

                                       //REMOVING CONTENT FROM MODAL
                                        $("#content-container" ).remove();
                                       
                                       Materialize.toast("Data inserted successfully!" , 3000, 'rounded blue darken-4');
                                        }
                                            

                                     },
                                      data: {
                                        "name": attri
                                      }
                                      
                                    });
                                });

                              });

                                //now you can optionen modal from code
                               $('#tipos-modal').modal('open');
                        });//FINAL CLICK APP-MODAL 
                      
                    
                        function isEmpty( el ){
                              return !$.trim(el.html())
                        }

                        function emptyModal(){
                            //REMOVING CONTENT FROM MODAL
                            $("#content-container" ).remove();
                        }

                    });// Handler for .ready() called.
        </script>
@endsection

