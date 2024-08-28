<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;


class PermissionController extends Controller
{
    public function index(){
        return Permission::all();
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|unique:permissions',
        ],[
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',]);

        $permission = Permission::create($request->only('name'));
        return response()->json($permission,201);
    }
    public function update(Request $request, Permission $permission){
        $request->validate([
            'name' => 'required|string|unique:permissions,name,'.$permission->id,
        ],[
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.unique' => 'The name has already been taken.'
        ]);
        $permission->update($request->only('name'));
        return response()->json($permission,200);
    }
    public function destroy(Permission $permission){
        $permission->delete();
        return response()->json(['message'=>'Permission deleted successfully'],204);
    }
    
}
