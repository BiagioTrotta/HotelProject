<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class CreateUser extends Component
{
    public $is_admin;
    public $is_revisor;
    public $name;
    public $email;
    public $password;
    public $user;

    protected $rules = [
        'name' => 'required|min:4',
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    protected $messages = [
        'email.email' => 'The attribute: address format is not valid.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Esporta metodo edit
    protected $listeners = [
        'edit'
    ];

    public function createUser()
    {
        // Validazione dei dati
        $this->validate();

        // Controlla se stai creando un nuovo utente o modificando un utente esistente
        if ($this->user) {
            // Modifica l'utente esistente
            $this->user->update([
                'is_admin' => $this->is_admin,
                'is_revisor' => $this->is_revisor,
                'name' => $this->name,
                'email' => $this->email, // Non è necessario verificare l'unicità qui
                'password' => bcrypt($this->password),
            ]);

            // Emetti un messaggio di successo
            session()->flash('success', 'Utente modificato con successo.');
        } else {
            // Verifica l'unicità dell'email solo quando stai creando un nuovo utente
            $existingUser = User::where('email', $this->email)->first();

            if ($existingUser) {
                // L'utente con questa email esiste già nel database
                session()->flash('error', 'The email entered is already associated with another user.');
            } else {
                // Creazione di un nuovo utente
                User::create([
                    'is_admin' => $this->is_admin,
                    'is_revisor' => $this->is_revisor,
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => bcrypt($this->password),
                ]);

                // Emetti un messaggio di successo
                session()->flash('success', 'Utente creato con successo.');
            }
        }

        // Pulisci i campi del modulo dopo la creazione o la modifica
        $this->newUser();

        $this->dispatch('loadUsers');
    }



    public function mount()
    {
        $this->newUser();
    }

    // Creazione nuovo utente
    public function newUser()
    {
        $this->user = '';
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    //Edita utente
    public function edit($user_id)
    {
        $this->user = \App\Models\User::find($user_id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->password = '';

        if($this->user->is_admin != 1 || $this->user->is_admin == null){
            $this->is_admin = false;
        }
        else
        {
            $this->is_admin = true;
        };
        if ($this->user->is_revisor != 1 || $this->user->is_revisor == null)
        {
            $this->is_revisor = false;
        }
        else
        {
            $this->is_revisor = true;
        };

    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
