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
    <h2>{{$title}}</h2>
    <div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Stanza</th>
                @for ($day = 1; $day <= $maxDay; $day++) <th>Giorno {{ $day }}</th>
                    @endfor
            </tr>
        </thead>
        <tbody>
            @foreach($month as $data)
            <tr>
                <td>Stanza {{ $data->room->numero }}</td>
                @for ($day = 1; $day <= $maxDay; $day++) @if (!empty($data["day_{$day}_user_id"])) <td class="bg-success">
                    <!--  {{ $users[$data["day_{$day}_user_id"] - 1]->name  }} -->
                    <form wire:submit.prevent="updateDayUser({{ $data->id }}, {{ $day }})">
                        @csrf
                        <input type="number" wire:model.defer="month[{{ $data->id }}][day_{{ $day }}_user_id]" placeholder="{{ $data->{'day_'.$day.'_user_id'} }}" style="width: 60px; padding: 5px;">
                        <button class="btn btn-outline-dark" type="submit"><i class="fa-solid fa-lock-open"></i></button>
                    </form>
                    <span class="fw-small font-monospace text-uppercase mx-2">{{ $users[$data->{'day_'.$day.'_user_id'}-1]->name ?? '' }}</span>
                    </td>
                    @else
                    <td>
                        <form method="POST" action="{{ route('april-days.update', $data->id) }}">
                            @csrf
                            @method('PUT')
                            <div style="display: flex; align-items: center;">
                                <input type="number" name="day_{{ $day }}_user_id" value="{{ $data->{'day_'.$day} }}" placeholder="{{ $data->{'day_'.$day.'_user_id'} }}" style="margin-right: 10px; width: 60px; padding: 5px;">
                                <button class="btn btn-outline-dark" type="submit" style="margin-right: 10px;"><i class="fa-solid fa-lock-open"></i></button>
                            </div>
                            <span class="fw-bold text-uppercase mx-2">Empty</span>
                        </form>
                        @endif
                    </td>
                    @endfor
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    @endif
</div>