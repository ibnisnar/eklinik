<?php

namespace App\Livewire\AccessRight;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleList extends Component
{
    public $roles;
    public $permissions;
    public $roleName;
    public $selectedPermissions = [];
    public $newPermissionName = [];
    public $editRoleId;
    public $editRoleName;
    public $editSelectedPermissions = [];
    public $deleteRoleId = null;

    public function mount()
    {
        $this->roles = Role::with('permissions')->get();
        $this->permissions = Permission::all();
    }

    public function createRole()
    {
        $this->validate([
            'roleName' => 'required|string|max:255',
            'selectedPermissions' => 'array',
        ]);

        // Create the role
        $role = Role::create(['name' => $this->roleName]);

        // Assign permissions to the role
        if (!empty($this->selectedPermissions)) {
            $role->syncPermissions($this->selectedPermissions);
        }

        // Refresh the list of roles and permissions
        $this->roles = Role::all();

        // Reset form fields
        $this->roleName = '';
        $this->selectedPermissions = [];

        return redirect()->route('roles.index')->with('message', 'Peranan Berjaya Ditambah.');
    }

    public function openEditModal($roleId)
    {
        $role = Role::with('permissions')->find($roleId);
        if ($role) {
            $this->editRoleId = $role->id;
            $this->editRoleName = $role->name;
            $this->editSelectedPermissions = $role->permissions->pluck('id')->toArray();
        }
    }

    public function updateRole()
    {
        $this->validate([
            'editRoleName' => 'required|string|max:255',
            'editSelectedPermissions' => 'array',
        ]);

        $role = Role::find($this->editRoleId);
        if ($role) {
            $role->name = $this->editRoleName;
            $role->save();

            $role->permissions()->sync($this->editSelectedPermissions);

            // Refresh the roles list
            $this->roles = Role::with('permissions')->get();

            return redirect()->route('roles.index')->with('message', 'Peranan Berjaya Dikemaskini.');
        }
    }

    public function confirmDeleteRole($roleId)
    {
        $this->deleteRoleId = $roleId;
    }

    public function deleteRole()
    {
        $role = Role::find($this->deleteRoleId);
        if ($role) {
            $role->delete();

            // Refresh the roles list
            $this->roles = Role::with('permissions')->get();

            // Reset delete role id
            $this->deleteRoleId = null;

            return redirect()->route('roles.index')->with('message', 'Peranan Berjaya Dihapuskan.');
        }
    }

    public function addPermission()
    {
        $this->validate([
            'newPermissionName.*' => 'required|string|max:255',
        ]);

        foreach ($this->newPermissionName as $permissionName) {
            Permission::create(['name' => $permissionName]);
        }

        // Refresh permissions list
        $this->permissions = Permission::all();

        // Clear the input
        $this->newPermissionName = [];

        return redirect()->route('roles.index')->with('message', 'Kebenaran Berjaya Ditambah.');
    }

    public function deletePermission($id)
    {
        $permission = Permission::find($id);
        if ($permission) {
            $permission->delete();
            // Refresh permissions list
            $this->permissions = Permission::all();
            return redirect()->route('roles.index')->with('message', 'Kebenaran Berjaya Dihapus.');
        }
    }

    public function render()
    {
        return view('livewire.access-right.role-list', [
            'roles' => $this->roles,
            'permissions' => $this->permissions
        ])->layout('layouts.app');
    }
}
