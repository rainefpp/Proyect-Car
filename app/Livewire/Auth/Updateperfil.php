<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Updateperfil extends Component
{
    public $name;
    public $email;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

     public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }
    
    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();
        session()->flash('success', 'Perfil Modificado con éxito.');
        $this->linesVisible = false;
        $this->dispatch('profile-updated');
    }
    public function updatePassword()
{
    $this->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    if (!\Hash::check($this->current_password, Auth::user()->password)) {
        $this->addError('current_password', 'La contraseña actual no es correcta.');
        return;
    }

    $user = Auth::user();
    $user->password = \Hash::make($this->new_password);
    $user->save();

    session()->flash('success', 'Contraseña actualizada con éxito.');
    // Limpia los campos si quieres
    $this->current_password = $this->new_password = $this->new_password_confirmation = '';
}

    public function render()
    {
        return view('livewire.auth.updateperfil');
    }
}
