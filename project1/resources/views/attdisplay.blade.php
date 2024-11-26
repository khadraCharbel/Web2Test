<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    @if ($attendees->isEmpty())
        <p>No attendees found matching your search.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendees as $attendee)
                    <tr>
                        <td>{{ $attendee->id }}</td>
                        <td>{{ $attendee->firstname }} {{ $attendee->lastname }}</td>
                        <td>{{ $attendee->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('display') }}">Back to List</a>

</body>
</html>

