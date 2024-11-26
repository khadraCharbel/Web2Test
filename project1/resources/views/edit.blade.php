<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Edit Movie</h1>
        <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $movie->title) }}" required>
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                <p class="mt-2">Current Thumbnail:</p>
                <img src="{{ asset('storage/' . $movie->thumbnail) }}" alt="Thumbnail" width="150">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $movie->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="production_year" class="form-label">Production Year</label>
                <input type="number" class="form-control" id="production_year" name="production_year" value="{{ old('production_year', $movie->production_year) }}" required>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration (in minutes)</label>
                <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration', $movie->duration) }}" required>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre', $movie->genre) }}" required>
            </div>
            <div class="mb-3">
                <label for="synopsis" class="form-label">Synopsis</label>
                <textarea class="form-control" id="synopsis" name="synopsis" rows="4" required>{{ old('synopsis', $movie->synopsis) }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update Movie</button>
            <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>l
