<?php

$controllers = glob('../Controllers/adminControllers/*.php');
foreach ($controllers as $controller) {
    require_once $controller;
}

class Admin {

    public $AdminBlider;
    public $AdminToUser;
    public $AdminToQuestions;
    public $AdminToAnswer;
    public $AdminToCategory;
    public $AdminToSubcategory;

    public function __construct($username, $email, $password) {
        $this->AdminBlider = new AdminBuilder($username, $email, $password);
        $this->AdminToUser = new AdminToUsers();
        $this->AdminToQuestions = new AdminToQuestions();
        $this->AdminToAnswer = new AdminToAnswers();
        $this->AdminToCategory = new AdminToCategory();
        $this->AdminToSubcategory = new AdminToSubcategory();
    }
}
