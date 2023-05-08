<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;

class ContactInfo extends Component
{
    public $name, $address, $number, $email;
    public $contacts;

    public function render()
    {
        $contacts = Contact::get();
        return view('livewire.admin.contact-info', compact('contacts'));
    }
}