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
                <a href="{{ route('index') }}" class="logo">
                    <i class="fas fa-blog"></i>
                    Blog System
                </a>
                
                <div class="nav-links">
                    <a href="{{ route('index') }}">Home</a>
                    <a href="{{ route('all.blogs') }}">Blogs</a>
                </div>
                
                <!-- Change this part based on login state -->

                @guest
                <div class="auth-buttons" id="authSection">
                    <!-- Default state (not logged in) -->
                    <a href="{{ route('user.login') }}" class="btn btn-outline">Sign In</a>
                    <a href="{{ route('user.registration') }}" class="btn btn-primary">Sign Up</a>
                @else    
                    <!-- Logged in state (comment out the above and uncomment below) -->
                    <div class="profile-icon">
                       <a href="{{ route('user.profile') }}"> <img src="{{ asset('css/profile.png') }}"> </a>
                    </div>
                @endguest
                </div>
            </div>
        </div>
    </nav>

@if (session('success'))
    @include('modal')
@endif
    
@yield('content')
        
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>BlogHub</h3>
                    <p style="color: var(--light-gray); margin-bottom: 20px;">The modern platform for writers and readers to connect and share ideas.</p>
                    <div class="social-links">
                        <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3>Explore</h3>
                    <ul>
                        <!-- <li><a href="#">Popular Blogs</a></li>
                        <li><a href="#">Top Writers</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Trending Topics</a></li> -->
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Company</h3>
                    <ul>
                        <!-- <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li> -->
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Support</h3>
                    <ul>
                        <!-- <li><a href="#">Help Center</a></li>
                        <li><a href="#">Community</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Feedback</a></li> -->
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2023 BlogHub. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>