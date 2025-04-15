@extends('layouts.user')

@section('content')

<link rel="stylesheet" href="{{ asset('css/specific-blog.css') }}">

<div class="container blog-show">
    <!-- Blog Content -->
    <article class="blog-content">
        <div class="blog-header">
            <span class="blog-category">{{ $blogs->category->title }}</span>
            <h1 class="blog-title">{{ $blogs->title }}</h1>
        
        </div>

        <div class="blog-image">
            <img src="{{ asset('storage/'.$blogs->image) ?? 'https://via.placeholder.com/1200x600' }}" alt="{{ $blogs->title }}">
        </div>

        <div class="blog-body">
            {{ $blogs->content }}
        </div>
    </article>

    <!-- Comments Section -->
    <section class="comments-section">
        <h2>Comments ({{ $comments->count() }})</h2>
        
        @auth
        <div class="comment-form">
            <form action="{{ route('comment.store') }}" method="POST">
                @csrf
                <textarea name="content" placeholder="Share your thoughts..." required></textarea>
                <input type="hidden" name="blog_id" value="{{ $blogs->id }}">
                <button type="submit" class="btn btn-primary">Post Comment</button>
            </form>
        </div>
        @else
        <div class="auth-prompt">
            <p><a href="{{ route('user.login') }}">Sign in</a> to leave a comment</p>
        </div>
        @endauth

        <div class="comments-list">
            @forelse ($comments as $comment)
                <div class="comment">
                    <div class="comment-header">
                        <div class="comment-author">
                            <div class="comment-avatar">
                                {{ Str::substr($comment->user->name, 0, 2) }}
                            </div>
                            <span>{{ $comment->user->name }}</span>
                        </div>
                        <span class="comment-date">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="comment-body">
                        {{ $comment->content }}
                    </div>
                </div>
            @empty
                <p>No comments yet. Be the first to comment!</p>
            @endforelse
        </div>
    </section>

    <!-- Related Blogs -->
    <section class="related-blogs">
        <h2>Related Blogs</h2>
        <div class="related-blogs-grid">
            @forelse ($all as $relatedBlog)
                <div class="related-blog-card">
                    <a href="{{ route('show.blog', $relatedBlog->id) }}">
                        <div class="related-blog-image">
                            <img src="{{ asset('storage/'.$relatedBlog->image) ?? 'https://via.placeholder.com/400x300' }}" alt="{{ $relatedBlog->title }}">
                        </div>
                        <h3>{{ $relatedBlog->title }}</h3>
                        <p>{{ Str::limit(strip_tags($relatedBlog->content), 100) }}</p>
                    </a>
                </div>
            @empty
                <p>No related blogs found.</p>
            @endforelse
        </div>
    </section>
</div>
@endsection
