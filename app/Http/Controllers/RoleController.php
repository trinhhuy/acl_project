<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;
use App\Http\Requests\RoleRequest;
use Response;
use App\Permission_Role;
use App\Permission;
class RoleController extends Controller
{
	public function index(){
        $roles = Role::all();
        $role_first = Role::first();
        $role_permission = Permission_Role::permissionsOfRole($role_first->id);
        $permissions = Permission::all();
       //	dd($permissions);

        return view('admin.pages.role', array('roles' => $roles, 'menuActive' => 'role','role_permission' => $role_permission,'permissions' => $permissions));
    }

    public function store(RoleRequest $request){
        $role = Role::create($request->all());
        return Response::json(['flash_message' => 'Đã thêm role!', 'message_level' => 'success', 'message_icon' => 'check']);
    }
}
