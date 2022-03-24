<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h1 style="text-align: center; margin: 50px 0">Pagina para editar usuarios</h1>
    {!! Form::model($user,['method' => 'PATCH', 'action' => ['App\Http\Controllers\AdminUsersController@update',$user->id], 'files' => true]) !!}
    <table>
      <tr>
        <img src="/images/{{$user->foto ? $user->foto->ruta_foto : 'generica.jpg'}}" width="150"/>
      </tr>
      <tr>
        <td colspan="2">{!! Form::file('foto_id'); !!}</td>
      </tr>
      <tr>
        <td>{!! Form::label('name', 'Nombre: ');!!}</td>
        <td>{!! Form::text('name'); !!}</td>
      </tr>
      <tr>
        <td>{!! Form::label('email', 'E-Mail: ');!!}</td>
        <td>{!! Form::text('email'); !!}</td>
      </tr>
      <tr>
        <td>{!! Form::label('email', 'Verificar E-mail');!!}</td>
        <td>{!! Form::text('email_verified_at'); !!}</td>
      </tr>
      <tr>
        <td>{!! Form::label('role', 'Role: ');!!}</td>
        <td>{!! Form::text('role_id'); !!}</td>
      </tr>
      <tr>
        <td>{!! Form::submit('Modificar Usuario');!!}</td>
        <td>{!! Form::reset('Borrar Celdas');!!}</td>
      </tr>
    </table>
    {!! Form::close() !!}

    {!! Form::model($user,['method' => 'DELETE', 'action' => ['App\Http\Controllers\AdminUsersController@destroy',$user->id]]) !!}
    {!! Form::submit('Eliminar Usuario');!!}
    {!! Form::close() !!}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>  
