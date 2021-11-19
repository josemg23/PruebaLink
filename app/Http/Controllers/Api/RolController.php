<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (){
        return view('cruds.roles.index');
    }

    public function CreateRol(){
        return view('cruds.roles.create');
    }
}
