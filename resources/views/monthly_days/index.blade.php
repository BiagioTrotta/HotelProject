<x-main>

    <div class="container">
        <div class="row text-center my-5">
            <!-- Form per aggiungere un nuovo record -->
            <form action="{{ route('monthly_days.store') }}" method="POST">
                @csrf
                <label for="room_id">N. Room</label>
                <select name="room_id" id="room_id">
                    @foreach($rooms as $room)
                    <option value="{{$room->id}}">{{$room->numero}}</option>
                    @endforeach
                </select>
                <label for="user_id">User</label>
                <select name="user_id" id="user_id">
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                <label for="month">Month</label>
                <select name="month" id="month">
                    @foreach($months as $key => $month)
                    <option value="{{ $key }}">{{ $month }}</option>
                    @endforeach
                </select>
                <label for="day">Day</label>
                <input type="number" name="day" required>
                <button type="submit">Salva</button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>N. Room</th>
                        <th>Client</th>
                        <th>Month</th>
                        <th>Day</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($monthlyDays as $monthlyDay)
                    <tr>
                        <td>
                            {{ $monthlyDay->id }}
                        </td>
                        <td>
                            <form method="POST" action="{{ route('monthly_days.update', $monthlyDay->id)}}">
                                @csrf
                                @method('PUT')
                                <select name="room_id" id="room_id">
                                    @foreach($rooms as $room)
                                    <option value="{{$room->id}}" {{ $room->id == $monthlyDay->room_id ? 'selected' : '' }}>
                                        {{$room->numero}}
                                    </option>
                                    @endforeach
                                </select>
                                <button class="btn btn-sm btn-primary rounded-circle" type="submit"><i class="fa-regular fa-pen-to-square"></i></button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('monthly_days.update', $monthlyDay->id)}}">
                                @csrf
                                @method('PUT')
                                <select name="user_id" id="user_id">
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}" {{ $user->id == $monthlyDay->user_id ? 'selected' : '' }}>
                                        {{$user->name}}
                                    </option>
                                    @endforeach
                                </select>
                                <button class="btn btn-sm btn-primary rounded-circle p-auto" type="submit"><i class="fa-regular fa-pen-to-square"></i></button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('monthly_days.update', $monthlyDay->id)}}">
                                @csrf
                                @method('PUT')
                                <select name="month" id="month">
                                    @foreach($months as $key => $month)
                                    <option value="{{ $key }}" {{ $key == $monthlyDay->month ? 'selected' : '' }}>
                                        {{ $month }}
                                    </option>
                                    @endforeach
                                </select>
                                <button class="btn btn-sm btn-primary rounded-circle p-auto" type="submit"><i class="fa-regular fa-pen-to-square"></i></button>
                            </form>
                        </td>
                        <td>{{ $monthlyDay->day }}</td>
                        <td>
                            <form action="{{ route('monthly_days.destroy', $monthlyDay->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-main>