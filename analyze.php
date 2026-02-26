<?php 
session_start(); 
?>

<?php
require __DIR__ . '/functions/youtube.php';

$apiKey = "API DISINI";
$comments = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $url = $_POST['youtube_url'];
    $videoId = getVideoId($url);

    if ($videoId) {
        $apiUrl = "https://www.googleapis.com/youtube/v3/commentThreads?part=snippet&videoId=$videoId&maxResults=20&key=$apiKey";
        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);

        if (isset($data['items'])) {
            foreach ($data['items'] as $item) {
                $comments[] = [
                    'author' => $item['snippet']['topLevelComment']['snippet']['authorDisplayName'],
                    'text' => $item['snippet']['topLevelComment']['snippet']['textDisplay']
                ];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Analyze Result</title>
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
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>
</nav>

<div class="container">
    <h2>Analysis Result</h2>

    <?php if (count($comments) > 0): ?>
        <div class="scroll-box">
            <?php foreach ($comments as $c): ?>
                <div class="comment-card">
                    <div class="comment-content">
                        <h4><?php echo htmlspecialchars($c['author']); ?></h4>
                        <p><?php echo htmlspecialchars($c['text']); ?></p>
                    </div>
                    <span class="delete-text">Delete</span>
                </div>
            <?php endforeach; ?>
        </div>
        
        <button class="btn-danger">Delete all sensitive comments</button>
    <?php else: ?>
        <p>No comments found or invalid video.</p>
    <?php endif; ?>
</div>

</body>
</html>