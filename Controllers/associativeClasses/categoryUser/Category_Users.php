<?php

class Category_Users {
    
    protected $categoryid;
    protected $userid ;

    public function __construct($categoryid,$userid) {
        $this->categoryid = $categoryid;
        $this->userid = $userid;
      }
      

    public function getuserid(){
        return $this-> userid;
    }

    public function getcategoryid(){
        return $this-> categoryid;
    }

}
