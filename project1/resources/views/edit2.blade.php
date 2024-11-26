<!<!DOCTYPE html>
<html>
<head>
    <title>Edit Attendee</title>
</head>
<body>
    <h1>Edit Attendee</h1>

    <form method="POST" action="{{ route('update', $attendee->id) }}">
        @csrf
        @method('PUT') 

        <div>
            <label for="lastname">Lastname:</label>
            <input type="text" id="lastname" name="lastname" value="{{ old('lastname', $attendee->lastname) }}" >
        </div>

        <div>
            <label for="firstname">Firstname:</label>
            <input type="text" id="firstname" name="firstname" value="{{ old('firstname', $attendee->firstname) }}" >
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $attendee->email) }}" >
        </div>

        <div>
            <button type="submit">Update</button>
        </div>
    </form>

    <a href="{{ route('display') }}">Back to List</a>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>