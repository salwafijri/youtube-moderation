<?php
session_start();

// Proteksi halaman, pastikan user sudah login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// DATA DUMMY: Untuk melihat gambaran desain UI
$dummy_videos = [
    [
        'id' => 1,
        'title' => 'Review Gadget Paling Laku 2026!',
        'youtube_url' => 'https://www.youtube.com/watch?v=contoh1',
        'analyzed_at' => '2026-02-25 10:30'
    ],
    [
        'id' => 2,
        'title' => 'Vlog Jalan-Jalan ke Jepang Ep. 3',
        'youtube_url' => 'https://www.youtube.com/watch?v=contoh2',
        'analyzed_at' => '2026-02-24 15:45'
    ],
    [
        'id' => 3,
        'title' => 'Podcast Horor Terseram Tahun Ini',
        'youtube_url' => 'https://www.youtube.com/watch?v=contoh3',
        'analyzed_at' => '2026-02-22 20:00'
    ],
    [
        'id' => 4,
        'title' => 'Tutorial Masak Nasi Goreng Spesial',
        'youtube_url' => 'https://www.youtube.com/watch?v=contoh4',
        'analyzed_at' => '2026-02-21 09:15'
    ],
    [
        'id' => 5,
        'title' => 'Live Streaming Q&A Spesial 1 Juta Subs',
        'youtube_url' => 'https://www.youtube.com/watch?v=contoh5',
        'analyzed_at' => '2026-02-20 18:00'
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Analysis History - TubeMod</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<nav class="navbar">
    <a href="index.php" class="logo">
        <img src="assets/logo.png" alt="TubeMod Logo">
    </a>

    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="history.php" class="active">History</a>
        <a href="keywords.php">Keywords</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<div class="container">
    <h2>Analysis History</h2>

    <div class="scroll-box">
        <?php foreach ($dummy_videos as $row): ?>
            <div class="comment-card">
                <div class="comment-content">
                    <h4><?= htmlspecialchars($row['title']) ?></h4>
                    
                    <p style="margin-bottom: 5px;">
                        <a href="<?= htmlspecialchars($row['youtube_url']) ?>" target="_blank" style="color: #8bb4f5; text-decoration: none;">
                            <?= htmlspecialchars($row['youtube_url']) ?>
                        </a>
                    </p>
                    
                    <p>Analyzed on: <?= htmlspecialchars($row['analyzed_at']) ?></p>
                </div>
                
                <a href="#" class="delete-text">Delete</a>
            </div>
        <?php endforeach; ?>
    </div>
    
</div>

</body>
</html>