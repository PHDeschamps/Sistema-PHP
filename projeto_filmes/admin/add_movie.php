<?php
require '../init.php';

if (!is_admin() && !is_editor()) {
    redirect('../login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    
    if (add_movie($title, $description, $category_id)) {
        echo "Filme adicionado com sucesso.";
    } else {
        echo "Erro ao adicionar filme.";
    }
}

$categories = get_categories();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Filme</title>
</head>
<body>
    <form method="post" action="add_movie.php">
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" required>
        
        <label for="description">Descrição:</label>
        <textarea name="description" id="description" required></textarea>
        
        <label for="category_id">Categoria:</label>
        <select name="category_id" id="category_id" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>"><?php echo htmlspecialchars($category['name']); ?></option>
            <?php endforeach; ?>
        </select>
        
        <button type="submit">Adicionar Filme</button>
    </form>
</body>
</html>
