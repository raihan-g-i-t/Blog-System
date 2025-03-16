<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P2P Trading Platform</title>
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>

<body>
    <!-- Header -->
     @include('header')

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>Trade Directly with Others</h2>
            <p>Join the world's leading P2P trading platform. Buy and sell cryptocurrencies securely and efficiently.</p>
            <button id="startTradingBtn">Start Trading</button>
        </div>
        <div class="hero-image">
            <img src="background.jpg" alt="P2P Trading">
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="feature">
            <h3>Secure Transactions</h3>
            <p>Your funds are protected with our advanced escrow system. Trade with confidence knowing your assets are safe.</p>
        </div>
        <div class="feature">
            <h3>Low Fees</h3>
            <p>Enjoy minimal trading fees compared to traditional exchanges. Save more while trading.</p>
        </div>
        <div class="feature">
            <h3>24/7 Support</h3>
            <p>Our dedicated support team is available around the clock to assist you with any issues.</p>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works">
        <h2>How It Works</h2>
        <div class="steps">
            <div class="step">
                <h3>1. Sign Up</h3>
                <p>Create an account and verify your identity to start trading.</p>
            </div>
            <div class="step">
                <h3>2. Find a Trade</h3>
                <p>Browse offers from other users or create your own trade offer.</p>
            </div>
            <div class="step">
                <h3>3. Trade Securely</h3>
                <p>Use our escrow system to ensure a safe and fair transaction.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
     @include('footer')

</body>
</html>