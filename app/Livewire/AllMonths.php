<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\January_day;
use App\Models\February_day;
use App\Models\March_day;
use App\Models\April_day;
use App\Models\May_day;
use App\Models\August_day;
use App\Models\September_day;
use App\Models\User;

class AllMonths extends Component
{
    public $month;
    public $maxDay;
    public $selectMonth;
    public $title;

    public $users;

    public function mount()
    {
        $this->users = User::all();
    }
    public function changeTable()
    {
        if ($this->selectMonth == 0) {
            $this->month = '';
            $this->maxDay = 30;
        } elseif ($this->selectMonth == 1) {
            $this->month = January_day::all();
            $this->maxDay = 31;
            $this->title = 'Gennaio';
        } elseif ($this->selectMonth == 2) {
            $this->month = February_day::all();
            $this->maxDay = 28;
            $this->title = 'Febbraio';
        } elseif ($this->selectMonth == 3) {
            $this->month = March_day::all();
            $this->maxDay = 31;
            $this->title = 'Marzo';
        } elseif ($this->selectMonth == 4) {
            $this->month = April_day::all();
            $this->maxDay = 30;
            $this->title = 'Aprile';
        } elseif ($this->selectMonth == 5) {
            $this->month = May_day::all();
            $this->maxDay = 31;
            $this->title = 'Maggio';
        } elseif ($this->selectMonth == 8) {
            $this->month = August_day::all();
            $this->maxDay = 31;
            $this->title = 'Agosto';
        } elseif ($this->selectMonth == 9) {
            $this->month = September_day::all();
            $this->maxDay = 30;
            $this->title = 'Settembre';
        }


    }
    public function render()
    {
        return view('livewire.all-months');
    }
}
