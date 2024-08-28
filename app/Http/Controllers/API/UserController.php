<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // Tìm user theo ID
    protected function findUser($userId)
    {
        return User::findOrFail($userId);
    }

    // Tìm role theo tên
    protected function findRole($roleName)
    {
        return Role::where('name', $roleName)->firstOrFail();
    }

    // Tìm permission theo tên
    protected function findPermission($permissionName)
    {
        return Permission::where('name', $permissionName)->firstOrFail();
    }

    // Lấy tất cả người dùng
    public function index()
    {
        return User::all();
    }

    // Gán role cho user
    public function assignRoleToUser(Request $request, $userId)
    {
        $user = $this->findUser($userId);
        $role = $this->findRole($request->input('role'));

        if ($user->roles->isNotEmpty()) {
            return response()->json(['message' => 'User already has some role'], 400);
        }

        $user->assignRole($role->name);

        return response()->json(['message' => 'Role assigned successfully']);
    }

    // Xóa role khỏi user
    public function removeRoleFromUser(Request $request, $userId)
    {
        $user = $this->findUser($userId);
        $role = $this->findRole($request->input('role'));

        if (!$user->hasRole($role->name)) {
            return response()->json(['message' => 'User does not have this role'], 400);
        }

        $user->removeRole($role->name);

        return response()->json(['message' => 'Role removed successfully']);
    }

    // Cập nhật role của user
    public function updateRoleFromUser(Request $request, $userId)
    {
        $user = $this->findUser($userId);
        $role = $this->findRole($request->input('role'));

        if ($user->hasRole($role->name)) {
            return response()->json(['message' => 'User already has this role'], 400);
        }

        $user->syncRoles([$role->name]);

        return response()->json(['message' => 'Role updated successfully']);
    }

    // Gán permission cho user
    public function assignPermissionToUser(Request $request, $userId)
    {
        $user = $this->findUser($userId);
        $permission = $this->findPermission($request->input('permission'));

        $user->givePermissionTo($permission->name);

        return response()->json(['message' => 'Permission assigned successfully.']);
    }

    // Xóa permission khỏi user
    public function removePermissionFromUser(Request $request, $userId)
    {
        $user = $this->findUser($userId);
        $permission = $this->findPermission($request->input('permission'));

        if (!$user->hasPermissionTo($permission->name)) {
            return response()->json(['message' => 'User does not have this permission'], 400);
        }

        $user->revokePermissionTo($permission->name);

        return response()->json(['message' => 'Permission removed successfully.']);
    }

    // Cập nhật permission của user
    public function updatePermissionFromUser(Request $request, $userId)
    {
        $user = $this->findUser($userId);
        $permission = $this->findPermission($request->input('permission'));

        $user->syncPermissions([$permission->name]);

        return response()->json(['message' => 'Permission updated successfully.']);
    }
}
