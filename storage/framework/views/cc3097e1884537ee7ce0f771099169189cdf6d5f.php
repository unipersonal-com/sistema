<div class="modal modal-success fade edit-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2"><b>Editar Grupo de Trabajo</b></h4>
            </div>
            <div class="modal-body" style="background: #CBDEED">
                <h4>Editar</h4>
                <?php echo Form::open(['route'=>['update.trabajo',Crypt::encrypt(0)], 'role' => 'form', 'method' => 'put']); ?>

                <?php echo Form::hidden('id_edit',null,["value"=>"0","id"=>'id_edit']); ?>

                <table class="table table-responsive">
                    <tr>
                        <td><?php echo Form::label('nombre_trabajo','Nombre Grupo de Trabajo:'); ?></td>

                        <td>
                            <?php echo Form::text('nombre_trabajo',null,["class"=>"form-control","id"=>'nombre_trabajo_edit']); ?>

                        </td>

                    </tr>

                </table>
                <button class="btn btn-primary" type="submit"> Guardar</button>
                <?php echo Form::close(); ?>


            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/grupotrabajo/modals/modal-edit.blade.php ENDPATH**/ ?>