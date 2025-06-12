<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\View\View;
use App\Mail\ContactFormSubmitted;

class FormContact extends Component
{
    public $name, $email, $phone, $message;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'phone' => 'required|regex:/^\+?[0-9\s\-\(\)]{7,}$/',
        'message' => 'required|min:10',
    ];

    protected $messages = [
        'phone.regex' => 'El formato del teléfono no es válido. Ej: +34 123 456 789',
    ];

    public function submitForm()
    {
        $this->validate();

        Mail::to('contacto@tudominio.com')->send(
            new ContactFormSubmitted($this->name, $this->email, $this->phone, $this->message)
        );

        $this->reset();
        session()->flash('success', '¡Mensaje enviado! Gracias por contactarnos.');
    }
    public function render(): View
    {
        return view('livewire.components.form-contact');
    }
}
