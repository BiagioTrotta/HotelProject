<?php

namespace App\Http\Controllers;

use App\Models\August_day;
use App\Models\User;
use Illuminate\Http\Request;

class AugustDayController extends Controller
{
    public function index()
    {
        $data = August_day::all();
        $users = User::all();
        return view('august.index', compact('data', 'users'));
    }

    public function update(Request $request, $id)
    {
        $august = August_day::findOrFail($id);

        $august->update($request->all());
        return redirect()->back()->with('success', 'Dati aggiornati con successo.');
    }

    public function gestisciIntervalli(Request $request)
    {

        $roomId = $request->room_id;
        $userId = $request->user_id;
        $startDay = $request->start_day;
        $endDay = $request->end_day;

        // Trova il record nella tabella 'august_days' basato sull'ID della camera
        $august = August_day::findOrFail($request->room_id);

        // Aggiorna le colonne per gli utenti nei giorni specificati nell'intervallo
        for ($day = $startDay; $day <= $endDay; $day++) {
            $column = 'day_' . $day . '_user_id';
            $august->$column = $userId;
        }

        // Salva le modifiche nel database
        $august->save();

        return redirect()->back()->with('success', 'Intervallo assegnato con successo.');
    }

    public function gestisciIntervalli11(Request $request)
    {

        $august = August_day::findOrFail($request->room_id);
        $august->update([
            'room_id' => $request->room_id,
            'day_' . $request->start_day . '_user_id' => $request->user_id,
            'day_' . $request->end_day . '_user_id' => $request->user_id,
        ]);

        return redirect()->back()->with('success', 'Intervallo assegnato con successo.');
    }

}