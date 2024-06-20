<?php
require '../init.php';

if (!is_logged_in()) {
    redirect('../login.php');
}

if (!isset($_GET['id'])) {
    redirect('browse.php');
}

$movie_id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM movies WHERE id = ?");
$stmt->execute([$movie_id]);
$movie = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$movie) {
    echo "Filme não encontrado.";
    exit();
}
?>

<?php include '../includes/header.php'; ?>
<h1><?php echo htmlspecialchars($movie['title']); ?></h1>
<p><?php echo nl2br(htmlspecialchars($movie['description'])); ?></p>
<p><?php echo 'Assistindo...'; ?></p>

<?php include '../includes/footer.php'; ?>
