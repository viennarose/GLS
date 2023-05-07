<?php

namespace App\Http\Livewire\Admin;


use Livewire\Component;

class Contact extends Component
{

    public $name, $address, $number, $email;
    public $message;

    public function mount($id)
    {
        $contact = Contact::find($id);
        if($contact == 1){
            $this->name = $contact->id;
            $this->title = $contact->title;

        }else{
            return redirect('admin/resources');
        }
        $this->name = 'Hello, world!';
    }
    public function render()
    {
        return view('livewire.admin.contact');
    }
}
