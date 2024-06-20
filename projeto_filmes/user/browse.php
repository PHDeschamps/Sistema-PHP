<?php
require '../init.php';

if (!is_logged_in() || is_admin() || is_editor()) {
    redirect('../login.php');
}

$category = $_SESSION['user']['category'];
$movies = get_movies_by_category($category);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Navegar Filmes</title>
</head>
<body>
    <h1>Filmes na Categoria: <?php echo htmlspecialchars($category); ?></h1>
    <ul>
        <?php foreach ($movies as $movie): ?>
            <li>
                <a href="watch.php?id=<?php echo $movie['id']; ?>"><?php echo htmlspecialchars($movie['title']); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
