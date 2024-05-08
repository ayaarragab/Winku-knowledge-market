<?php
require_once '../Controllers/adminControllers/adminToCategory.php';
$category = new Category($name, 0, 0, 0, $describtion);
$adminAdd = new AdminToCategory();
$adminAdd->addCategory($category);