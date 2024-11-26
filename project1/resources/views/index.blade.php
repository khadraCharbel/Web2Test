
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies page</title>
</head>
<body>
    <div class="mb-3">
        <form action="{{ route('movies.search') }}" method="GET">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search movies..." value="{{ request('query') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
    <div class="container">
        <h1 class="mb-4">Movies List</h1>
        <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3">Add New Movie</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($movies->isEmpty())
            <tr>
                <td colspan="5" class="text-center">No movies found.</td>
            </tr>
        @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Thumbnail</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $movie->thumbnail) }}" alt="Thumbnail" width="100">
                        </td>
                        <td>{{ \Illuminate\Support\Str::limit($movie->description, 50) }}</td>
                        <td>
                            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" >Delete</button>
                            </form>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
