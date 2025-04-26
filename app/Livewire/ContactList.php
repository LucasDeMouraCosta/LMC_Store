<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Models\UserContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ContactList extends Component
{
    public $contacts;

    public $isCreating = false;
    public $newLabel = '';
    public $newNumber = '';

    public $editingContactId = null;

    protected $listeners = [
        'editingContact' => 'startEditing',
        'contactUpdated' => 'refreshList', 
        'contactDeleted' => 'removeContact'
    ];

    public function mount(){
        $this->loadContacts();
    }

    public function startCreating(){        
        $this->isCreating = true;
        $this->newLabel = '';
        $this->newNumber = '';

        $this->dispatch('apply-mask');
    }

    public function cancelCreating(){
        $this->isCreating = false;
        $this->newLabel = '';
        $this->newNumber = '';
    }

    public function saveNewContact(){

        $this->newNumber = preg_replace('/\D/', '', $this->newNumber);
        $this->newNumber = substr($this->newNumber, 0, 11);
    
        $this->dispatch('apply-mask');
        
        $validated = $this->validate([
            'newLabel' => [
                'required',
                'string',
                'max:30',
                Rule::unique('user_contacts', 'label')->where(function ($query) {
                    return $query->where('user_id', Auth::user()->id);
                }),
            ],
            'newNumber' => [
                'required',
                'digits:11',
                Rule::unique('user_contacts', 'number')->where(function ($query) {
                    return $query->where('user_id', Auth::user()->id);
                }),
            ],
        ], [], [
            'newLabel' => 'Descrição do contato', 
            'newNumber' => 'Telefone',
        ]);

        UserContact::create([
            'user_id' => Auth::id(),
            'label' => $this->newLabel,
            'number' => $this->newNumber,
        ]);

        $this->refreshList();

        $this->isCreating = false;
        $this->newLabel = '';
        $this->newNumber = '';
    }

    public function loadContacts(){
        $this->contacts = UserContact::where('user_id', Auth::user()->id)->orderBy('label')->get();
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
