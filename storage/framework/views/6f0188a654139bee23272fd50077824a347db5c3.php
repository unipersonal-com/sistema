
<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('rrhh::complement.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bar_top'); ?>
    <?php echo $__env->make('rrhh::complement.navs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-style'); ?>
    <?php echo Html::style('assets/plugins/datatables/dataTables.bootstrap.css'); ?>

    <?php echo Html::style('assets/plugins/colorpicker/bootstrap-colorpicker.min.css'); ?>

    <?php echo Html::style('assets/plugins/timepicker/bootstrap-timepicker.min.css'); ?>

    <style type="text/css">
        .myscroll {
            border: solid white 1px;
            overflow: scroll;
            height: 470px;
        }
        .btn{
            background:linear-gradient(10deg, #920f0f7a, #000000d1);
            font-family:monospace;
            color:rgb(0, 0, 0) !important;
            font-weight:bold;
            margin: 20px;

        }

        .btn-p{
            background:linear-gradient(10deg, #57a1d6, #313652);
            font-family:monospace;
            color:rgb(255, 255, 255) !important;
            font-weight:bold;
            margin: 20px;

        }
        .btn:hover{
            margin: 10px;
            overflow: hidden;
            background: linear-gradient(156deg, #57a1d6, #313652);
            color:rgb(0, 0, 0) !important;
            border-radius:15px 0 0 15px;
            font-family:monospace;
            font-weight:bold;
            color:white !important;
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
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('before-style'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12 col-sm-12 col-xs-4" style="padding:3%;">
<center> 
     <!-- <tr>
         <th class="">
         <td class=""> -->
             <?php $__currentLoopData = $meses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <a href="#" class="btn" data-toggle="dropdown" style="border: 3px solid #2b1d1d;  border-radius: 30px; width: 15%;
                    font-weight: bold; max-width: 15%; min-width: 15%;"><h3>Mes</h3>
                    <div class="card bg-primary mb-3" style="max-width: 60%; min-width: 7rem; width: 55%; height: 12%;
                    border: 1px solid #291d1d; border-radius: 15px; margin: auto; background: #d95a5a">
                    <i class="fa fa-calendar" style="font-size: 50px;padding: 15px; min-font-size: 2rem;"></i>
                    </div>
                
                    <p></p>
                    <h1 style="font-size: 25px; font-weight: bold;"><?php echo e($items["nombre"]); ?></h1>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- <a href="#" title="febrero" class="btn btn-p" style="border: 3px solid #2b1d1d;  border-radius: 30px; width: 15%;
                font-weight: bold;"><h3>Mes</h3>
                <i class="fa fa-calendar" style="font-size: 5rem; min-font-size: 5px; max-font-size: 50px; padding: 15px; color: black; background: #5191b8;
                border: 1px solid #291d1d; border-radius: 15px;max-width: 60%; min-width: 2rem;"></i>
            
                <p></p>
                <h1 style="font-size: 25px; font-weight: bold;">Enero</h1>
            </a>

            <a href="#" class="btn" data-toggle="dropdown" style="border: 3px solid #2b1d1d;  border-radius: 30px; width: 15%;
                font-weight: bold;"><h3>Mes</h3>
                <div class="card bg-primary mb-3 mb-3" style="max-width: 60%; min-width: 2rem; width: 55%; height: 12%;
                border: 1px solid #291d1d; border-radius: 15px; margin: auto; background: #d95a5a">
                <i class="fa fa-calendar" style="font-size: 50px; text-aling: float; padding: 15px; "></i>
                </div>
            
                <p></p>
                <h1 style="font-size: 25px; font-weight: bold;">Enero</h1>
            </a>

            <a href="#" title="febrero" class="btn btn-p" style="border: 3px solid #2b1d1d;  border-radius: 30px; width: 15%;
                font-weight: bold;"><h3>Mes</h3>
                <i class="fa fa-calendar" style="font-size: 50px; text-aling: float; padding: 15px; color: black; background: #5191b8;
                border: 1px solid #291d1d; border-radius: 15px"></i>
            
                <p></p>
                <h1 style="font-size: 25px; font-weight: bold;">Enero</h1>
            </a>
        </td>
        <td>
            <a href="#" class="btn" data-toggle="dropdown" style="border: 3px solid #2b1d1d;  border-radius: 30px; width: 15%;
                font-weight: bold;"><h3>Mes</h3>
                <div class="card bg-primary mb-3 mb-3" style="max-width: 60%; min-width: 2rem; width: 55%; height: 12%;
                border: 1px solid #291d1d; border-radius: 15px; margin: auto; background: #d95a5a">
                <i class="fa fa-calendar" style="font-size: 50px; text-aling: float; padding: 15px; "></i>
                </div>
            
                <p></p>
                <h1 style="font-size: 25px; font-weight: bold;">Enero</h1>
            </a>

            <a href="#" title="febrero" class="btn btn-p" style="border: 3px solid #2b1d1d;  border-radius: 30px; width: 15%;
                font-weight: bold;"><h3>Mes</h3>
                <i class="fa fa-calendar" style="font-size: 50px; text-aling: float; padding: 15px; color: black; background: #5191b8;
                border: 1px solid #291d1d; border-radius: 15px"></i>
            
                <p></p>
                <h1 style="font-size: 25px; font-weight: bold;">Enero</h1>
            </a>

            <a href="#" class="btn" data-toggle="dropdown" style="border: 3px solid #2b1d1d;  border-radius: 30px; width: 15%;
                font-weight: bold;"><h3>Mes</h3>
                <div class="card bg-primary mb-3 mb-3" style="max-width: 60%; min-width: 2rem; width: 55%; height: 12%;
                border: 1px solid #291d1d; border-radius: 15px; margin: auto; background: #d95a5a">
                <i class="fa fa-calendar" style="font-size: 50px; text-aling: float; padding: 15px; "></i>
                </div>
            
                <p></p>
                <h1 style="font-size: 25px; font-weight: bold;">Enero</h1>
            </a>

            <a href="#" title="febrero" class="btn btn-p" style="border: 3px solid #2b1d1d;  border-radius: 30px; width: 15%;
                font-weight: bold;"><h3>Mes</h3>
                <i class="fa fa-calendar" style="font-size: 50px; text-aling: float; padding: 15px; color: black; background: #5191b8;
                border: 1px solid #291d1d; border-radius: 15px"></i>
            
                <p></p>
                <h1 style="font-size: 25px; font-weight: bold;">Enero</h1>
            </a>
        </td>
        <td>

            <a href="#" class="btn" data-toggle="dropdown" style="border: 3px solid #2b1d1d;  border-radius: 30px; width: 15%;
                font-weight: bold;"><h3>Mes</h3>
                <div class="card bg-primary mb-3 mb-3" style="max-width: 60%; min-width: 2rem; width: 55%; height: 12%;
                border: 1px solid #291d1d; border-radius: 15px; margin: auto; background: #d95a5a">
                <i class="fa fa-calendar" style="font-size: 50px; text-aling: float; padding: 15px; "></i>
                </div>
            
                <p></p>
                <h1 style="font-size: 25px; font-weight: bold;">Enero</h1>
            </a>

            <a href="#" title="febrero" class="btn btn-p" style="border: 3px solid #2b1d1d;  border-radius: 30px; width: 15%;
                font-weight: bold;"><h3>Mes</h3>
                <i class="fa fa-calendar" style="font-size: 50px; text-aling: float; padding: 15px; color: black; background: #5191b8;
                border: 1px solid #291d1d; border-radius: 15px"></i>
            
                <p></p>
                <h1 style="font-size: 25px; font-weight: bold;">Enero</h1>
            </a>

            <a href="#" class="btn" data-toggle="dropdown" style="border: 3px solid #2b1d1d;  border-radius: 30px; width: 15%;
                font-weight: bold;"><h3>Mes</h3>
                <div class="card bg-primary mb-3 mb-3" style="max-width: 60%; min-width: 2rem; width: 55%; height: 12%;
                border: 1px solid #291d1d; border-radius: 15px; margin: auto; background: #d95a5a">
                <i class="fa fa-calendar" style="font-size: 50px; text-aling: float; padding: 15px; "></i>
                </div>
            
                <p></p>
                <h1 style="font-size: 25px; font-weight: bold;">Enero</h1>
            </a>

            <a href="#" title="febrero" class="btn btn-p" style="border: 3px solid #2b1d1d;  border-radius: 30px; width: 15%;
                font-weight: bold;"><h3>Mes</h3>
                <i class="fa fa-calendar" style="font-size: 50px; text-aling: float; padding: 15px; color: black; background: #5191b8;
                border: 1px solid #291d1d; border-radius: 15px"></i>
            
                <p></p>
                <h1 style="font-size: 25px; font-weight: bold;">Enero</h1>
            </a>
        </td>
         </th>
        
    </tr> -->

              
<script>
  function funcion(){
      alert(href = "admin.horarios.lista");
        href = "rrhh/schedule";
  }
</script>

  

<?php $__env->stopSection(); ?>
<?php $__env->startSection('after-script'); ?>
##parent-placeholder-518cf8338c525b9b9840516cc667fb67f75d82ca##
    <?php echo Html::script('assets/plugins/colorpicker/bootstrap-colorpicker.min.js'); ?>

    <?php echo Html::script('assets/plugins/timepicker/bootstrap-timepicker.min.js'); ?>

    <script>
        function alerta(id,row) {
            var bool=confirm("esta seguro de eliminar este horario? "+id);
            if(bool){
                $.ajax({
                    url:"<?php echo e(url("rrhh/deleteShedules")); ?>",
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
                url:"<?php echo e(url("rrhh/getSchedule")); ?>",
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

<?php $__env->stopSection(); ?>




<?php echo $__env->make('rrhh::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/vistasHojaCalculo/meses.blade.php ENDPATH**/ ?>