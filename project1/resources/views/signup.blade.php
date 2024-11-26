<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>
    <form method="POST" action="/register2">
        @csrf
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" >
        <br>
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" >
        <br>
        <label>Gender:</label>
        <br>
        <input type="radio" id="male" name="gender" value="Male" >
        <label for="male">Male</label>
        <br>
        <input type="radio" id="female" name="gender" value="Female" >
        <label for="female">Female</label>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" >
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" >
        <br>
        <button type="submit">Register</button>
    </form>
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

