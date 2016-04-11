<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;
use App\Http\Requests\RoleRequest;
use Response;

class RoleController extends Controller
{
	public function index(){
        $roles = Role::all();
        return view('admin.pages.role', array('roles' => $roles, 'menuActive' => 'role'));
    }

    public function store(RoleRequest $request){
        $role = Role::create($request->all());
        return Response::json(['flash_message' => 'Đã thêm role!', 'message_level' => 'success', 'message_icon' => 'check']);
    }
}
