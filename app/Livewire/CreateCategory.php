<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CreateCategory extends Component
{
    public $name;
    public $category;

    protected $rules = [
        'name' => 'required|min:4',
    ];

    protected $messages = [
        'name.required' => 'The attribute: is required.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Esporta metodo edit
    protected $listeners = [
        'edit'
    ];

    public function createCategory()
    {
        // Validazione dei dati
        $this->validate();

        if ($this->category) {
            // Modifica l'utente esistente
            $this->category->update([
                'name' => $this->name,
            ]);

            session()->flash('success', 'Utente modificato con successo.');
            $this->newCategory();

            $this->dispatch('loadCategories');
        }
        else
        {
            Category::create([
                'name' => $this->name,
            ]);

            // Emetti un messaggio di successo
            session()->flash('success', 'Categoria creata con successo.');
            $this->newCategory();

            $this->dispatch('loadCategories');
        }

    }


    public function mount()
    {
        $this->newCategory();
    }

    // Creazione nuovo utente
    public function newCategory()
    {
        $this->category = '';
        $this->name = '';
    }

    //Edita utente
    public function edit($category_id)
    {
        $this->category = \App\Models\Category::find($category_id);
        $this->name = $this->category->name;
    }

    public function render()
    {
        return view('livewire.create-category');
    }
}
