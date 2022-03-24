<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h1>Pagina para agregar usuarios</h1>

    {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\AdminUsersController@store', 'files' => true]) !!}
    <table>
      <tr>
        <td>{!! Form::label('name', 'Nombre: ');!!}</td>
        <td>{!! Form::text('name'); !!}</td>
      </tr>
      <tr>
        <td>{!! Form::label('password', 'Password: ');!!}</td>
        <td>{!! Form::text('password'); !!}</td>
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
        <td>{!! Form::label('foto_id', 'Foto: ');!!}</td>
        <td>{!! Form::file('foto_id'); !!}</td>
      </tr>
      <tr>
        <td>{!! Form::submit('Crear Usuario');!!}</td>
        <td>{!! Form::reset('Borrar Celdas');!!}</td>
      </tr>
    </table>
    {!! Form::close() !!}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>  
