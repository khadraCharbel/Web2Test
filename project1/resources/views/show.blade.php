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
        <h1>{{ $movie->title }}</h1>
        <img src="{{ asset('storage/' . $movie->thumbnail) }}" alt="{{ $movie->title }}" class="img-fluid mb-3">
        <p><strong>Production Year:</strong> {{ $movie->production_year }}</p>
        <p><strong>Duration:</strong> {{ $movie->duration }} minutes</p>
        <p><strong>Genre:</strong> {{ $movie->genre }}</p>
        <p><strong>Synopsis:</strong> {{ $movie->synopsis }}</p>
    
        <h3>Reviews</h3>
        @if(!$movie->reviews)
            <p>No reviews yet.</p>
        @else
        @foreach ($movie->reviews as $review)
            <div class="mb-3">
                <h5>{{ $review->title }}</h5>
                <p>By {{ $review->user->name }} on {{ $review->created_at->format('d M Y') }}</p>
                <p>{{ $review->content }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>
