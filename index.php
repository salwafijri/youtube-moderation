<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>TubeMod</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<nav class="navbar">
    <a href="index.php" class="logo">
        <img src="assets/logo.png" alt="TubeMod Logo">
    </a>

    <div class="nav-links">
        <?php if (isset($_SESSION['user'])): ?>
            <a href="index.php" class="active">Home</a>
            <a href="history.php">History</a>
            <a href="keywords.php">Keywords</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="index.php">Home</a>
            <a href="login.php" class="btn-nav">Login</a>
        <?php endif; ?>
    </div>
</nav>

<section class="hero">
    <h1>One tool to manage toxic comments<br>in your YouTube channels.</h1>
    <p>Automatically analyze spam comments, online gambling, and hate speech.</p>

    <form action="analyze.php" method="POST" class="search-form">
        <input type="text" name="youtube_url" placeholder="Insert a YouTube video URL" required>
        <button type="submit">Start Analyze</button>
    </form>

    <div class="preview-images">
        <div class="card"></div>
        <div class="card"></div>
        <div class="card"></div>
    </div>
</section>

<section class="trusted">
    <p>Trusted by more than 10+ creators</p>

    <div class="logos">
        <span>YouTube</span>
        <span>Google</span>
        <span>YouTube</span>
        <span>Google</span>
        <span>YouTube</span>
    </div>

    <div class="testimonial">
        <h3>
        “A single video could have thousands of comments, and filtering out spam and online gambling comments was incredibly tedious. With this system, I simply enter the video link and within seconds I receive a list of comments to review.”
        </h3>
        <div class="profile">
            <div class="avatar"></div>
            <div>
                <strong>Salwa Fijri</strong><br>
                <span>Content Creator (1M+ Subscribers)</span>
            </div>
        </div>
    </div>

    <div class="stats">
        <div>
            <h2>2026</h2>
            <p>TubeMod Founded</p>
        </div>
        <div>
            <h2>1k+</h2>
            <p>Active Users</p>
        </div>
        <div>
            <h2>10+</h2>
            <p>Creators trust</p>
        </div>
    </div>
</section>

<section class="cta">
    <h2>Discover the full scale of<br>TubeMod capabilities</h2>
    <a href="login.php">Start now</a>
</section>

<footer>
    <div class="footer-left">
        <h3>TubeMod</h3>
        <p>support@tubemod.com</p>
        <p>+62 090 9090 9090</p>
    </div>

    <div class="footer-bottom">
        <div>©Copyright 2026 TubeMod. All rights reserved.</div>
        <div class="social-icons">
            <span>X</span>
            <span>in</span>
            <span>ig</span>
            <span>yt</span>
        </div>
    </div>
</footer>

</body>
</html>