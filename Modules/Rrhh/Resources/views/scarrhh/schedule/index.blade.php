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
    </style>
@endsection

@section('title', $title)

@section('before-style')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @permission('crear.horario')
            <a class="btn btn-app btn-mycolor" data-toggle="modal" data-target=".create-modal-sm">
                <span class="badge bg-red">{{count($hours)}} registros</span>
                <i class="fa fa-plus"></i>
                Nuevo
            </a>
            @endpermission
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table__kirito table-bordered">
                <thead >
                <tr>
                    <th>Nombre</th>
                    <th>Hora de Entrada</th>
                    <th>Hora de Salida</th>
                    <th>Tolerancia Entrada</th>
                    <th>Tolerancia Salida</th>
                    <th>Inicio de Entrada</th>
                    <th>Fin de Entrada</th>
                    <th>Inicio de Salida</th>
                    <th>Fin de Salida</th>
                    <th>Dia Trabajo</th>
                    <th>Color</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($hours as $hour)
                    <tr class="mytr"   >
                        <td class="mytd">{{$hour->name}}</td>
                        <td class="mytd" style="text-align: center;">{{$hour->start_time}}</td>
                        <td class="mytd" style="text-align: center;">{{$hour->end_time}}</td>
                        <td class="mytd" style="text-align: center;">{{$hour->late_minutes}}min</td>
                        <td class="mytd" style="text-align: center;">{{$hour->early_minutes}}min</td>
                        <td class="mytd" style="text-align: center;">{{$hour->start_input}}</td>
                        <td class="mytd" style="text-align: center;">{{$hour->end_input}}</td>
                        <td class="mytd" style="text-align: center;">{{$hour->start_output}}</td>
                        <td class="mytd" style="text-align: center;">{{$hour->end_output}}</td>
                        <td class="mytd" style="text-align: center;">{{$hour->work_day}}</td>
                        <td bgcolor="{{$hour->color}}">
                            {{$hour->color}}
                        </td>
                        <td>
                            <center>
                            @permission('editar.horario')
                            <!--<a href="#" title="eliminar" onclick="alerta('{{$hour->id}}',this)"><i class="fa fa-trash"></i></a>-->
                            <a href="#" title="eliminar" onclick="alerta('{{$hour->id}}',this)"><i class="fa fa-trash"></i></a>

                            <a href="#" id="{{$hour->id}}"  title="editar {{$hour->id}}" onclick="ver(this.id)" data-toggle="modal" data-target=".edit-modal-sm"><i class="fa fa-edit"></i></a>
                            @endpermission
                            @permission('eliminar.horario')
                            <a href="#" title="eliminar" onclick="alerta('{{$hour->id}}',this)"><i class="fa fa-trash"></i></a>
                            @endpermission
                            </center>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('rrhh::scarrhh.schedule.modals.modal-create')
    @include('rrhh::scarrhh.schedule.modals.modal-edit')
@endsection

@section('after-script')
@parent
    {!! Html::script('assets/plugins/colorpicker/bootstrap-colorpicker.min.js') !!}
    {!! Html::script('assets/plugins/timepicker/bootstrap-timepicker.min.js') !!}
    <script>
        function alerta(id,row) {
            var bool=confirm("esta seguro de eliminar este horario? "+id);
            if(bool){
                $.ajax({
                    url:"{{url("rrhh/deleteShedules")}}",
                    type:"get",
                    data:{"id":id},
                    success:function(datos){
                        if(datos.resp==200){
                            toastr.success("Eliminacion correcta");
                            $(row).parent('center').parent("td").parent("tr").remove();
                        }

                    }
                });
            }
        }
    </script>
    <script type="text/javascript">
        $(function () {
            $(".my-color").change(function(){
                $(this).css("background",$(this).val());
            });
            $(".time").timepicker({
                showInputs: false
            });
        });
        function ver(id){
            $.ajax({
                url:"{{url("rrhh/getSchedule")}}",
                type:"get",
                data:{"id":id},
                success:function(datos){
                    document.getElementById('name_edit').value=datos[0]["name"];
                    document.getElementById('id_edit').value=datos[0]["id"];
                    document.getElementById('start_time_edit').value=datos[0]["start_time"];
                    document.getElementById('end_time_edit').value=datos[0]["end_time"];
                    document.getElementById('late_minutes_edit').value=datos[0]["late_minutes"];
                    document.getElementById('early_minutes_edit').value=datos[0]["early_minutes"];
                    document.getElementById('start_input_edit').value=datos[0]["start_input"];
                    document.getElementById('end_input_edit').value=datos[0]["end_input"];
                    document.getElementById('start_output_edit').value=datos[0]["start_output"];
                    document.getElementById('end_output_edit').value=datos[0]["end_output"];
                    document.getElementById('work_day_edit').value=datos[0]["work_day"];
                    document.getElementById('color_edit').value=datos[0]["color"];
                    document.getElementById('color_edit').style.background=datos[0]["color"];
                    if(datos[0]["sum"]){
                        $('#si_sum').attr('checked',true);
                        $('#no_sum').attr('checked',false);
                    }else{
                        $('#no_sum').attr('checked',true);
                        $('#si_sum').attr('checked',false);
                    }
                }
            });
            $("#modelo").attr("data-toggle","modal");
            $("#modelo").attr("data-target",".edit-modal-sm");
        }

    </script>

@endsection


