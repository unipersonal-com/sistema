<!-- @use  Jenssegers\Date\Date as DATE; -->
<!DOCTYPE html>
<html lang="en" style="background-color: #f5f5f5;">
    <head>
        <title>pdf</title>
        <meta charset="UTF-8">
        <meta name="http-equiv="X-UA-Compatible" content="IE-chrome">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
            @page  {
                margin: 1cm 1cm 1cm 1cm;
            }
            body {
                background-image: url(assets/images/uatfblanco.png);
                background-color: #f5f5f5 !important;
                background-size: 100PX;
            }

            .table__kiri {
                width: 100%;
                height: auto;
                position: relative;
                margin-left: -12px;
                margin-right: -12px;
            }
            .table__kiri thead {
                background: #113F63;
                color: #fff;
            }
            .table__kiri thead tr {
                height: 28px;
            }
            .table__kiri thead tr th {
                padding-left:   2px;
                border: 1px solid #fff;
                text-transform: uppercase;
                font-size: 9px;
            }
            .table__kiri tbody tr {
                height: 28px;
            }
            .table__kiri tbody tr td {
                padding-left:2px;
                border: 1px solid #fff;
                text-transform: capitalize;
                font-size: 9px;
            }
            .table__kiri tbody tr:nth-child(even) {
                background: #deeaf4;
            }
            #encabezado {
                background: red;
                display: flex;
                align-items:center;
                height: 50px;
            }
            #imgpersonal{
                margin-top: 5px;
                float: right;
                width: 65px;
            }
            #imguatf{
                margin-top: 5px;
                float: left;
                width:65PX;
                height: 65px;
            }
            #textoencabezado{
                margin-top: 5px;
                text-align:center;
            }
            #uno{
                font-size: 11px;
                font-weight: bold;
                margin-bottom: 0px;
            }
            #dos{
                margin-top: 0px;
                font-size: 10px;
                margin-bottom: 0px;
            }
            #tres{
                font-size: 11px;
                font-weight: bold;
                margin-top: 0px;
                text-border: center;
            }
            #cuerpo2{
                text-align: center;
                height:13px;
                margin-bottom: 0px;
                margin-top: 0px;
            }
            #cuerpo2 p{
                margin-top: 10px;
                display: inline-block;
                margin-left: 5.5cm;
                color: black;

            }
            #tipocontrato{
                text-align: center;
                align-items:center;
                height:12px;
            }
            #tipocontrato p{
                padding-top: 1px;
                color: black;
                font-size: 11px;
            }
            b{
                color: black;
            }
            #cuerpodatospersonal{
                margin-top: 0px;
                position:relative;
                align-items:center;
                height: 38px;
                margin-bottom: 0px;
            }
            section{
                height: 37px;
                margin-left: 20px;
            }
            #cuerpodatospersonal section p{
                position:relative;
                text-align: left;
                text-transform: uppercase;
                align-items:center;
                color: black;
                font-size: 10px;
            }
            #datos2{
                margin-top: -12px;
            }
            #datos1{
                margin-top: -12px;
            }
            #t-resumen {
                margin-top: -10px;
                text-align: center;
                font-size: 10px;
                text-transform: uppercase;
                height: 11px;
                margin-bottom: 0px;
            }
            #total{
                position: relative;
                background: white;
                border: 1px solid black;
            }
            #total td{
                padding-left:2px;
                font-size: 9px;
                font-weight: bold;
                color: #113F63;
            }
            #total1{
                position: relative;
                border: 1px solid black;
                background: white;
            }
            #total1 td{
                padding-left:2px;
                font-size: 9px;
                font-weight: bold;
            }
        </style>

    </head>
    <body>
        <header>
            <div class="col-12" id="encabezado">
                <img src="assets/images/logo.png" alt="uatf" id="imguatf">
                <div id="textoencabezado">
                    <p id="uno">UNIVERSIDAD AUTONOMA "TOMAS FRIAS"</p>
                    <p id="dos">DIRECCION ADMINISTRATIVA Y FINANCIERA</p>
                    <p id="dos">DEPARTAMENTO DE PERSONAL</p>
                    <p id="tres"><u>KARDEX DE CONTROL DE ASISTENCIAS</u> </p>
                </div>

                <img id="imgpersonal" src="assets/images/LOGO CIRCULAR COLOR.png" alt="personal">
            </div>

            <div id="cuerpo2">
                <p style="font-size:10px; margin-left: 30%">Desde:  <?php echo e($fecha1); ?> </p>
                <p style="font-size:10px; margin-right:45%;">Hasta:  <?php echo e($fecha2); ?></p>
            </div>
            <div id="tipocontrato">
                <p style=""><b>TIPO DE CONTRATO:</b>  PERMANENTE</p>
            </div>

            <div id="cuerpodatospersonal">
                <section style="float:left; width: 50%; padding-left: 15px;">
                    <p style="padding-left: 10px; margin-top: -5px;"><b>CI EMPLEADO:</b>   <?php echo e($ci); ?></p>
                    <p id="datos1" style="padding-left: 10px"><b>APELLIDOS Y NOMBRES:</b> <?php echo e($nombres); ?> </p>
                    <p id="datos1" style="padding-left: 10px"><b>CARGO:</b><?php echo e($cargo); ?> </p>
                </section>
                <section style=" padding-left: 10px;float:left; width: 45%;">
                    <p style="padding-left: 85px; margin-top: -5px;"><b>GRUPO:</b><?php echo e($grupo); ?> </p>
                    <p id="datos2" style="padding-left: 85px"><b>MES:</b><?php echo e($mes); ?> </p>
                    <p id="datos2" style="padding-left: 85px"><b>AÑO:</b><?php echo e($año); ?> </p>
                </section>
            </div>
        </header>
        <?php
            $con= 0;
            $dia= "";
            $bonote= 0;
            $no= 0;
        ?>
        <div class="container">
            <div class="table-responsive table-reporte">
                <table class="table__kiri table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">fecha</th>
                            <th>dia</th>
                            <th>Horario</th>
                            <th>Tipo</th>
                            <th>Hora</th>
                            <th>Estado</th>
                            <th>Tipo</th>
                            <th>Hora</th>
                            <th>Estado</th>
                            <th>H_Tra.</th>
                            <th>Obs..</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $cadena; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fecha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $existe= 0;
                            $dia = DATE::create($fecha)->format('w');
                            foreach ($asisentradas as $asistencias){
                                if ($asistencias->start == $fecha ){
                                    $existe++;
                                }
                            }
                            if ((int)$dia != 6 && (int)$dia != 0) {
                                $bonote ++;
                            }
                            ?>
                            <?php if($existe == 0): ?>
                                <?php if((int)$dia != 6 && (int)$dia != 0): ?>
                                    <?php
                                        //$no++;
                                    ?>
                                <?php endif; ?>
                                <tr>
                                    <td><?php echo e($fecha); ?></td>
                                    <td><?php echo e(DATE::create($fecha)->format('D')); ?></td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            <?php endif; ?>
                            <?php if($existe > 0): ?>
                                <?php
                                    $no++;
                                ?>
                                <?php $__currentLoopData = $asisentradas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asistencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $h_e = "";
                                        $h_s = "";
                                    ?>
                                    <?php if($asistencia->start == $fecha ): ?>

                                        <tr>
                                            <td><?php echo e($asistencia->start); ?></td>
                                            <td><?php echo e(DATE::create($asistencia->start)->format('D')); ?></td>
                                            <td><?php echo e($asistencia->turno_a); ?></td>
                                            <td><?php echo e($asistencia->tipo_a); ?></td>
                                            <td><?php echo e($asistencia->hora); ?></td>
                                            <td><?php echo e($asistencia->estado_a); ?></td>

                                            <?php $__currentLoopData = $asissalidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($asis->turno_a == $asistencia->turno_a && $asis->start == $asistencia->start): ?>

                                                <td><?php echo e($asis->tipo_a); ?></td>
                                                <td><?php echo e($asis->hora); ?></td>
                                                <td><?php echo e($asis->estado_a); ?></td>
                                                <?php
                                                    $intervaloMm= DATE::CreateFromFormat('H:i:s', $asis->hora)->diffInMinutes(DATE::createFromFormat('H:i:s', $asistencia->hora));
                                                    $intervaloM=gmdate('H:i', $intervaloMm * 60);
                                                ?>
                                                <td><?php echo e($intervaloM); ?></td>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr id="total">
                            <td></td>
                            <td>Atraso</td>
                            <td>abandono</td>
                            <td>permiso</td>
                            <td>faltas</td>
                            <td>d. tra.</td>
                            <td>T. dias</td>
                            <td>D. b_te</td>
                            <td>D. fs</td>
                            <td></td>
                        </tr>
                        <tr id="total1">
                            <td></td>
                            <td><?php echo e($atrasos); ?></td>
                            <td><?php echo e($abandonos); ?></td>
                            <td><?php echo e($permisos); ?></td>
                            <td><?php echo e($faltas); ?></td>
                            <td><?php echo e($valor); ?></td>
                            <td><?php echo e($valor + $faltas); ?></td>
                            <?php if($valor == 0 && $faltas == 0): ?>
                                <?php
                                    $bonote = 0;
                                ?>
                            <?php endif; ?>
                            <td><?php echo e($bonote-$faltas); ?></td>
                            <td><?php echo e($no); ?></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/reportes/pdfs/pdfPersonal.blade.php ENDPATH**/ ?>