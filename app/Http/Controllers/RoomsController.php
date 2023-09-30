<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ManagerRoom;
use Illuminate\Http\Request;
use App\Models\RoomAvailability;
use App\Models\MonthlyAvailability;

class RoomsController extends Controller
{

    public function index()
    {
        $rooms = ManagerRoom::all();
        $users = User::all();

        return view('rooms.table_rooms', compact('rooms', 'users'));
    }

    public function on_of(ManagerRoom $managerRoom, $id, $id2)
    {
        $dayroom = ManagerRoom::findOrFail($id); // Trova la stanza in base all'ID

        $dayColumnName = "day_" . $id2; // Costruisci il nome della colonna basato sul giorno

        // Inverti lo stato della colonna
        $dayroom->$dayColumnName = !$dayroom->$dayColumnName;

        // Salva le modifiche nel database
        $dayroom->save();

        // Restituisci una risposta o reindirizza come desiderato
        return redirect()->back();
    }

    public function aggiornaGiorni(Request $request)
    {
        $room_id = $request->input('room_id');
        $giorni = explode(',', $request->input('giorni'));

        $dayroom = ManagerRoom::where('room_id', $room_id)->firstOrFail();

        foreach ($giorni as $giorno) {
            $dayColumnName = "day_" . $giorno;
            $dayroom->$dayColumnName = !$dayroom->$dayColumnName;
        }

        $dayroom->save();

        // Restituisci una risposta o reindirizza come desiderato
        return redirect()->back();
    }

    public function aggiornaGiorni1(Request $request)
    {
        $room_id = $request->input('room_id');
        $action = $request->input('action');
        $startDay = $request->input('start_day');
        $endDay = $request->input('end_day');

        // Esegui la validazione e le operazioni come necessario...

        // Ottenere il record del manager_rooms per la stanza selezionata
        $dayroom = ManagerRoom::where('room_id', $room_id)->firstOrFail();

        // Imposta tutti i giorni nell'intervallo come "true" o "false" a seconda dell'azione selezionata
        $value = ($action === "true");

        // Aggiorna gli stati dei giorni nell'intervallo specificato
        for ($day = $startDay; $day <= $endDay; $day++) {
            $dayColumnName = "day_" . $day;
            $dayroom->$dayColumnName = $value;
        }

        // Salva le modifiche nel database
        $dayroom->save();

        // Restituisci una risposta o reindirizza come desiderato
        return redirect()->back()->with('success', 'Intervalli di giorni aggiornati con successo.');
    }

    public function associareUtenteAGiorno(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'day_id' => 'required|string',
        ]);

        list($roomId, $day) = explode('_', $data['day_id']);

        $user = User::findOrFail($data['user_id']);
        $dayroom = ManagerRoom::findOrFail($roomId);

        // Associa l'utente al giorno
        $user->managerRooms()->attach($dayroom, ['day' => $day]);

        // Restituisci una risposta o reindirizza come desiderato
        return redirect()->back()->with('success', 'Utente associato al giorno con successo.');
    }
}
