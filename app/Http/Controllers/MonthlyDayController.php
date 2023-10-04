<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\MonthlyDay;
use Illuminate\Http\Request;

class MonthlyDayController extends Controller
{
    public function index()
    {
        $months = [
            1 => 'Gennaio',
            2 => 'Febbraio',
            3 => 'Marzo',
            4 => 'Aprile',
            5 => 'Maggio',
            6 => 'Giugno',
            7 => 'Luglio',
            8 => 'Agosto',
            9 => 'Settembre',
            10 => 'Ottobre',
            11 => 'Novembre',
            12 => 'Dicembre',
        ];
       $monthlyDays = MonthlyDay::all();
        $desiredMonth = 1; // Gennaio (puoi cambiare il mese desiderato)

        $monthlyDays = MonthlyDay::where('month', $desiredMonth)->get(); 
        
        $users = User::all();
        $rooms = Room::all();
        return view('monthly_days.index', compact('monthlyDays', 'months', 'users', 'rooms'));
    }

    public function create()
    {
        // Mostra il form per aggiungere un nuovo record
        return view('monthly_days.create');
    }

    public function store(Request $request)
    {
        /* dd($request->all()); */
        $record = MonthlyDay::create([
            'room_id' => $request->room_id,
            'user_id' => $request->user_id,
            'month' => $request->month,
            'day' => $request->day,

        ]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $monthlyDay = MonthlyDay::find($id);
        return view('monthly_days.edit', compact('monthlyDay'));
    }


    public function update(Request $request, $id)
    {
        $monthlyDay = MonthlyDay::find($id);
        $monthlyDay->update($request->all());

        return redirect()->back()->with('success', 'Dati aggiornati con successo.');
    }
}
