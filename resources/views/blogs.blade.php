@extends('layouts.blog')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0 overflow-hidden rounded-4">
        <div class="row g-0">
            <div class="col-md-6">
                <img src="{{ asset('storage/'.$blogs->image) }}" class="img-fluid rounded-start w-100 h-100 object-fit-cover" alt="{{ $blogs->title }}">
            </div>
            <div class="col-md-6 d-flex align-items-center bg-light p-4">
                <div class="card-body">
                    <h1 class="card-title text-primary fw-bold">{{ $blogs->title }}</h1>
                    <span class="badge bg-secondary fs-6 px-3 py-2">{{ $blogs->category->title }}</span>
                    <p class="mt-4 text-muted fs-5 lh-lg">{{ $blogs->content }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Blogs Section -->
    <div class="mt-5">
        <h2 class="text-center text-primary">Related Blogs</h2>
        <div class="row mt-4">
            @foreach($all as $related)
            <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 rounded-3">
                        <img src="{{ asset('storage/'.$related->image) }}" class="card-img-top rounded-top" style="height: 200px; object-fit: cover;" alt="{{ $related->title }}">
                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $related->title }}</h5>
                            <span class="badge bg-secondary">{{ $related->category->title }}</span>
                            <p class="text-muted mt-2">{{ Str::limit($related->content, 100) }}</p>
                            <a href="{{ route('blog', $related->id) }}" class="btn btn-primary btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
