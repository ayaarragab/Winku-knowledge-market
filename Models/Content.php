<?php

class Content {
    protected $id;
    protected $username;
    protected $publishedDate;
    protected $body;
    protected $numOfReports;

    protected function __construct($username, $body) {
        $this->username = $username;
        $this->body = $body;
    }

    public function getusername() {
        return $this->username;
    }

    public function getbody() {
        return $this->body;
    }


    public function getnumOfReports() {
        return $this->numOfReports;
    }

   
    public function getpublishedDate(){
        return $this->publishedDate;
    }
}
