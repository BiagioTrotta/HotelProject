<div>
    <div class="container">
        <div class="row text-center">
            <h1>August Days Data</h1>
        </div>
    </div>
    <!-- Navbar camere -->
    <div class="container rounded-2 sticky-custom mt-5 text-center">
        <form class="form-control bg-custom text-light mt-5" wire:submit.prevent="gestisciIntervalli">
            <div class="row align-items-end">
                <div class="col-md-3 col-12 mb-3">
                    <label for="room_id" class="fw-bold ms-2">Select N. Room:</label>
                    <select wire:model.defer="room_id" class="form-select">
                        @foreach ($data as $row)
                        <option value="{{ $row->id }}">{{ $row->room->numero }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 col-12 mb-3">
                    <label for="start_day" class="fw-bold ms-2">Init of interval:</label>
                    <select wire:model.defer="start_day" class="form-select">
                        @for ($day = 1; $day <= 31; $day++) <option value="{{ $day }}">Day {{ $day }}</option>
                            @endfor
                    </select>
                </div>

                <div class="col-md-2 col-12 mb-3">
                    <label for="end_day" class="fw-bold ms-2">End of interval:</label>
                    <select wire:model.defer="end_day" class="form-select">
                        @for ($day = 1; $day <= 31; $day++) <option value="{{ $day }}">Day {{ $day }}</option>
                            @endfor
                    </select>
                </div>

                <div class="col-md-3 col-12 mb-3">
                    <label for="user_id" class="fw-bold ms-2">Select user:</label>
                    <select wire:model.defer="user_id" class="form-select">
                        <option value="null" Select>Null</option>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">#{{ $user->id }} - {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 col-12 mb-3 text-center">
                    <button class="btn btn-outline-light" type="submit"><i class="fa-solid fa-circle-plus"></i></button>
                </div>
            </div>
        </form>
        @if(session('success'))
        <div style="color: green; background: lightgrey;">{{ session('success') }}</div>
        @endif
    </div>

    <!-- Primo piano -->
    <div class="container">
        <div class="row text-center">
            <h3 class="mt-5 border-bottom border-2 fw-bold">Primo Piano</h3>
        </div>
    </div>

    <div class="container-fluid">
        <div class="table-scroll-xy mb-5">
            <table class="table-bordered table table-striped table-hover">
                <thead>
                    <tr>
                        <th>N.Room</th>
                        @for ($day = 1; $day <= 31; $day++) <th class="sticky-header">Day {{ $day }}</th>
                            @endfor
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count = 0;
                    @endphp
                    @foreach ($data as $row)
                    <tr>
                        <td class="text-center sticky-cell">{{ $row->room->numero }}</td>

                        @for ($day = 1; $day <= 31; $day++) @if($row->{'day_'.$day.'_user_id'})
                            <td class="bg-success">
                                <form method="POST" action="{{ route('august-days.update', $row->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div style="display: flex; align-items: center; justify-content: center;">
                                        <input type="number" name="day_{{ $day }}_user_id" value="{{ $row->{'day_'.$day} }}" placeholder="{{ $row->{'day_'.$day.'_user_id'} }}" style="margin-right: 10px; width: 60px; padding: 5px;">
                                        <button class="btn btn-outline-light" type="submit" style="margin-right: 10px;"><i class="fa-solid fa-lock"></i></button>
                                    </div>
                                    <span class="fw-small font-monospace text-uppercase mx-2 text-white">{{ $users[$row->{'day_'.$day.'_user_id'}-1]->name ?? '' }}</span>
                                </form>
                            </td>

                            @else
                            <td class="bg-light">
                                <form method="POST" action="{{ route('august-days.update', $row->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div style="display: flex; align-items: center;">
                                        <input type="number" name="day_{{ $day }}_user_id" value="{{ $row->{'day_'.$day} }}" placeholder="{{ $row->{'day_'.$day.'_user_id'} }}" style="margin-right: 10px; width: 60px; padding: 5px;">
                                        <button class="btn btn-outline-dark" type="submit" style="margin-right: 10px;"><i class="fa-solid fa-lock-open"></i></button>
                                    </div>
                                    <span class="fw-bold text-uppercase mx-2">Not Client</span>
                                </form>
                            </td>
                            @endif
                            @endfor
                    </tr>
                    @php
                    $count++;
                    if ($count == 12) break; // Termina il ciclo dopo 12 righe
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="container">
        <div class="row text-center">
            <h3 class="mt-5 border-bottom border-2 fw-bold">Secondo Piano</h3>
        </div>
    </div>

    <div class="container-fluid">
        <div class="table-scroll-xy mb-5">
            <table class="table-bordered table table-striped table-hover">
                <thead>
                    <tr>
                        <th>N.Room</th>
                        @for ($day = 1; $day <= 31; $day++) <th class="sticky-header">Day {{ $day }}</th>
                            @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                    @if ($loop->index < 12 ) @continue @endif <tr>
                        <td class="text-center sticky-cell">{{ $row->room->numero }}</td>

                        @for ($day = 1; $day <= 31; $day++) @if($row->{'day_'.$day.'_user_id'})
                            <td class="bg-success">
                                <form method="POST" action="{{ route('august-days.update', $row->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div style="display: flex; align-items: center; justify-content: center;">
                                        <input type="number" name="day_{{ $day }}_user_id" value="{{ $row->{'day_'.$day} }}" placeholder="#{{ $row->{'day_'.$day.'_user_id'} }}" style="margin-right: 10px; width: 60px; padding: 5px;">
                                        <button class="btn btn-outline-light" type="submit" style="margin-right: 10px;"><i class="fa-solid fa-lock"></i></button>
                                    </div>
                                    <span class="fw-small font-monospace text-uppercase mx-2 text-white">{{ $users[$row->{'day_'.$day.'_user_id'}-1]->name ?? '' }}</span>
                                </form>
                            </td>
                            @else
                            <td class="bg-light">
                                <form method="POST" action="{{ route('august-days.update', $row->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div style="display: flex; align-items: center;">
                                        <input type="number" name="day_{{ $day }}_user_id" value="{{ $row->{'day_'.$day} }}" placeholder="{{ $row->{'day_'.$day.'_user_id'} }}" style="margin-right: 10px; width: 60px; padding: 5px;">
                                        <button class="btn btn-outline-dark" type="submit" style="margin-right: 10px;"><i class="fa-solid fa-lock-open"></i></button>
                                    </div>
                                    <span class="fw-bold text-uppercase mx-2">Not Client</span>
                                </form>
                            </td>
                            @endif
                            @endfor
                            </tr>
                            @if ($loop->index == 22) {{-- Ferma il ciclo dopo 11 iterazioni (22 è l'indice dell'ultimo elemento desiderato) --}}
                            @break
                            @endif
                            @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Terzo piano -->
    <div class="container">
        <div class="row text-center">
            <h3 class="mt-5 border-bottom border-2 fw-bold">Terzo Piano</h3>
        </div>
    </div>

    <div class="container-fluid">
        <div class="table-scroll-xy mb-5">
            <table class="table-bordered table table-striped table-hover">
                <thead>
                    <tr>
                        <th>N.Room</th>
                        @for ($day = 1; $day <= 31; $day++) <th class="sticky-header">Day {{ $day }}</th>
                            @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                    @if ($loop->index < 23 ) @continue @endif <tr>
                        <td class="text-center sticky-cell">{{ $row->room->numero }}</td>

                        @for ($day = 1; $day <= 31; $day++) @if($row->{'day_'.$day.'_user_id'})
                            <td class="bg-success">
                                <form method="POST" action="{{ route('august-days.update', $row->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div style="display: flex; align-items: center; justify-content: center;">
                                        <input type="number" name="day_{{ $day }}_user_id" value="{{ $row->{'day_'.$day} }}" placeholder="#{{ $row->{'day_'.$day.'_user_id'} }}" style="margin-right: 10px; width: 60px; padding: 5px;">
                                        <button class="btn btn-outline-light" type="submit" style="margin-right: 10px;"><i class="fa-solid fa-lock"></i></button>
                                    </div>
                                    <span class="fw-small font-monospace text-uppercase mx-2 text-white">{{ $users[$row->{'day_'.$day.'_user_id'}-1]->name ?? '' }}</span>
                                </form>
                            </td>
                            @else
                            <td class="bg-light">
                                <form method="POST" action="{{ route('august-days.update', $row->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div style="display: flex; align-items: center;">
                                        <input type="number" name="day_{{ $day }}_user_id" value="{{ $row->{'day_'.$day} }}" placeholder="{{ $row->{'day_'.$day.'_user_id'} }}" style="margin-right: 10px; width: 60px; padding: 5px;">
                                        <button class="btn btn-outline-dark" type="submit" style="margin-right: 10px;"><i class="fa-solid fa-lock-open"></i></button>
                                    </div>
                                    <span class="fw-bold text-uppercase mx-2">Not Client</span>
                                </form>
                            </td>
                            @endif
                            @endfor
                            </tr>
                            @if ($loop->index == 33) {{-- Ferma il ciclo dopo 11 iterazioni (22 è l'indice dell'ultimo elemento desiderato) --}}
                            @break
                            @endif
                            @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>