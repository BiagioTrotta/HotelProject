<x-main>
    <div class="container">
        <div class="row text-center">
            <h1>August Days Data</h1>
            @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
            @endif
        </div>
    </div>

    <div class="container rounded-2 p-2 mx-auto my-4">
        <form class="form-control bg-primary text-light text-center" method="POST" action="{{ route('gestisci-intervalli') }}">
            @csrf
            <div class="row">
                <div class="col-md-3 col-12 mb-3">
                    <label for="user_id" class="fw-bold ms-2">Select user:</label>
                    <select name="user_id" id="user_id">
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">#{{ $user->id }} - {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 col-12 mb-3">
                    <label for="start_day" class="fw-bold ms-2">Init of interval:</label>
                    <select name=" start_day" id="start_day">
                        @for ($day = 1; $day <= 31; $day++) <option value="{{ $day }}">Day {{ $day }}</option>
                            @endfor
                    </select>
                </div>
                <div class="col-md-3 col-12 mb-3">
                    <label for="end_day" class="fw-bold ms-2">End of interval:</label>
                    <select name=" end_day" id="end_day">
                        @for ($day = 1; $day <= 31; $day++) <option value="{{ $day }}">Day {{ $day }}</option>
                            @endfor
                    </select>
                </div>
                <div class="col-md-3 col-12 mb-3">
                    <label for="room_id" class="fw-bold ms-2">Select N. Room:</label>
                    <select name=" room_id" id="room_id">
                        @foreach ($data as $row)
                        <option value="{{ $row->id }}">{{ $row->room->numero }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-light mx-4 py-0" type="submit"><i class="fa-solid fa-circle-plus"></i></button>
                </div>
            </div>

        </form>
    </div>




    <h3>Primo Piano</h3>

    <div class="table-scroll-xy mb-5">
        <table class="table-bordered table table-striped table-hover">
            <thead>
                <tr>
                    <th>N.Room</th>
                    @for ($day = 1; $day <= 31; $day++) <th class="sticky-header">Day {{ $day }}</th>
                        @endfor
                        <th>N.Room</th>
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
                        <td class="text-center">{{ $row->room->numero }}</td>
                </tr>
                @php
                $count++;
                if ($count == 12) break; // Termina il ciclo dopo 12 righe
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>





    <h3>Secondo Piano</h3>






    <div class="table-scroll-xy mt-5">
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
                @if ($loop->index < 12) @continue @endif <tr>
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
                        @endforeach
            </tbody>
        </table>
    </div>


</x-main>