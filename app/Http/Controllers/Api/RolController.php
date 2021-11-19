<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;

class RolController extends Controller
{
        public function __construct()
        {
            $this->middleware('auth');
        }

        public function index (Request $request){

            $roles=Role::orderBy('name','asc')->paginate(10);
            return view('cruds.roles.index', compact('roles'));
        }

        
        public function CreateRol(){
            return view('cruds.roles.create');
        }


        public function StoreRol(Request $request){

            
            $this->validate($request,[
                'name'=>'required|min:3|max:50|string|unique:roles,name',
                'descripcion'=>"required|min:3|max:50|string"
            ]);

                $role = new Role();
                $role->name         = $request-> name;
                $role->descripcion  = $request->descripcion;   
                $role->save();     
                
            return  redirect()->route('rol.index')->with('success','Rol Creado con Exito');

        }

        public function ShowRole(Role $role){
            return view('cruds.roles.show', compact('role'));
        }   


        public function EditRole(Role $role){
            return view('cruds.roles.edit', compact('role'));
        }



        public function UpdateRol(Request $request, Role $role)
        {
            $this->validate($request,[
                'name' => [ 'string', 'max:50','unique:roles,name,' .$role->id,],
                'descripcion' => [ 'string', 'max:50','unique:roles,descripcion,' .$role->id,],
            ]);
            $role->update($request->all());
           
            return redirect()->route('rol.index')->with('success','Rol Actualizado con Exito');
        }




        public function destroy(Role $role)
        {
        
            $role->delete();
            return redirect()->route('rol.index')->with('success','Rol Eliminado con Exito');
        }

}
