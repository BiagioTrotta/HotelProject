<x-main>

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
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<label for="day">Day</label>
     <input type="number" name="day" required>
    <button type="submit">Salva</button>
</form>


<table class="table table-bordered">
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
                <td>{{ $monthlyDay->id }}</td>
                <td>{{ $monthlyDay->room->numero }}</td>
                <td>{{ $monthlyDay->user->name }}</td>
                <td>{{ $months[$monthlyDay->month] }}</td>
                <td>{{ $monthlyDay->day }}</td>
                <td>
                    <a href="{{ route('monthly_days.edit', $monthlyDay->id) }}">Modifica</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Link per aggiungere un nuovo record -->
<a href="{{ route('monthly_days.create') }}">Aggiungi Record</a>
</x-main>