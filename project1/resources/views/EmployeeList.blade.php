<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
          <th>id</th>
          <th>firstname</th>
          <th>lastname</th>
          <th>telephone</th>
          <th>address</th>
        </tr>
        @foreach ($data as $item)
        <tr>
            <th>{{$item->id}}</th>
            <th>{{$item->firstname}}</th>
            <th>{{$item->lastname}}</th>
            <th>{{$item->telephone}}</th>
            <th>{{$item->address}}</th>
          </tr>
        @endforeach
      </table>
    
</body>
</html>
