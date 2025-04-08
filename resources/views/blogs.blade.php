<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body>
    <div class="blog-container">
        <!-- Blog Header -->
        <div class="blog-header">
            <h1>{{ $blog->title }}</h1>
            <p class="category">Category: <span>{{ $blog->category->title }}</span></p>
        </div>

        <!-- Blog Image & Content -->
        <div class="blog-content-wrapper">
        <img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->title }}" class="blog-image">
            <div class="blog-content">
                <p>{{ $blog->content }}</p>
            </div>
        </div>

        <!-- Comments Section -->
        
    </div>
</body>
</html>

