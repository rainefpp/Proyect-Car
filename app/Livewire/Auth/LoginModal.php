<?php

namespace App\Livewire\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Livewire\Forms\LoginForm;


class LoginModal extends Component

{
public LoginForm $form;
public $rules = [
        'form.email' => 'required|email',
        'form.password' => 'required|string|min:6',
    ];
     public function login(): void
    {
        $this->resetErrorBag();
        try{
        $this->validate();
        $this->form->authenticate();
        Session::regenerate();
        $this->redirectIntended(default: route('/', absolute: false), navigate: true);
        }catch (\Illuminate\Validation\ValidationException$e) {
            $this->addError('form.email', 'Mail o Contraseña incorrectos.');
        }
    }

    public function logout()
{
    Auth::logout();
    Session::invalidate();
    Session::regenerateToken();
    return redirect()->back(fallback: '/');
}
    public function render()
    {
        return view('livewire.auth.login-modal');
    }
}
