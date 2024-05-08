<?php
require_once 'C:\xampp\htdocs\Winku-aya-s_branch\Models\Person.php';
//require_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Models\Person.php';

class AdminBuilder extends Person {

    public function __construct($username, $email, $password) {
        // Call the parent constructor
        parent::__construct('admin', $username, $email, $password, 'admin');
    }
}
