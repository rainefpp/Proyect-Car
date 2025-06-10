<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\View\View;

class FormContact extends Component
{
    public $name, $email, $phone, $message;

    public function submitForm()
    {
        $contact['name'] = $this->name;
        $contact['email'] = $this->email;
        $contact['phone'] = $this->phone;
        $contact['message'] = $this->message;

        Mail::to(env('MAIL_USERNAME'))->send(new ContactFormMailable($contacto));
    }
    public function render(): View
    {
        return view('livewire.components.form-contact');
    }
}
