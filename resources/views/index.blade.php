@extends('layouts.user')

@section('content')

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Discover & Share Amazing Stories</h1>
            <p>Join our community of writers and readers. Explore thought-provoking articles on technology, lifestyle, business and more.</p>

        </div>
    </section>

    <!-- Featured Blogs -->
    <section class="featured">
        <div class="container">
            <div class="section-title">
                <h2>Featured Blogs</h2>
                <p>Handpicked articles from our top writers</p>
            </div>
            
            
            <div class="blog-grid">
                @foreach ($data['latestBlogs'] as $latest)
                <!-- Blog Card 1 -->
                <div class="blog-card">
                    <div class="blog-image">
                        <a href="{{ route('show.blog', $latest->id) }}"> <img src="{{ asset('storage/'. $latest->image) }}" alt="Blog Image"> </a>
                    </div>
                    <div class="blog-content">
                        <span class="blog-category">{{$latest->category->title}}</span>
                        <h3 class="blog-title">{{$latest->title}}</h3>
                        <p class="blog-excerpt">{{ Str::limit($latest->content, 200) }}</p>
                        <div class="blog-meta">
                            <!-- <div class="blog-author">
                                <div class="author-avatar">SM</div>
                                <span>Sarah Miller</span>
                            </div> -->
                            <span>{{$latest->created_at->format('M d, Y')}}</span>
                        </div>
                    </div>
                </div>
                 @endforeach
                
            </div>
        </div>
    </section>

        <!-- Call to Action -->
        <section class="cta" style="background: var(--primary); color: white; padding: 80px 0; text-align: center;">
        <div class="container">
            <h2 style="font-size: 2rem; margin-bottom: 20px;">Ready to start your blogging journey?</h2>
            <p style="max-width: 600px; margin: 0 auto 30px; font-size: 1.1rem;">Join thousands of writers sharing their knowledge and stories with the world.</p>
            <a href="{{ route('all.blogs') }}" class="btn btn-primary" style="background: white; color: var(--primary);">Get Started</a>
        </div>
        </section>
  
@endsection    