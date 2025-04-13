@extends('layouts.user')

@section('content')

    <form action="{{ route('search') }}" method="GET" class="search-bar">
        <input 
            type="text" 
            name="query" 
            placeholder="Search for blogs, topics.."
            value="{{ request('query') }}"
        >
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>

    <!-- Blogs Section -->
    <section class="featured">
        <div class="container">
            <div class="section-title">
                <h2>Latest Blogs</h2>
                @if(request('query'))
                    <p>Search results for "{{ request('query') }}"</p>
                @else
                    <p>Recent articles from our community</p>
                @endif
            </div>
            
            @if($blogs->count())
                <div class="blog-grid">
                    @foreach($blogs as $blog)
                        <div class="blog-card">
                            <div class="blog-image">
                                <img src="{{ asset('storage/'.$blog->image) ?? 'https://via.placeholder.com/600x400' }}" alt="{{ $blog->title }}">
                            </div>
                            <div class="blog-content">
                                <span class="blog-category">{{ $blog->category->title ?? 'Uncategorized' }}</span>
                                <h3 class="blog-title">
                                    <a href="{{ route('show.blog', $blog->id) }}" style="color: inherit; text-decoration: none;">
                                        {{ $blog->title }}
                                    </a>
                                </h3>
                                <p class="blog-excerpt">{{ Str::limit(strip_tags($blog->content), 100) }}</p>
                                <div class="blog-meta">
                                    <span>{{ $blog->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                
            @else
                <div style="text-align: center; padding: 50px 0;">
                    <h3>No blogs found</h3>
                    @if(request('query'))
                        <p>Try a different search term</p>
                    @else
                        <p>Check back later for new posts</p>
                    @endif
                </div>
            @endif
        </div>
    </section>

@endsection