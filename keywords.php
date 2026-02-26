<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<?php
require __DIR__ . '/config/database.php';

// CREATE
if (isset($_POST['add'])) {
    $word = $_POST['word'];
    $category = $_POST['category'];

    $stmt = $conn->prepare("INSERT INTO keywords (word, category) VALUES (?, ?)");
    $stmt->bind_param("ss", $word, $category);
    $stmt->execute();
}

// DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM keywords WHERE id=$id");
}

// UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $word = $_POST['word'];
    $category = $_POST['category'];

    $stmt = $conn->prepare("UPDATE keywords SET word=?, category=? WHERE id=?");
    $stmt->bind_param("ssi", $word, $category, $id);
    $stmt->execute();
}

// READ
$result = $conn->query("SELECT * FROM keywords ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Keyword Management</title>
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
            <a href="keywords.php" class="active">Keywords</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>
</nav>

<div class="container">
    <h2>Keyword Management</h2>

    <form method="POST" class="search-form" style="width: 700px; padding: 5px;">
        <input type="text" name="word" placeholder="Keyword" required style="flex:1;">
        <input type="text" name="category" placeholder="Category (judol/hate)" required style="flex:1; border-left: 1px solid #ccc;">
        <button type="submit" name="add">Add</button>
    </form>

    <div class="scroll-box">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="comment-card">
                <form method="POST" style="display:flex; gap:10px; align-items:center; width: 100%;">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    
                    <div class="comment-content" style="display:flex; gap: 10px; flex: 1;">
                        <input type="text" name="word" value="<?= htmlspecialchars($row['word']) ?>" style="background:transparent; border:1px solid #5a32a3; color:white; padding: 5px; border-radius: 4px;">
                        <input type="text" name="category" value="<?= htmlspecialchars($row['category']) ?>" style="background:transparent; border:1px solid #5a32a3; color:white; padding: 5px; border-radius: 4px;">
                    </div>

                    <button type="submit" name="update" style="background:var(--primary); color:white; border:none; padding:8px 15px; border-radius:6px; cursor:pointer;">Update</button>
                    <a href="keywords.php?delete=<?= $row['id'] ?>" class="delete-text">Delete</a>
                </form>
            </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
</html>