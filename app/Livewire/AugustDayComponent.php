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
    public $days;

    public function render()
    {
        $data = August_day::all();
        $users = User::all();

        return view('livewire.august-day-component', compact('data', 'users'));
    }

    public function gestisciIntervalli()
    {
        $august = August_day::findOrFail($this->room_id);
        /* dd($this->user_id ,$this->start_day, $this->end_day, $this->room_id); */

        for ($day = $this->start_day; $day <= $this->end_day; $day++) {
            $column = 'day_' . $day . '_user_id';
            /* dd($column); */
            $august->$column = $this->user_id;
        }

        $august->save();

        session()->flash('success', 'Intervallo assegnato con successo.');

        $this->loadDays();
        $this->ClearList();
    }

    public function loadDays()
    {
        $this->days = August_day::all();
    }

    public function ClearList()
    {
     $this->room_id = '';
     $this->user_id = '';
     $this->start_day = '';
     $this->end_day = '';
     $this->days = '';
    }
}
