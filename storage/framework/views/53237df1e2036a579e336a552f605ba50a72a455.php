
    <tr>
        <td><?php echo Form::label('nombres','Nombres:'); ?></td>
        <td><?php echo Form::text('nombres',null,["class"=>"form-control"]); ?></td>

        <td><?php echo Form::label('apellidoP','Apellido paterno:'); ?></td>
        <td><?php echo Form::text('apellidoP',null,["class"=>"form-control"]); ?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('apellidoM',' Apellido materno:'); ?></td>
        <td><?php echo Form::text('apellidoM',0,['class'=>'form-control','min'=>'0']); ?></td>
        <td><?php echo Form::label('ci','ingrese ci: '); ?></td>
        <td><?php echo Form::text('ci',0,['class'=>'form-control','min'=>'0']); ?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('extension','Extension de C.I:'); ?></td>
        <td><?php echo Form::text('extension',null,['class'=>'form-control']); ?></td>

    </tr>
    
   
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/administrator/personal/form.blade.php ENDPATH**/ ?>