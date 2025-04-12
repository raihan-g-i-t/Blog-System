<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogHub - Modern Blogging Platform</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/landing2.css') }}"
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div class="container">
            <div class="navbar">
                <a href="#" class="logo">
                    <i class="fas fa-blog"></i>
                    BlogHub
                </a>
                
                <div class="nav-links">
                    <a href="#">Home</a>
                    <a href="#">Blogs</a>
                    <a href="#">Categories</a>
                </div>
                
                <!-- Change this part based on login state -->
                <div class="auth-buttons" id="authSection">
                    <!-- Default state (not logged in) -->
                    <a href="#" class="btn btn-outline">Sign In</a>
                    <a href="#" class="btn btn-primary">Sign Up</a>
                    
                    <!-- Logged in state (comment out the above and uncomment below) -->
                    <!-- <div class="profile-icon">JD</div> -->
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Discover & Share Amazing Stories</h1>
            <p>Join our community of writers and readers. Explore thought-provoking articles on technology, lifestyle, business and more.</p>
            
            <div class="search-bar">
                <input type="text" placeholder="Search for blogs, topics, or authors...">
                <button><i class="fas fa-search"></i></button>
            </div>
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
                <!-- Blog Card 1 -->
                <div class="blog-card">
                    <div class="blog-image">
                        <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Blog Image">
                    </div>
                    <div class="blog-content">
                        <span class="blog-category">Technology</span>
                        <h3 class="blog-title">The Future of AI in Everyday Applications</h3>
                        <p class="blog-excerpt">How artificial intelligence is transforming our daily lives and what to expect in the coming years.</p>
                        <div class="blog-meta">
                            <div class="blog-author">
                                <div class="author-avatar">SM</div>
                                <span>Sarah Miller</span>
                            </div>
                            <span>May 15, 2023</span>
                        </div>
                    </div>
                </div>
                
                <!-- Blog Card 2 -->
                <div class="blog-card">
                    <div class="blog-image">
                        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Blog Image">
                    </div>
                    <div class="blog-content">
                        <span class="blog-category">Business</span>
                        <h3 class="blog-title">Remote Work: Productivity Tips for Distributed Teams</h3>
                        <p class="blog-excerpt">Essential strategies to maintain productivity and team cohesion in a remote work environment.</p>
                        <div class="blog-meta">
                            <div class="blog-author">
                                <div class="author-avatar">JD</div>
                                <span>John Doe</span>
                            </div>
                            <span>June 2, 2023</span>
                        </div>
                    </div>
                </div>
                
                <!-- Blog Card 3 -->
                <div class="blog-card">
                    <div class="blog-image">
                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Blog Image">
                    </div>
                    <div class="blog-content">
                        <span class="blog-category">Lifestyle</span>
                        <h3 class="blog-title">Minimalism: Living With Less in a Consumerist World</h3>
                        <p class="blog-excerpt">Discover the benefits of minimalism and practical steps to declutter your life and mind.</p>
                        <div class="blog-meta">
                            <div class="blog-author">
                                <div class="author-avatar">AJ</div>
                                <span>Anna Johnson</span>
                            </div>
                            <span>June 10, 2023</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Call to Action -->
    <section class="cta" style="background: var(--primary); color: white; padding: 80px 0; text-align: center;">
        <div class="container">
            <h2 style="font-size: 2rem; margin-bottom: 20px;">Ready to start your blogging journey?</h2>
            <p style="max-width: 600px; margin: 0 auto 30px; font-size: 1.1rem;">Join thousands of writers sharing their knowledge and stories with the world.</p>
            <a href="#" class="btn btn-primary" style="background: white; color: var(--primary);">Get Started</a>
        </div>
    </section>
    
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>BlogHub</h3>
                    <p style="color: var(--light-gray); margin-bottom: 20px;">The modern platform for writers and readers to connect and share ideas.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3>Explore</h3>
                    <ul>
                        <li><a href="#">Popular Blogs</a></li>
                        <li><a href="#">Top Writers</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Trending Topics</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Company</h3>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Support</h3>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Community</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Feedback</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2023 BlogHub. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <script>
        // This would be replaced with actual authentication logic
        // For demo purposes, here's how you could toggle between states
        
        function toggleAuthState() {
            const authSection = document.getElementById('authSection');
            
            // Check current state
            if (authSection.innerHTML.includes('Sign In')) {
                // Switch to logged in state
                authSection.innerHTML = '<div class="profile-icon">JD</div>';
            } else {
                // Switch to logged out state
                authSection.innerHTML = `
                    <a href="#" class="btn btn-outline">Sign In</a>
                    <a href="#" class="btn btn-primary">Sign Up</a>
                `;
            }
        }
        
        // Uncomment to test the toggle function
        // setInterval(toggleAuthState, 3000);
    </script>
</body>
</html>