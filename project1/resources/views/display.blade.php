<!-- Show success message if it exists -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<table>
    <thead>
        <tr>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $attendee)
            <tr>
                <td>{{ $attendee->lastname }}</td>
                <td>{{ $attendee->firstname }}</td>
                <td>{{ $attendee->email }}</td>
                <td>{{ $attendee->gender }}</td>
                <td>
                    <a href="{{ route('edit', $attendee->id) }}">Edit</a>
                        <form method="POST" action="{{ route('delete', $attendee->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<form method="GET" action="{{ route('search') }}">
    <input type="text" name="query" placeholder="Search by Name or Email" value="{{ old('query', $query ?? '') }}">
    <button type="submit">Search</button>
</form>


