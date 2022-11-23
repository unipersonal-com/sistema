    <!-- Modal -->
    <div class="modal modal-success fade reportetc-modal-sm" id="reportetc" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #113F63;color:#fff">
                    <h5 class="modal-title" style="font-size: 17; font-weight: bold; text-transform: uppercase; text-align: center;">Colocar datos para el reporte de Asistencias de Tipo Contrato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body" style="background: #CBDEED">
                    <table class="table table-responsive">
                        <form class="reporte">
                        <tr>
                           <td>
                           <label for="tc" class="form-label">Tipo de Contrato</label>
                           <select class="form-control" name="tc" id="tc">
                                <?php $__currentLoopData = $tipocontrato; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contrato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>;
                                    <option value="0" selected disabled hidden>seleccione</option>
                                    <option value="<?php echo e($contrato->id); ?>"><?php echo e($contrato->nombre_tipo_contrato); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </select>
                           </td> 
                        </tr>

                        <tr>
                            <td>
                              <label for="fecha1tc" class="form-label">Fecha_inicio</label>
                              <input type="date" class="form-control" name="fecha1tc" id="fecha1tc" placeholder="2022-10-12">
                           </td> 
                           <td>
                              <label for="fecha2tc" class="form-label">Fecha_fin</label>
                              <input type="date" class="form-control" name="fecha2tc" id="fecha2tc" placeholder="2022-10-12">
                           </td> 
                        </tr>
                        </form>

                    </table>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success reportetc" id="reportetcgenerar"> <i class="fa fa-download"></i>  Descargar</button>
                    <a class="as" id="as" target="_blank"></a>

                </div>

            </div>
        </div>
    </div>
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/reportes/modals/modal-repotetc.blade.php ENDPATH**/ ?>