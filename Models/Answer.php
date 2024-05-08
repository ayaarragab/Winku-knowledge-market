<?php 
include_once 'C:\xampp\htdocs\Winku-aya-s_branch\Models\Content.php';
//include_once 'C:\xampp\htdocs\software-engineering-project-Updated\codebase\Models\Content.php';
class Answer extends Content {
    protected $questionId;
    protected $numUpVotes;
    protected $numDownVotes;

    public function __construct($username, $body, $questionId,$numOfReports, $publishedDate,$numUpVotes,$numDownVotes) {
        parent::__construct($username, $body);
        $this->questionId = $questionId;
        $this->numOfReports = $numOfReports;
        $this->publishedDate = $publishedDate;
        $this->numUpVotes=$numUpVotes;
        $this->numDownVotes=$numDownVotes;
    }
    

    public function getquestionId() {
        return $this->questionId;
    }
    public function getnumUpVotes(){
        return $this->numUpVotes;
    }
    public function getnumDownVotes(){
        return $this->numDownVotes;
    }
}