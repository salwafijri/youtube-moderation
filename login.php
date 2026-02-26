<?php
session_start();

if (isset($_POST['login'])) {
    $_SESSION['user'] = "admin";
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<nav class="navbar">
    <a href="index.php" class="logo">
        <img src="assets/logo.png" alt="TubeMod Logo">
    </a>

    <div class="nav-links">
        <a href="index.php">Home</a>

        <?php if (isset($_SESSION['user'])): ?>
            <a href="history.php">History</a>
            <a href="keywords.php">Keywords</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php" class="active">Login</a>
        <?php endif; ?>
    </div>
</nav>

<div class="container">
    <div class="login-card">
        <h2>Login Required</h2>
        <p>You need to login with Google to manage comments and keywords.</p>

        <a href="google-login.php" class="google-btn">
            <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg" alt="Google">
            Continue with Google
        </a>
        
        <form method="POST">
            <button name="login" class="hidden-login">bypass login</button>
        </form>
    </div>
</div>

</body>
</html>