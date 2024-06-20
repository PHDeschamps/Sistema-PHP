<?php
require 'init.php';

if (!is_logged_in()) {
    redirect('login.php');
}

if (is_admin() || is_editor()) {
    redirect('admin/dashboard.php');
} else {
    redirect('user/browse.php');
}
?>
