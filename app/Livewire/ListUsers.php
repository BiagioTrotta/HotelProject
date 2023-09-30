<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class ListUsers extends Component
{

    public $users;

    protected $listeners = [
        'loadUsers'
    ];

    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $this->users = User::all();
    }

    public function editUser($user_id)
    {
        $this->dispatch('edit', $user_id);
    }

    public function deleteUser($user_id)
    {
        $user = User::find($user_id);
        $user->delete();
        session()->flash('success', 'User successfully delete');
        $this->loadUsers();
    }

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        /* return view('livewire.list-users'); */
        return view('livewire.list-users', [
            'utenti' => User::paginate(3),
        ]);
    }
}
