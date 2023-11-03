<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\January_day;
use App\Models\February_day;
use App\Models\March_day;
use App\Models\April_day;
use App\Models\May_day;
use App\Models\june_day;
use App\Models\july_day;
use App\Models\August_day;
use App\Models\September_day;
use App\Models\October_day;
use App\Models\November_day;
use App\Models\User;

class MonthsController extends Controller
{
    public function index()
    {
        $data = August_day::all();
        $users = User::all();
        return view('august.index', compact('data', 'users'));
    }

    public function index1()
    {
        return view('months.january');
    }

    public function index2()
    {
        return view('months.february');
    }

    public function index3()
    {
        return view('months.march');
    }
    
    public function index4()
    {
        return view('months.april');
    }

    public function index5()
    {
        return view('months.may');
    }

    public function index6()
    {
        return view('months.june');
    }

    public function index7()
    {
        return view('months.july');
    }

    public function index8()
    {
        return view('months.august');
    }

    public function index9()
    {
        return view('months.september');
    }

    public function index10()
    {
        return view('months.october');
    }

    public function index11()
    {
        return view('months.november');
    }

    public function index12()
    {
        return view('months.december');
    }

    public function indexAll()
    {
        return view('months.all');
    }

    


    public function update1(Request $request, $id)
    {
        $january = January_day::findOrFail($id);

        $january->update($request->all());
        return redirect()->back()->with('success', 'Dati aggiornati con successo.');
    }

    public function update2(Request $request, $id)
    {
        $february = February_day::findOrFail($id);

        $february->update($request->all());
        return redirect()->back()->with('success', 'Dati aggiornati con successo.');
    }

    public function update3(Request $request, $id)
    {
        $march = March_day::findOrFail($id);

        $march->update($request->all());
        return redirect()->back()->with('success', 'Dati aggiornati con successo.');
    }

    public function update4(Request $request, $id)
    {
        $april = April_day::findOrFail($id);

        $april->update($request->all());
        return redirect()->back()->with('success', 'Dati aggiornati con successo.');
    }

    public function update5(Request $request, $id)
    {
        $may = May_day::findOrFail($id);

        $may->update($request->all());
        return redirect()->back()->with('success', 'Dati aggiornati con successo.');
    }

    public function update6(Request $request, $id)
    {
        $june = June_day::findOrFail($id);

        $june->update($request->all());
        return redirect()->back()->with('success', 'Dati aggiornati con successo.');
    }

    public function update7(Request $request, $id)
    {
        $july = July_day::findOrFail($id);

        $july->update($request->all());
        return redirect()->back()->with('success', 'Dati aggiornati con successo.');
    }

    public function update8(Request $request, $id)
    {
        $august = August_day::findOrFail($id);

        $august->update($request->all());
        return redirect()->back()->with('success', 'Dati aggiornati con successo.');
    }


    public function update9(Request $request, $id)
    {
        $september = September_day::findOrFail($id);

        $september->update($request->all());
        return redirect()->back()->with('success', 'Dati aggiornati con successo.');
    }

    public function update10(Request $request, $id)
    {
        $october = October_day::findOrFail($id);

        $october->update($request->all());
        return redirect()->back()->with('success', 'Dati aggiornati con successo.');
    }
    

    public function update11(Request $request, $id)
    {
        $november = November_day::findOrFail($id);

        $november->update($request->all());
        return redirect()->back()->with('success', 'Dati aggiornati con successo.');
    }

    public function updateAll(Request $request, $id)
    {
        $january = January_day::findOrFail($id);

        $january->update($request->all());
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
