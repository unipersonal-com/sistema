
    <tr>
        <td>{!! Form::label('nombres','Nombres:')!!}</td>
        <td>{!! Form::text('nombres',null,["class"=>"form-control"])!!}</td>

        <td>{!! Form::label('apellidoP','Apellido paterno:') !!}</td>
        <td>{!! Form::text('apellidoP',null,["class"=>"form-control"]) !!}</td>
    </tr>
    <tr>
        <td>{!! Form::label('apellidoM',' Apellido materno:') !!}</td>
        <td>{!! Form::text('apellidoM',0,['class'=>'form-control','min'=>'0']) !!}</td>
        <td>{!! Form::label('ci','ingrese ci: ') !!}</td>
        <td>{!! Form::text('ci',0,['class'=>'form-control','min'=>'0']) !!}</td>
    </tr>
    <tr>
        <td>{!! Form::label('extension','Extension de C.I:') !!}</td>
        <td>{!! Form::text('extension',null,['class'=>'form-control']) !!}</td>

    </tr>
    
   
