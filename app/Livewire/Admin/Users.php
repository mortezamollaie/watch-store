<?php

namespace App\Livewire\Admin;

use App\Enums\UserStatus;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    protected  $paginationTheme = 'bootstrap';
    public $search ='';

    public function changeUserStatus($id)
    {
        $user = User::query()->find($id);
        if($user->status == UserStatus::ACTIVE->value){
            $user->update(['status' => UserStatus::INACTIVE->value]);
        }else{
            $user->update(['status' => UserStatus::ACTIVE->value]);
        }
    }

    public function render()
    {
        $users = User::query()
            ->where('name', 'like', '%'.$this->search.'%')
            ->orWhere('mobile', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->paginate(4);
        return view('livewire.admin.users', compact('users'));
    }
}
