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
        $this->labelEdit = $this->contact->label;
        $this->numberEdit = $this->contact->number;
        $this->dispatch('editingContact', $this->contact->id);
        $this->isEditing = true;
    }

    public function cancelEdit(){
        $this->dispatch('editingContact', null);
        $this->resetErrorBag();
        $this->isEditing = false;
    }
    
    public function saveEdit(){
        $this->numberEdit = preg_replace('/\D/', '', $this->numberEdit);
        $this->numberEdit = substr($this->numberEdit, 0, 11);
    
        $this->dispatch('apply-mask');
        
        
        $validated = $this->validate([
            'labelEdit' => 'required|string|max:255',
            'numberEdit' => ['required', 'digits:11'],
        ], [], [
            'labelEdit' => 'Descrição do contato', 
            'numberEdit' => 'Telefone',
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
