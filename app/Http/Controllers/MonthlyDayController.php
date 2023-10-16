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
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];

       /* $monthlyDays = MonthlyDay::all(); */
          $monthlyDays = MonthlyDay::orderBy('month')->orderBy('checkin')->orderBy('room_id')->get();
       /*  $desiredMonth = 1; // Gennaio (puoi cambiare il mese desiderato)

        $monthlyDays = MonthlyDay::where('month', $desiredMonth)->get();  */

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
    
    $record = MonthlyDay::create([
        'room_id' => $request->room_id,
        'user_id' => $request->user_id,
        'month' => $request->month,
        'checkin' => $request->input('day_start', 1) ?? now(), // Usa la data e ora corrente come valore predefinito se checkin non è specificato
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

    public function destroy($id)
    {
        $monthlyDay = MonthlyDay::find($id);
        $monthlyDay->delete();
        return redirect()->back();
    }
}
