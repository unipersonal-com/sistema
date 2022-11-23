@extends('rrhh::layouts.master')
@section('menu')
    @include('rrhh::complement.menu')
@endsection

@section('bar_top')
    @include('rrhh::complement.navs')
@endsection


@section('after-style')

    {!! Html::script('assets/js/bootstrap/dist/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('assets/plugins/colorpicker/bootstrap-colorpicker.min.css') !!}
    {!! Html::style('assets/plugins/timepicker/bootstrap-timepicker.min.css') !!}
    <style type="text/css">
        .myscroll {
            border: solid white 1px;
            overflow: scroll;
            height: 470px;
        }
        .btn-enlace{
            background:linear-gradient(10deg, #067bc2, #84bcda);
            font-family:monospace;
            color:rgb(0, 0, 0) !important;
            font-weight:bold;
            /* margin: 20px; */
        }
        .btn-p{
            background:linear-gradient(10deg, #57a1d6, #313652);
            font-family:monospace;
            color:rgb(255, 255, 255) !important;
            font-weight:bold;
            /* margin: 20px; */
        }
        .btn-enlace:hover{
            /* margin: 10px; */
            overflow: hidden;
            background: linear-gradient(156deg, #966263, #d3b3b3);
            border-radius:15px 0 0 15px;
            font-family:monospace;
            font-weight:bold;
            color:white !important;
        }
        .card:hover{
            background-color: #f4845f !important;
        }
        .btn-p:hover{
            margin: 10px;
            overflow: hidden;
            background: linear-gradient(156deg, #920f0f7a, #000000d1 );
            color:black !important;
            border-radius:15px 0 0 15px;
            font-family:monospace;
            font-weight:bold;
        }
        .btn-enlace:active {
            padding: 15px;
            background-color: rgb(41, 24, 24) !important;
            color: rgb(62, 22, 22) !important;
        }
        #estado{
            margin-top: -12px !important;
            color: yellow;
        }
        .ccc{
            background:linear-gradient(10deg, #067bc2, #84bcda);
            font-family:monospace;
            color:rgb(0, 0, 0) !important;
            font-weight:bold;
            display: inline-block;
        }
        #botones{
            /* background: #2c7da0; */
            /* height: 10%; */
        }
        .btn-acciones{
            border-radius:50px;
            size: 12px;
            /* background:linear-gradient(156deg, #920f0f7a, #000000d1 ); */
            background: #52170b;

        }
        .btn-acciones i{
            padding: -2px;
            background:white !important;
            color:black !important;
        }
    </style>
@endsection

@section('title', $title)

@section('before-style')

@section('content')

<div class="container" id="principalPanel">
    <div class="row" >
        <div class="col-lg-12" style="padding: 3p;
            border-radius:5px;">
            @permission('crear.horario')
            <a class="btn btn-app btn-mycolor" data-toggle="modal" data-target=".create-modal-sm">
                <span class="badge bg-red">{{count($biometricos)}}  Biometricos</span>
                <i class="fa fa-plus"></i>
                Nuevo Biometrico
            </a>
            @endpermission
        </div>
    </div>
    <div class="row col-md-12 col-sm-12 col-xs-12" style="padding:15px;background:#2f5e80cc;border-radius:10px;">

        <div class="col-md-12 col-sm-12 col-xs-12 conn" style="padding:2%; border: 3px solid black;
            border-radius:10px; background: white;">
            <div class="text-center">
                <h2 style="text-transform:uppercase;font-family:monospace;font-weight:bold;font-size:24px;text-decoration:underline">{{$title}}</h2>
            </div>

              <br>
            <center>

                @foreach($biometricos as $biometrico)
                <div class="card ccc" id= "bio_{{$biometrico->id}}"style="border: 2px solid #2b1d1d;  border-radius: 30px; width:250px; margin-top: 10px; height: 275px;">
                  <div class="card-body">
                    <a href="#" class="btn btn-enlace" id='{{$biometrico["ip"]}}' onclick=" navegar(this.id, {{$puerto}}, {{ $biometrico->id }})" data-toggle="dropdown" style="border-radius: 33px;
                        max-width: 90%; min-width: 90%; margin-top: 1px;  height: 230px;"> <u style="font-size: 17px; font-weight: bold;">Biometrico</u>
                        <div class="card mb-3" style="max-width: 80%; min-width: 80%;
                        border: 1px solid #291d1d; border-radius: 15px; margin: auto; margin-top: 5px; background: #2c7da0;">
                            <img src="{{{ asset('assets/images/biometricozkteco.png') }}}" alt="biometrico"  width = "100%" height = "100%">
                        </div>
                        <div id="carga_{{$biometrico->id}}" style="display: none;"> <img src="{{{ asset('assets/images/loading.gif') }}}" width="30px"></div>
                        <h1  class ="ip" id='{{$biometrico["ip"]}}' style="font-size: 15px; font-weight: bold;">Ip:{{$biometrico["ip"]}}</h1>
                        <p style="font-size: 13px; font-weight: bold; margin-top: -10px;">Puerto:{{$biometrico->puerto}}<br>Lugar:{{$biometrico->lugar}}</p>
                        @if ($biometrico->estado == "inactivo")
                          <p id="estado" style="font-size: 14px; font-weight: bold; color:#660708;">Estado:{{$biometrico->estado}}</p>
                        @else
                          <p id="estado" style="font-size: 15px; font-weight: bold; color:chartreuse;">Estado:{{$biometrico->estado}}</p>
                        @endif
                    </a>
                    <p id="botones">
                        <button class='btn btn-acciones btn-warning' title="IMPORTAR ASISTENCIAS" onclick="impB('{{$biometrico->id}}' ,this)"data-toggle="modal" data-target="#import" ><i class="fa fa-upload"></i></button>
                        <button class='btn btn-acciones btn-warning' id="{{$biometrico->id}}" onclick="verb(this.id)" title="EDITAR {{$biometrico->id}}"  data-toggle="modal" data-target=".create-edit-sm"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-acciones btn-warning" title="ELIMINAR {{$biometrico->id}}" onclick="alerta('{{$biometrico->id}}' ,this)"><i class="fa fa-trash"></i></button>
                        <button class="btn btn-acciones btn-warning" title="MOSTRAR ASISTENCIAS DE {{$biometrico->id}}" onclick="mostrar('{{$biometrico->id}}' ,this)"><i class="fa fa-table"></i></button>
                    </p>
                  </div>
                </div>

                @endforeach

        </div>
    </div>
</div>

<div class="modal fade asistenciasbiometrico" id="asis" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2" style="text-align: center;"><b>Asistencias del biomtrico seleccionado</b></h4>
            </div>
            <div class="modal-body Masis"  id="renderA" style="background: #CBDEED">

            </div>
        </div>
    </div>
</div>

@include('rrhh::administrator.biometric.modals.modal-create')
@include('rrhh::administrator.biometric.modals.modal-edit')
@include('rrhh::administrator.biometric.modals.modal-importAsis')
@endsection

@section('after-script')

@parent
    {!! Html::script('assets/plugins/colorpicker/bootstrap-colorpicker.min.js') !!}
    {!! Html::script('assets/plugins/timepicker/bootstrap-timepicker.min.js') !!}
	<!-- <script>
    // $(document).on('click','.btn-enlace',function(e){
    //     //e.preventDefault();
    //     var $pu=$('{{$puerto}}').selector;
    //     console.log($pu);
    //     //console.log($('.ip').preObject[0].activeElement.id);
    //     console.log($('.ip').context.activeElement.id);
    //     console.log('importara asistencias del biometrico');
    //         var bool=confirm("esta seguro de importar las asistencias del biometrico? ");
    //         // if(bool){
    //         //     $.ajax({
    //         //         url:"{{url("rrhh/bioconectImport")}}",
    //         //         type:"get",
    //         //         //data:{"id":id},
    //         //         success:function(datos){
    //         //             if(datos.resp==200){
    //         //                 toastr.success("importacion de asitencias correcta del biometrico");
    //         //             }
    //         //         }
    //         //     });
    //         // }
    // });
</script> -->
<script type="text/javascript">

    function navegar(id, puerto, id_edit){
        console.log(id, puerto, id_edit);
        var ip = id;
        var puerto = puerto;
        var id_e = id_edit;
        console.log(ip);
        var url="{{url("rrhh/bioconect2")}}";
        $.ajax({
            type:'GET',
            url:url,
            data:{'ip': ip, 'puerto': puerto, 'id_e': id_e},
            dataType: 'json',
            beforeSend:function(){
                $(`#carga_${id_edit}`).show();
                //$('.btn-acciones').hide();
                $(`#bio_${id_edit}`).find('.btn-acciones').attr('disabled', true);
                //`#carga_${id_edit}`).innerHTML="<img src='./asset/assets/images/loading.gif'>";
                //$(`#carga_${id_edit}`).html("Procesando, espere por favor...");
            },
            success:function(data){
                //$('#principalPanel').empty().append($(data.list_asistenciasbiometrico));
                $('#principalPanel').html(data.list_asistenciasbiometrico);
                console.log(ip);
                $(`#carga_${id_edit}`).hide();
                //$('.btn-acciones').show();
                $(`#bio_${id_edit}`).find('.btn-acciones').attr('disabled', false);
            },
            error:function(data){
                toastr.error("no existe conexion al biometrico");
                $(`#carga_${id_edit}`).hide();
                //$('.btn-acciones').show();
                $(`#bio_${id_edit}`).find('.btn-acciones').attr('disabled', false);
                $('#estado_b').attr('disabled', false);
            }
        });
    }

    function verb(id){
        $.ajax({
            url:"{{url("rrhh/getBiometrico")}}",
            type:"get",
            data:{"id":id},
            beforeSend: function () {

            },
            success:function(datos){

                document.getElementById('nombre_b').value=datos[0]["nombre"];
                document.getElementById('id_b').value=datos[0]["id"];
                document.getElementById('lugar_b').value=datos[0]["lugar"];
                document.getElementById('ip_b').value=datos[0]["ip"];
                document.getElementById('puerto_b').value=datos[0]["puerto"];
                document.getElementById('estado_b').value=datos[0]["estado"];
                document.getElementById('version_b').value=datos[0]["version"];
                document.getElementById('modelo_b').value=datos[0]["modelo"];
                document.getElementById('Nserie_b').value=datos[0]["Nserie"];
                document.getElementById('fecha_creacion_b').value=datos[0]["fecha_creacion"];
            }
        });
    }

    function alerta(id) {
        var bool=confirm("esta seguro de eliminar este biometrico? "+id);
        if(bool){
            $.ajax({
                url:"{{url("rrhh/deletebiometrico")}}",
                type:"get",
                data:{"id":id},
                success:function(datos){
                    if(datos.resp==200){
                        toastr.success("Eliminacion correcta");
                        $(`#bio_${datos.id}`).remove();
                    }
                }
            });
        }
    }

    function impB(id) {
        $("#id_biometrico").val(id);
    }
    var id_biometrico;

    function mostrar(id) {
        this.id_biometrico = id;

        $.ajax({
            url:"{{url("rrhh/mostrarAsisBio")}}",
            type:"get",
            data:{"id":id},
            success:function(dato){
                console.log(dato);
                if (dato.resp==200) {
                    $('#renderA').html(dato.list_personal);
                    $("#asis").modal('show');
                }
                else {
                    toastr.warning('NO EXISTE ASISTENCIAS DE ESTE BIOMETRICO EN ASISTENCIAS');
                }

            },error:function(){
                toastr.error(" no se puede ejecutar esta operacion");
            }
        });
        //$(".asistenciasbiometrico").modal('show');`#bio_${datos.id}`
    }
</script>
<script type="text/javascript">
    $(document).on("click", ".pagination a", function(e) {
        e.preventDefault();
        // var _thisVar = $input.val();
        // console.log($('#id_b')[0].innerText);
        var urlPag_Now = $(this).attr('href');
        var page = $(this).attr('href').split('page=')[1]
        $.ajax({
            type:'GET',
            url: "paginaciondepermisos?page="+page,
            data:{id_biometrico},
            success: function(xhr_JsX) {

                $('#renderA').html(xhr_JsX.asistencias);

            }
        });
    });
</script>
@endsection
