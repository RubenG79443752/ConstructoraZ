<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator, Input, Redirect;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $roles = Rol::pluck('nombre_rol','id');
        $accion = "insertar";
        return view('user.create', compact('user','accion','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);
        $input = $request->all();

        $data['name'] = $input['name'];
        $data['email'] = $input['email'];
        $data['rol'] = $input['rol'];
        $data['usuario'] = $input['usuario'];
        $data['estado'] = $input['estado'];
        $data['password'] = Hash::make($input['password']);

        $user = User::create($data);

        return redirect()->route('users.index')
            ->with('success', 'Usuario registrado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Rol::pluck('nombre_rol','id');
        $accion = "modificar";
        return view('user.edit', compact('user','accion','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate(User::$ruless);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'Registro actualizado satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $mensaje = '';
        if($user->estado == 'Activo'){
            $user->estado = 'Inactivo';
            $mensaje = 'Usuario inactivo';
        }
        else{
            $user->estado = 'Activo';
            $mensaje = 'Usuario activado';

        }
        $user->save();

        return redirect()->route('users.index')
            ->with('success', $mensaje);
    }
    public function password_user(){
        return view('user.password');
    }
    public function updatePassword_user(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:3|max:15',
        ];

        $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'El mínimo permitido son 3 caracteres',
            'password.max' => 'El máximo permitido son 15 caracteres',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('/password_user')->withErrors($validator);
        }
        else{
            //dd(Auth::user()->password);
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);

                return redirect()->route('password_user')->with('success', 'Contraseña cambiada con éxito');
            }
            else
            {
                return redirect()->route('password_user')->with('danger', 'Credenciales incorrectas');
            }
        }
    }
}
