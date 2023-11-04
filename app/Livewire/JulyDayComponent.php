<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\July_day;
use App\Models\User;
use App\Models\Client;

class JulyDayComponent extends Component
{
    public $room_id;
    public $user_id;
    public $start_day;
    public $end_day;
    public $data;
    public $users;

    public $day;

    protected function rules()
    {
        return [
            'room_id' => 'required',
            /* 'user_id' => 'required', */
            'start_day' => 'required',
            'end_day' => 'required',
        ];
    }

    public function update2()
    {   
        dd($this->room_id,$this->user_id );
        $july = July_day::findOrFail($this->room_id);

        $july->update($this->user_id);
        return redirect()->back()->with('success', 'Dati aggiornati con successooo.');
    }

    public function update()
{
    dd($this->room_id, $this->user_id, $this->day);

    // Trova il record August_day specifico in base a room_id
    $july = July_day::findOrFail($this->room_id);

    // Costruisci il nome della colonna del giorno specifico
    $column = 'day_' . $this->day . '_user_id';

    // Aggiorna l'ID utente nel record
    $july->$column = $this->user_id;
    $july->save();

    $this->loadDays();
}

    

    public function gestisciIntervalli2()
    {
        $july = July_day::findOrFail($this->room_id);
        $july->update([
            'room_id' => $this->room_id,
            'day_' . $this->start_day . '_user_id' => $this->user_id,
            'day_' . $this->end_day . '_user_id' => $this->user_id,
        ]);

        session()->flash('success', 'Intervallo assegnato con successo.');

        $this->loadDays();
    }

    public function gestisciIntervalli()
    {
        /* dd($this->user_id ,$this->start_day, $this->end_day, $this->room_id); */
        $this->validate();
        $july = July_day::findOrFail($this->room_id);

        for ($day = $this->start_day; $day <= $this->end_day; $day++) {
            $column = 'day_' . $day . '_user_id';
            /* dd($column); */
            $july->$column = $this->user_id;
        }

        $july->save();

        session()->flash('success', 'Intervallo assegnato con successo.');

        $this->loadDays();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->room_id = 1;  // Inizializza con un valore predefinito o qualsiasi altro valore appropriato
        $this->user_id = null;  // Inizializza con un valore predefinito o qualsiasi altro valore appropriato
        $this->start_day = 1; // Inizializza con un valore predefinito o qualsiasi altro valore appropriato
        $this->end_day = 1; // Inizializza con un valore predefinito o qualsiasi altro valore appropriato
        $this->loadDays();
    }

    public function loadDays()
    {
        $this->data = July_day::all();
        $this->users = Client::all();
    }

    public function ClearList()
    {
     $this->room_id = '';
     $this->user_id = '';
     $this->start_day = '';
     $this->end_day = '';
    }

    public function render()
    {
        $data = July_day::all();
        $users = Client::all();

        return view('livewire.july-day-component');
    }
    
}
