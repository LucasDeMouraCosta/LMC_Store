<?php

namespace App\Livewire;

use Livewire\Component;

class ContactCard extends Component
{
    public $contact;
    public $isEditing = false;

    public $labelEdit;
    public $numberEdit;

    public function mount($contact){
        $this->contact = $contact;
        $this->labelEdit = $contact->label;
        $this->numberEdit = $contact->number;
    }
    
    public function confirmDelete(){
        $this->dispatch('confirmingDelete', [
            'componentId' => $this->getId(),
            'label' => $this->contact->label,
        ]);
    }

    public function deleteContact(){
        $this->contact->delete();
        $this->dispatch('contactDeleted', $this->contact->id);
    }

    public function edit(){
        $this->isEditing = true;
    }

    public function cancelEdit(){
        $this->isEditing = false;
    }
    
    public function saveEdit(){
        $validated = $this->validate([
            'labelEdit' => 'required|string|max:255',
            'numberEdit' => 'required|string|max:20',
        ]);
    
        $this->contact->update([
            'label' => $validated['labelEdit'],
            'number' => $validated['numberEdit'],
        ]);
    
        $this->isEditing = false;
        
        $this->dispatch('contactUpdated');
        $this->dispatch('editingContact', null);
    }

    public function render(){
        return view('livewire.contact-card');
    }
}
