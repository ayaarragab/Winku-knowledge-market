<?php
class bookmark{
    protected $questionId;
    protected $userId;
    public function __construct($questionId,$userId ) {
        $this->questionId = $questionId;
        $this->userId= $userId;
    }
    public function getquestionId(){
        return $this->questionId;

    }
    public function getuserId(){
        return $this->userId;

    }
}