<div class="modal fade create-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2"><b>Nuevo Personal</b></h4>
            </div>
            <div class="modal-body" style="background: #CBDEED">
                <h4>Nuevo</h4>
                <?php echo Form::open(['route'=>'rrhh.personalstore1', 'role' => 'form', 'method' => 'post']); ?>

                <table class="table table-responsive">
                    <?php echo $__env->make('rrhh::administrator.personal.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </table>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                <button class="btn btn-danger" type="cancel"><i class="fa fa-cance"></i> Cancelar</button>
                <?php echo Form::close(); ?>

                
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/administrator/personal/modals/modal-create.blade.php ENDPATH**/ ?>