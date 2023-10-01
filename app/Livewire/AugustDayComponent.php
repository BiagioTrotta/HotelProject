<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\August_day;
use App\Models\User;

class AugustDayComponent extends Component
{
    public $room_id;
    public $user_id;
    public $start_day;
    public $end_day;
    public $data;
    public $users;

    protected function rules()
    {
        return [
            'room_id' => 'required',
            'user_id' => 'required',
            'start_day' => 'required',
            'end_day' => 'required',
        ];
    }

    public function gestisciIntervalli2()
    {
        $august = August_day::findOrFail($this->room_id);
        $august->update([
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
        $august = August_day::findOrFail($this->room_id);

        for ($day = $this->start_day; $day <= $this->end_day; $day++) {
            $column = 'day_' . $day . '_user_id';
            /* dd($column); */
            $august->$column = $this->user_id;
        }

        $august->save();

        session()->flash('success', 'Intervallo assegnato con successo.');

        $this->loadDays();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->room_id = 1; // Inizializza con un valore predefinito o qualsiasi altro valore appropriato
        $this->user_id = 1; // Inizializza con un valore predefinito o qualsiasi altro valore appropriato
        $this->start_day = 1; // Inizializza con un valore predefinito o qualsiasi altro valore appropriato
        $this->end_day = 1; // Inizializza con un valore predefinito o qualsiasi altro valore appropriato
        $this->loadDays();
    }

    public function loadDays()
    {
        $this->data = August_day::all();
        $this->users = User::all();
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
        $data = August_day::all();
        $users = User::all();

        return view('livewire.august-day-component');
    }
}
