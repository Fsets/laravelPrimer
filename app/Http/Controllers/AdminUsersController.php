<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Foto;
use Illuminate\Support\Facades\Session;

use Spatie\LaravelIgnition\Exceptions\ViewExceptionWithSolution;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users= User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $entrada= $request->all();
        if($archivo=$request->file('foto_id')){ //si hay imagen
            $nombre= $archivo->getClientOriginalName(); 
            $archivo->move('images', $nombre);
            $foto= Foto::create(['ruta_foto'=> $nombre]);
            $entrada['foto_id'] = $foto->id;

        }
        //encriptar la contraseña
        $entrada['password']= bcrypt($request->password);
        User::create($entrada);

        /*
        User::create($request->all()); //envia la info a la bd q hemos insertado
        */
        return redirect('admin\users'); //redirecciona a esa pagina
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user= User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $user= User::findOrFail($id); //almacenamos usuario
        $entrada= $request->all();
        if($archivo=$request->file('foto_id')){ //si hay imagen
            $nombre= $archivo->getClientOriginalName(); 
            $archivo->move('images', $nombre);
            $foto= Foto::create(['ruta_foto'=> $nombre]);
            $entrada['foto_id'] = $foto->id;
        }
        $user->update($entrada); //actualiza la informacion en la bd

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user= User::findOrFail($id)->delete(); //almacenamos usuario y elimina el registro de la bd(borra el usuario)
        //1 parametro id de la sesion, 2 es el mensaje q sale cuando eliminamos un usuario
        Session::flash('usuario_borrado', 'El usuario ha sido eliminado con exito');
        return redirect('/admin/users');


    }
}
