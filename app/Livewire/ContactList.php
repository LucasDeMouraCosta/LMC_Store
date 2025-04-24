<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Models\UserContact;
use Illuminate\Support\Facades\Auth;

class ContactList extends Component
{
    public $contacts;

    public $editingContactId = null;

    protected $listeners = [
        'editingContact' => 'startEditing',
        'contactUpdated' => 'refreshList', 
        'contactDeleted' => 'removeContact'
    ];

    public function mount()
    {
        $this->loadContacts();
    }

    public function loadContacts(){
        $this->contacts = UserContact::where('user_id', Auth::user()->id)->get();
    }

    public function refreshList(){
        $this->loadContacts();
    }

    public function removeContact($id){
        $this->contacts = $this->contacts->reject(fn($contact) => $contact->id == $id);
    }

    public function startEditing($contactId){
        $this->editingContactId = $contactId;
    }
    
    public function stopEditing(){
        $this->editingContactId = null;
    }
    
    public function render(){
        return view('livewire.contact-list', [
            'contacts' => $this->editingContactId
                ? $this->contacts->where('id', $this->editingContactId)
                : $this->contacts,
        ]);
    }
}
