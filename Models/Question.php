<?php 
$controllers = glob('../Controllers/questionControllers/*.php');
foreach ($controllers as $controller) {
    require_once $controller;
}
class Question
{
    public $builder;
   // public $auth;
    public $mapper;
    public function __construct($username, $publishDate, $body, $tags ,$subcategoryId, $numOfReports, $title ,$numAnswers, $numUpVotes, $numDownVotes)
    {
        $this->builder = new questionBuilder($username, $publishDate, $body, $tags ,$subcategoryId, $numOfReports, $title ,$numAnswers, $numUpVotes, $numDownVotes);
       // $this->auth = new UserAuthenticator();
    }
}
//////////////////////
/*
include_once 'Content.php';

class Question extends Content {
    protected $tags;
    protected $subcategoryId;
    public function __construct($username, $body, $tags ,$publishDate, $numberOfReacts, $numberOfReports, $numberOfViews, $title){
        parent::__construct($title, $username, $body) ;
            $this->title = $title;
            $this->username = $username;
            $this->body = $body;
            $this->tags = $tags;
            $this->publishedDate = $publishDate;
            $this->numOfReacts = $numberOfReacts;
            $this->numOfReports = $numberOfReports;
            $this->numOfViews = $numberOfViews;
    }
    public function getTags()
    {
        return $this->tags;
    }
}  */