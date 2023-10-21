<div>
    <form wire:submit.prevent="changeTable">
        <label for="selectMonth">Seleziona il mese:</label>
        <select wire:model="selectMonth" id="selectMonth">
            <option value="0" selected></option>
            <option value="1">Gennaio</option>
            <option value="2">Febbraio</option>
            <option value="3">Marzo</option>
            <option value="4">Aprile</option>
            <option value="5">Maggio</option>
            <option value="8">Agosto</option>
            <option value="9">Settembre</option>
        </select>
        <button type="submit">Visualizza</button>
    </form>

    {{-- Mostra i giorni del mese selezionato in una tabella --}}
    @if($month)
        <h2>Dati del mese</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Stanza</th>
                    @for ($day = 1; $day <= $maxDay; $day++)
                        <th>Giorno {{ $day }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach($month as $data)
                    <tr>
                        <td>Stanza {{ $data->room->numero }}</td>
                        @for ($day = 1; $day <= $maxDay; $day++)
                            <td>
                                @if (!empty($data["day_{$day}_user_id"]))
                                    {{ $users[$data["day_{$day}_user_id"] - 1]->name  }}
                                @endif
                            </td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
