<?php
function redirect($url) {
    header("Location: $url");
    exit();
}

function register_user($username, $password, $email, $category, $role = 'user') {
    global $conn;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, password, email, role, category) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$username, $hashed_password, $email, $role, $category]);
}

function login_user($username, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        return true;
    }
    return false;
}

function is_logged_in() {
    return isset($_SESSION['user']);
}

function is_admin() {
    return is_logged_in() && $_SESSION['user']['role'] == 'admin';
}

function is_editor() {
    return is_logged_in() && $_SESSION['user']['role'] == 'editor';
}

function add_movie($title, $description, $category_id) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO movies (title, description, category_id) VALUES (?, ?, ?)");
    return $stmt->execute([$title, $description, $category_id]);
}

function get_movies_by_category($category_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM movies WHERE category_id = ?");
    $stmt->execute([$category_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_categories() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM categories");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
