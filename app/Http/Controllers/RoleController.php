<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        return Role::all();
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|unique:roles',
        ],[
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.unique' => 'The name has already been taken.'
        ]);

        $role = Role::create($request->only('name'));

        return response()->json($role,201);
    }
    public function update(Request $request,Role $role,){
        $request->validate([
            'name' =>'required|string|unique:roles,name,'.$role->id,
        ],[
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.unique' => 'The name has already been taken.'
        ]);

        $role->update($request->only('name'));

        return response()->json($role,200);
    }

    public function destroy(Role $role){
        $role->delete();
        return response()->json(['message'=>'Role deleted successfully'],204);
    }


}
