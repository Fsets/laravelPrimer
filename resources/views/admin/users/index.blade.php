<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    @if(Session::has('usuario_borrado'))
    <p class="bg-danger">{{session('usuario_borrado')}}</p>
    @endif
    <h1 style="text-align: center; margin: 50px 0">Pagina principal del admin</h1>
<table width="700" class="table">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Foto</th>
        <th scope="col">Role Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Email</th>
        <th scope="col">Creado</th>
        <th scope="col">Actualizado</th>
    </tr>
    @if($users) <!-- si no hay usuarios no muestra nada-->
        @foreach($users as $user) <!-- por cada dato en la bd se ejecuta el bucle-->
        <tr>
            <td>{{$user->id}}</td>
            @if($user->foto) <!-- si user tiene una foto:-->
            <td><img src="/images/{{$user->foto->ruta_foto}}" width="150px"/></td> 
            @else
            <td><img src="/images/generica.jpg" width="150px"/></td> <!-- inserta una imagen generica-->
            @endif
            <td>{{$user->role_id}}</td>
            <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td> <!-- al pulsar en el enlace ns lleva a users.edit-->
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
        </tr>
        @endforeach
    @endif
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>  
