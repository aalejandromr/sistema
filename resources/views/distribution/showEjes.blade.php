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

            #test:after {
                content: "";
                position: absolute;
                z-index: 0;
                top: 200px;
                bottom: 72px;
                left: 49.4%;
                border-left: 11px solid;
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
                        <a href="{{ route('add-distribucion') }}">Add</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    DISTRIBUCION {{ $data["eje_name"] }}
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="col s3">
                            
                        </div>
                        <div class="col s6">
                            <div id="test2" class="col s12">
                                <u id="sortable">
                                    @foreach($data["ejes"] as $eje)
                                        @if ($eje->distribution_position_id === 1)
                                            @if ($eje->eje_id === 1)
                                                <li>
                                                    <div class="col s12 draggable" style="height: 87px;
                                                        background: url(http://localhost:8000/image/bar.svg) no-repeat;
                                                        background-size: 193px 193px;
                                                        background-position: center;" data-id="{{ $eje->id }}" data-position="{{ $eje->posicion }}" data-distribution-position="{{ $eje->distribution_position_id }}" data-eje-id="{{ $eje->eje_id }}" data-distribution="{{ $eje->distribution_id }}">
                                                    </div>
                                                </li>
                                            @elseif ($eje->eje_id === 2)
                                                <li>
                                                    <div class="col s12 draggable" style="height: 87px;
                                                        background: url(http://localhost:8000/image/bar.svg) no-repeat;
                                                        background-size: 143px 143px;
                                                        background-position: center;" data-id="{{ $eje->id }}" data-position="{{ $eje->posicion }}" data-distribution-position="{{ $eje->distribution_position_id }}" data-eje-id="{{ $eje->eje_id }}" data-distribution="{{ $eje->distribution_id }}">
                                                    </div>
                                                </li>
                                            @endif
                                        @elseif ($eje->distribution_position_id === 2)
                                            @if ($eje->eje_id === 1)
                                                <li>
                                                    <div class="col s12 draggable" style="height: 87px;
                                                        background: url(http://localhost:8000/image/bar.svg) no-repeat;
                                                        background-size: 193px 193px;
                                                        background-position: center;" data-id="{{ $eje->id }}" data-position="{{ $eje->posicion }}" data-distribution-position="{{ $eje->distribution_position_id }}" data-eje-id="{{ $eje->eje_id }}" data-distribution="{{ $eje->distribution_id }}">
                                                    </div>
                                                </li>
                                            @elseif ($eje->eje_id === 2)
                                                <li>
                                                    <div class="col s12 draggable" style="height: 87px;
                                                        background: url(http://localhost:8000/image/bar.svg) no-repeat;
                                                        background-size: 143px 143px;
                                                        background-position: center;" data-id="{{ $eje->id }}" data-position="{{ $eje->posicion }}" data-distribution-position="{{ $eje->distribution_position_id }}" data-eje-id="{{ $eje->eje_id }}" data-distribution="{{ $eje->distribution_id }}">
                                                    </div>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach 
                                </u>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    

      <script>
          $( function() {
            $( "#sortable" ).sortable({
              revert: true,
              stop: function(event, ui){
                //console.log(ui.item);
                var listElements = $("#sortable").children();
                var listValues = [];
                Array.from(listElements).forEach(function(element){
                    var obj = [];
                    obj.push($(element.innerHTML).data('id'));
                    obj.push($(element.innerHTML).data('eje-id'));
                    obj.push($(element.innerHTML).data('distribution'));
                    obj.push($(element.innerHTML).data('position'));
                    obj.push($(element.innerHTML).data('distribution-position'));
                    listValues.push(obj);
                });
                //console.log(listValues);
                /*
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                console.log();
                console.log(JSON.stringify(listValues));
                $.ajax({
                    method: 'PATCH',
                    url: "/llantero/dashboard/update/eje-distribucion/1",
                    data: {
                        data: listValues
                    },
                });*/
              },
              start : function(event,ui){
                //console.log(ui.item.index());
                Array.from(ui.item.children()).forEach(function(element){
                    //console.log(element);
                    $(element).data("data-position", ui.item.index() + 1);
                    //console.log(element);
                });
              },
              change: function(event, ui){
                //console.log("Entra Change");
              },
              update: function(event,ui){
                console.log(ui.item.index());
                Array.from(ui.item.children()).forEach(function(element){
                    console.log($(element));
                    console.log($(element).attr('data-position'));
                    $(element).attr('data-position', ui.item.index() + 1);
                });

                var listElements = $("#sortable").children();
                Array.from(listElements).forEach(function(element){
                    console.log($(element).attr('data-position'));
                    //console.log(ui.item.index());
                    if ( $(element).attr('data-position') > (ui.item.index() + 1)) {
                        //$(element).attr('data-position', ($(element).attr('data-position') + 1));
                        console.log(element);
                    }
                });
                //console.log("Entra Update");
                //console.log(ui.item.index());
              }
            });
            $( "ul, li" ).disableSelection();
          } );
      </script>
@endsection





