<?php

namespace App\Livewire\AccessRight;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoles extends Component
{
    public $users;
    public $roles;
    public $editUserId;
    public $selectedRole;

    public function mount()
    {
        $this->users = User::with('roles.permissions')->get();
        $this->roles = Role::with('permissions')->get();
    }

    public function openEditModal($userId)
    {
        $this->editUserId = $userId;
        $user = User::find($userId);
        $this->selectedRole = $user->roles->first() ? $user->roles->first()->id : null;
    }

    public function updateRole()
    {
        $user = User::find($this->editUserId);
        $role = Role::find($this->selectedRole);

        if ($user && $role) {
            $user->syncRoles($role); // Update user roles
        }

        $this->editUserId = null;
        $this->users = User::with('roles.permissions')->get(); // Refresh users data

        return redirect()->route('users-roles.index')->with('message', 'Peranan Pengguna Berjaya Dikemaskini.');
    }

    public function render()
    {
        return view('livewire.access-right.user-roles', [
            'users' => $this->users,
            'roles' => $this->roles
        ])->layout('layouts.app');
    }
}