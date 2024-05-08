<?php
// include_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Models\Content.php';
include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Models\Content.php';

class questionBuilder extends Content {
    protected $tags;
    protected $subcategoryId;
    protected $title;
    protected $numDownVotes;
    protected $numUpVotes;
    protected $numAnswers;
    public function __construct($username, $publishDate, $body, $tags ,$subcategoryId, $numOfReports, $title ,$numAnswers, $numUpVotes, $numDownVotes) {
        parent::__construct($username, $body) ;
            $this->username = $username;
            $this->publishedDate = $publishDate;
            $this->body = $body;
            $this->tags = $tags;
            $this->subcategoryId=$subcategoryId;
            $this->numOfReports = $numOfReports;
            $this->title = $title;
            $this->numAnswers = $numAnswers;
            $this->numUpVotes = $numUpVotes;
            $this->numDownVotes = $numDownVotes;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function getnumAnswers(){
        return $this->numAnswers;
    }
    public function getTags()
    {
        return $this->tags;
    }
    public function setTags($tags)
    {
        $this->tags = $tags;
    }
    public function getSubcategoryId()
    {
        return $this->subcategoryId;
    }
    
    public function setSubcategoryId($subcategoryId)
    {
        $this->subcategoryId = $subcategoryId;
    }
}