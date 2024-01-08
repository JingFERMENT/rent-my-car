<?php

require_once(__DIR__ . '/../../../config/init.php');
require_once(__DIR__ . '/../../../models/Category.php');

try {
    $title = 'liste des catégories';
    $category = new Category();
    $displayResult = $category->getAll();
} catch (Throwable $e) {
    echo "Connection failed: " . $e->getMessage();
}

// views
include __DIR__ . '/../../../views/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/list.php';
include __DIR__ . '/../../../views/templates/footer_dashboard.php';
