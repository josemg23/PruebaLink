<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


 

    public function index (){

        $users = User::orderBy('name','asc')->paginate(10);
        return view('cruds.users.index', compact('users'));
    }

    public function CreateUser(){

        $roles= Role::orderBy('name','asc')->get();
        return view('cruds.users.create', compact('roles'));
    }

    public function StoreUser(Request $request){

        //dd($request);
            
        $this->validate($request,[
            'name'            =>  'required|string',
            'email'           =>  'required|string|email|max:255|unique:users',
            'password'        =>  'required|string|min:8',
            'role'            =>  'required'
        ]);

            $user = new User();
            $user->name         = $request-> name;
            $user->email        = $request->email;   
            $user->role_id      = $request->role;  
            $user->password     = Hash::make($request->password); 
            $user->save();     
            
        return  redirect()->route('user.index')->with('success','Usuario Creado con Exito');

    }



    public function ShowUser(User $user){

        $roles= Role::orderBy('name','asc')->get();    
        $roluser=User::find($user->id)->role()->get();

        return view('cruds.users.show', compact('user', 'roles','roluser'));
      
    }   


    public function EditUser(User $user){
      
        $roles= Role::orderBy('name','asc')->get();    
        $roluser=User::find($user->id)->role()->get();

        return view('cruds.users.edit', compact('user', 'roles','roluser'));
    }

    public function UpdateUser(Request $request, User $user)
    {
        $this->validate($request,[
            'name'            =>  'required|string|max:255',
            'email'           => 'string|email|max:255,'.$user->id,
            'role'            =>  'required'
        ]);
      
        $user->update($request->all());
        if($request->get('role')){
          
            $user->role_id = $request->role;
          }
        $user->save();
        return redirect()->route('user.index')->with('success','Usuario Actualizado con Exito');
    }


    


    public function destroy(User $user)
    {
    
        $user->delete();
        return redirect()->route('user.index')->with('success','Usuario Eliminado con Exito');
    }


}
